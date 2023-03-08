let inputPhotos = document.getElementById("photos-input")
let filenames = []

let container = document.getElementById('photos-choosen')

let buttonDelete = document.getElementById('supprimer-photos')

function ajoutPhoto(container, value) {
    let newPhoto = document.createElement('div')
        newPhoto.classList.add('photo-choosen')

        let textPhoto = document.createElement('p')
        textPhoto.classList.add('photo-choosen-text')
        textPhoto.innerText = value

        newPhoto.appendChild(textPhoto)
        container.appendChild(newPhoto)
}

inputPhotos.addEventListener("change", () => {

    filenames = []
    
    for (let i = 0; i < inputPhotos.files.length; i++) {
        filenames.push(inputPhotos.files[i])
    }
    
    container.textContent = ''

    for (let j = 0; j < filenames.length; j++) {
        ajoutPhoto(container, filenames[j].name)
    }
    
})

buttonDelete.addEventListener("click", () => {
    container.textContent = ''

    ajoutPhoto(container, 'pas de photos sélectionnées')

    inputPhotos.value = ''

})


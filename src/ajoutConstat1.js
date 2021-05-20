function retirerT(){

    let id = this.id
    let toRemove = []
    let datas = []

    let datasGrid = document.getElementById("witness-grid")

    if (datasGrid.hasChildNodes()) {
        let children = datasGrid.childNodes
      
        for (let i = 0; i < children.length; i++) {
            if (children[i].id == id) {
                toRemove.push(children[i])
                datas.push(children[i].innerText)
            }
        }

        for (let j = 0; j < toRemove.length; j++) {
            toRemove[j].parentNode.removeChild(toRemove[j])
        }

        datas.pop()
    }

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState==4 && this.status==200) {
            console.log(this.responseText)
        }
    }

    xhttp.open("POST", "supprimerTemoin.php",true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("nom="+datas[0]+"&prenom="+datas[1]+"&adresse="+datas[2]+"&tel="+datas[3]);
}

function ajouterT(){
    let nom = document.getElementById("nomT").value
    let prenom = document.getElementById("prenomT").value
    let adresse = document.getElementById("adresseT").value
    let tel = document.getElementById("telephoneT").value

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState==4 && this.status==200) {
            let datasGrid = document.getElementById("witness-grid")

            let currentId = parseInt(datasGrid.dataset.row)

            let temoin = JSON.parse(this.responseText)

            
            for (let i = 0; i < temoin.length; i++) {
                let champ = temoin[i];

                let element = document.createElement("span")

                element.innerHTML = champ
                element.classList.add("datas-data")
                element.id = currentId

                datasGrid.appendChild(element)
            }

            let deleteSpan = document.createElement("span")
            deleteSpan.classList.add("datas-data")
            deleteSpan.id = currentId


            let dlt = document.createElement("img")
            
            dlt.src = '../assets/svg/icons/delete.svg'
            dlt.classList.add("datas-svg")
            dlt.id = currentId
            dlt.addEventListener('click', retirerT, false);

            deleteSpan.appendChild(dlt)
            datasGrid.appendChild(deleteSpan)

            currentId++
            datasGrid.dataset.row = currentId
            

            /*tr = document.createElement('tr');
            tr.appendChild(document.createElement('td'));
            tr.appendChild(document.createElement('td'));
            tr.appendChild(document.createElement('td'));
            tr.appendChild(document.createElement('td'));
            tr.appendChild(document.createElement('td'));
            tr.cells[0].appendChild(document.createTextNode(nom));
            tr.cells[1].appendChild(document.createTextNode(prenom));
            tr.cells[2].appendChild(document.createTextNode(adresse));
            tr.cells[3].appendChild(document.createTextNode(tel));
            var croix = document.createElement('IMG');
            croix.alt = 'croix';
            croix.src = '../db/croix.png';
            croix.onclick = retirerT();
            tr.cells[4].appendChild(croix);

            element = document.getElementById("listeT");
            element.appendChild(tr);*/
        }
    };
    xhttp.open("POST", "ajouterTemoin.php",true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("nom="+nom+"&prenom="+prenom+"&adresse="+adresse+"&tel="+tel);
}
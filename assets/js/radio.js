let radiosDelete = document.querySelectorAll('#radio-show-no')
let radiosActive = document.querySelectorAll('#radio-show-yes')

let radiosOn = document.querySelectorAll('#radio-show-on')
let radiosOff = document.querySelectorAll('#radio-show-off')

function radioClick(radios, inputsId,displayValue) {
    radios.forEach(radio => {
        radio.addEventListener('click', () => {
            let inputs = document.querySelectorAll(inputsId)
    
            inputs.forEach(input => {
                input.style.display = displayValue
            });
        })
    });
}

radioClick(radiosDelete, "#radio-show-input", "none")
radioClick(radiosActive, "#radio-show-input", "flex")

radioClick(radiosOn, "#off", "none")
radioClick(radiosOn, "#on", "flex")

radioClick(radiosOff, "#off", "flex")
radioClick(radiosOff, "#on", "none")
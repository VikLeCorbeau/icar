function lineDelete(button) {
    let line = button.parentNode.parentNode
    line.remove()

    let datas = []

    for (let i = 0; i < line.children.length-1; i++) {
        datas.push(line.children[i].innerHTML)
    }

    return datas
}

function supprimerTemoin() {
    let buttons = document.querySelectorAll('.datas-svg')

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            if (window.confirm("Etes vous sûr de vouloir supprimer ?")) {
                let datas = lineDelete(button)

                let xhttp = new XMLHttpRequest();

                xhttp.open("POST", "supprimerTemoin.php",true);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.send("nom="+datas[0]+"&prenom="+datas[1]+"&adresse="+datas[2]+"&tel="+datas[3]);
            }
        })
    })

}

function supprimerLog() {
    let buttons = document.querySelectorAll('.datas-svg-l');

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            if (window.confirm("Etes vous sûr de vouloir supprimer ?")) {
                let datas = lineDelete(button);
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function(){
                    if (this.readyState === 4 && this.status === 200) {
                        console.log(this.responseText);
                    }
                }

                xhttp.open("POST", "../src/supprimerLogs.php",true);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.send("date="+datas[0]+"&type="+datas[1]+"&nom="+datas[2]+"&sujet="+datas[3]+"&quoi="+datas[4]);
            }
        })
    })

}

function supprimerErreurs() {
    let buttons = document.querySelectorAll('.datas-svg-e')

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            if (window.confirm("Etes vous sûr de vouloir supprimer ?")) {
                let datas = lineDelete(button)

                let xhttp = new XMLHttpRequest();

                xhttp.open("POST", "../src/supprimerErreurs.php",true);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.send("date="+datas[0]+"&urgence="+datas[1]+"&type="+datas[2]+"&identite="+datas[3]+"&email="+datas[4]+"&identifiant="+datas[5]+"&titre="+datas[6]+"&message="+datas[7]);
            }
        })
    })

}


function ajouterT(){

    let nom = document.getElementById("nomT").value
    let prenom = document.getElementById("prenomT").value
    let adresse = document.getElementById("adresseT").value
    let tel = document.getElementById("telephoneT").value

    if (nom !== "" && prenom !== "" && adresse !== "" && tel !== "") {

        let xhttp = new XMLHttpRequest()
        xhttp.onreadystatechange = function(){
            if (this.readyState === 4 && this.status === 200) {
                let table = document.getElementById("table-body")

                let temoin = JSON.parse(this.responseText)

                let line = document.createElement("tr")

                for (let i = 0; i < temoin.length; i++) {
                    let champ = temoin[i];
                    console.log(champ);

                    let td = document.createElement("td");

                    td.innerText = champ;

                    line.appendChild(td);
                }



                let deleteTd = document.createElement("td");

                let dlt = document.createElement("img");

                dlt.src = '../assets/svg/icons/delete.svg';
                dlt.classList.add("datas-svg");

                deleteTd.appendChild(dlt);
                line.appendChild(deleteTd);


                table.appendChild(line);

                supprimerTemoin();
                document.getElementById("nomT").value = "";
                document.getElementById("prenomT").value = "";
                document.getElementById("adresseT").value = "";
                document.getElementById("telephoneT").value = "";


            }
        }

        xhttp.open("POST", "ajouterTemoin.php",true)
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
        xhttp.send("nom="+nom+"&prenom="+prenom+"&adresse="+adresse+"&tel="+tel)

    }

}

// APPEL DE BASE.

supprimerTemoin()
supprimerLog()
supprimerErreurs()
const news = [{"title": "Lorem ipsum dolor sit amet, consectetuer adipiscing elit.", "text": "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.", "date": 1699866938368}, {"title": "Hinter den Wortbergen", "text": "Weit hinten, hinter den Wortbergen, fern der Länder Vokalien und Konsonantien leben die Blindtexte. Abgeschieden wohnen sie in Buchstabhausen an der Küste des Semantik, eines großen Sprachozeans. Ein kleines Bächlein namens Duden fließt durch ihren Ort und versorgt sie mit den nötigen Regelialien. Es ist ein paradiesmatisches Land, in dem einem gebratene Satzteile in den Mund fliegen. Nicht einmal von der allmächtigen Interpunktion werden die Blindtexte beherrscht – ein geradezu unorthographisches Leben.", "date": 1699780485767}, {"title": "Webstandards", "text": "Überall dieselbe alte Leier. Das Layout ist fertig, der Text lässt auf sich warten. Damit das Layout nun nicht nackt im Raume steht und sich klein und leer vorkommt, springe ich ein: der Blindtext. Genau zu diesem Zwecke erschaffen, immer im Schatten meines großen Bruders »Lorem Ipsum«, freue ich mich jedes Mal, wenn Sie ein paar Zeilen lesen. Denn esse est percipi - Sein ist wahrgenommen werden. Und weil Sie nun schon die Güte haben, mich ein paar weitere Sätze lang zu begleiten, möchte ich diese Gelegenheit nutzen, Ihnen nicht nur als Lückenfüller zu dienen, sondern auf etwas hinzuweisen, das es ebenso verdient wahrgenommen zu werden: Webstandards nämlich.", "date": 1699866051303}];

// Konzept / Idee:
// - Es liegt schon als Objekt vor
// - Wie die Liste finden? (wo wir elemente hinzufügen wollen)
//   -> getElemenetsByTagName("ul")[0]
//   -> querySelector("ul") od. querySelectorAll("ul")[0]
//   -> getElemenetsByClassName("news")[0]
//   -> querySelector(".news")
//   -> getElemenetById("news-container");
// - Über die Elemente des Arrays iterieren
// - der Liste hinzufügen

const truncate = (str) => str.length > 100 ? str.slice(0, 100) + '...' : str;

const target = document.getElementById("news-container");
const newsContainer = document.getElementById("news-real-container");
function showNews(news) {
    if(target != null) { // existiert das Element?
        target.textContent = ""; // löscht alles heraus
        newsContainer.textContent = "";
        for(let i = 0; i < news.length; i ++) {
            
            const listItem = document.createElement("li");
            // textContent, innerHTML, innerText, className (nicht class), id, classList, (für input value und name)
            console.dir(listItem);
            listItem.textContent = news[i].title;
            target.appendChild(listItem);

            // Kompletten Nachrichten ausgeben
            // ...?
            // - h2-Element für Titel
            // - p für Text
            // - p für Link
            // - a
            const titleH2 = document.createElement("h2");
            const textP = document.createElement("p");
            const linkP = document.createElement("p");
            const linkA = document.createElement("a");

            titleH2.textContent = news[i].title;
            //textP.textContent = news[i].text; <-- nicht mehr nötig
            

            newsContainer.appendChild(titleH2);
            newsContainer.appendChild(textP);
            newsContainer.appendChild(linkP);

            // Geht ggf. auch einmal: newsContainer.innerHTML += "<h2>...</h2><p>...</p>"

            // Maximal 100 Zeichen?
            // Gesamt-Text speichern
            // Prüfen wieviele Zeichen hat mein Text (ggf. über schleife?)
            // über den Klick auf more dann den rest hinzufügen


            
            let longVersion = news[i].text;
            if(news[i].text.length > 100) {
                let shortVersion = truncate(news[i].text);
                let shortSpan = document.createElement("span");
                shortSpan.textContent = shortVersion;
                let longSpan = document.createElement("span");
                longSpan.textContent = longVersion;
                longSpan.classList.add("hide-element")
                textP.appendChild(shortSpan);
                textP.appendChild(longSpan);

                linkA.textContent = "More";
                linkA.setAttribute("href", "#");
                linkP.classList.add("more");
                //linkP.style.backgroundColor = "pink";
                linkP.appendChild(linkA);

                linkA.addEventListener("click", function() {
                    shortSpan.classList.toggle("hide-element");
                    longSpan.classList.toggle("hide-element");
                });
            } else {
                let fullSpan = document.createElement("span");
                fullSpan.textContent = longVersion;
                textP.appendChild(fullSpan);
            }
            console.log(textP);
        }
    }

}

function loadNews() {
    const req = new XMLHttpRequest();
    req.addEventListener('readystatechange', function() {
        if(req.readyState === 4 && req.status == 200) {
            const response = req.responseText;
            const data = JSON.parse(response);
            console.log(data);

            showNews(data);
        }
    });
    req.open("GET", "news.json");
    req.send();
}

if(newsContainer) {
    loadNews();
}



// Formular Validierung
// Konzept:
// - Wann? z.B. wenn eine Eingabe platziert wurde (ggf. auch mit Zeitverzögerung)
//   - Beim "Click" auf Speichern
// - Wie kommt man an die Eingaben? Formular-Inhalt?
//   irgendwie an die input-Elemente kommen, da dann das passende Attribut (vgl. value)

function checkName() {
    const nameField = document.getElementById('newsletter_name');
    if(nameField) {
        const name = nameField.value;
        // Name min. 3 Zeichen?
        nameField.classList.remove("is-valid", "is-invalid");
        if(name.length >= 3) {
            nameField.classList.add("is-valid");
        } else {
            nameField.classList.add("is-invalid");
        }
    }
}
function checkMail() {
    const mailField = document.getElementById('newsletter_mail');
    if(mailField) {
        const mail = mailField.value;
        if(mail.indexOf("@") != -1) {
            mailField.classList.add("is-valid");
        } else {
            mailField.classList.add("is-invalid");
        }
    }
}

const saveButton = document.getElementById("save-button");
function checkOnClickSave() {
    // aufruf von checkMail / -Name
    checkMail();
    checkName();
}
if(saveButton) {
    saveButton.addEventListener('click', checkOnClickSave);
}

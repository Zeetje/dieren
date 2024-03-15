// Voeg deze functie toe aan je script.js bestand
function resetDonatieOpties() {
    // Reset de donatieopties naar de standaardwaarde van €5
    document.getElementById("donatieOpties").value = "5";
    // Verberg het custom bedragveld indien zichtbaar
    document.getElementById("customBedragDiv").style.display = "none";
    // Reset het custom bedragveld naar leeg
    document.getElementById("donatieBedrag").value = "";
}

function enableCustomDonatie() {
    // Laat het custom bedragveld zien als de optie "Zelf kiezen" is geselecteerd
    var donatieOpties = document.getElementById("donatieOpties");
    var customBedragDiv = document.getElementById("customBedragDiv");

    if (donatieOpties.value === "custom") {
        customBedragDiv.style.display = "block";
    } else {
        customBedragDiv.style.display = "none";
    }
}

function toonDonatieVenster() {
    document.getElementById("donatieOverlay").style.display = "flex";
}

function verbergDonatieVenster() {
    document.getElementById("donatieOverlay").style.display = "none";
}

function bedanktVoorDonatie() {
    var optie = document.getElementById("donatieOpties").value;
    var bedrag;

    if (optie === "custom") {
        bedrag = document.getElementById("donatieBedrag").value;
        if (bedrag === "") {
            alert("Voer alstublieft een geldig bedrag in.");
            return;
        }
    } else {
        bedrag = optie;
    }

    alert("Bedankt voor je donatie van " + bedrag + " euro!");
    verbergDonatieVenster();

    // Voeg de resetDonatieOpties functie toe om de donatieopties te resetten
    resetDonatieOpties();
}

// Voeg de enableCustomDonatie functie toe als onchange event voor het donatieOpties element
document.getElementById("donatieOpties").addEventListener("change", enableCustomDonatie);

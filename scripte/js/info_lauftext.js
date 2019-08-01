let laufi = document.getElementById("lauftext");

let texte = [];

const CONFIG = new Config();

get_random_int = (max) => {
    return Math.floor(Math.random() * Math.floor(max));
};

let a = " sag doch mal irgednwas " + CONFIG.SPIELER[get_random_int(CONFIG.SPIELER.length)] + " dazu hier dzu lappen?!?!!?";
let b = " jetzt muss mir hier in " + CONFIG.ORTE[get_random_int(CONFIG.ORTE.length)] + " wieder irgendein satz einfallen?";
let c = " und noch irgendeine lebensweisheit herr " + CONFIG.SPIELER[get_random_int(CONFIG.SPIELER.length)];
let d = " mehr fällt mir nun aber auch leider nicht ein hier in "+ CONFIG.ORTE[get_random_int(CONFIG.ORTE.length)];

texte.push(a, b, c, d);

let lauf_inhalt = "";

for(let i = 0; i < texte.length; i++)
{
    lauf_inhalt += texte[i];
}

laufi.innerText = lauf_inhalt;
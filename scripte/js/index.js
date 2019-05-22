//elemente aus dem dom holen
let btn_regist = document.getElementById("btn_regist");
let btn_login  = document.getElementById("btn_login");
let div_regist = document.getElementById("div_regist");
let div_login  = document.getElementById("div_login");

//funktionsdefinitionen
show_login = () => {
    div_login.style.display = "block";
    div_regist.style.display = "none";
};

show_registrierung = () => {
    div_login.style.display = "none";
    div_regist.style.display = "block";
};

//elemente an aktion binden und funktionen aufrufen
btn_regist.onclick = () => {show_registrierung()};
btn_login.onclick  = () => {show_login()};
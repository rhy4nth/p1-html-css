let number = document.getElementById("number");
let getal = 0;
function clicker(){
    getal++;
    document.getElementById("number").innerText = getal;
    if (getal == 10) {
        getal = 0;
    }
}

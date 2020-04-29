let i = 0;
if (i == 0) {
    i = 1;
    let elem = document.getElementById("loadingBar");
    let elem2 = document.getElementById("loadingBar2");
    let width = 0;
    let id = setInterval(frame, 5);
    function frame() {
        if(width<=99.7){
            width+=0.1;
            elem.style.width = width + "%";
            elem2.style.width = width + "%";
        }
    }
}

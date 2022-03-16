let popUpButtons = [...document.querySelectorAll(".pop_up_button")];
popUpButtons.forEach(function (btn) {
    btn.onclick = function () {
        console.log("yes");
        let modal = btn.getAttribute("data-pop-up");
        document.getElementById(modal).style.display = "block";
    };
});

let popUpRows = [...document.querySelectorAll(".pop_up_row")];
popUpRows.forEach(function (btn) {
    btn.onclick = function () {
        //pop up modal
        let modal = btn.getAttribute("data-pop-up");
        document.getElementById(modal).style.display = "block";
        //assign values of modal from data row
        let listIn = btn.getElementsByClassName("row_data");
        let listOut = document.getElementById(modal).getElementsByClassName("row_input");
        for(let i=0; i < listOut.length; i++){
            listOut[i].value = listIn[i].innerHTML;
        }
    };
});

let closeButtons = [...document.querySelectorAll(".close")];
closeButtons.forEach(function (btn) {
    btn.onclick = function () {
        let popUp = btn.closest(".pop_up");
        popUp.style.display = "none";
    };
});

window.onclick = function (event) {
    if (event.target.className === "pop_up") {
        event.target.style.display = "none";
    }
};
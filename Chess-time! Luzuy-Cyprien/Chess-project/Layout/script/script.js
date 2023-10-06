let para = document.querySelector("#para-1");

let btn1 = document.querySelector("#btn1");
let chiffre = document.querySelector("#para-1");

btn1.addEventListener("click", () => {
    let number = parseInt(chiffre.innerHTML)
    if (number < 1) {
        number = number +1;
        chiffre.innerHTML = number;
    } else {
        console.log("vous avez déja réagi")
    }

})


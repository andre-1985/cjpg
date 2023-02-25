let lotoBallsCheckbox = document.querySelectorAll("[type=checkbox].checkbox-ball-loto");
let bl = lotoBallsCheckbox.length;
for (let ballLimit = 0; ballLimit<bl; ballLimit++)
    lotoBallsCheckbox[ballLimit].addEventListener("change", function (){
        if (document.querySelectorAll(":checked.checkbox-ball-loto").length > 5)
            this.checked = false;
    }, false);

let luckynumsCheckbox = document.querySelectorAll("[type=checkbox].checkbox-luckynum-loto");
let sl = luckynumsCheckbox.length;
for (let luckynumLimit = 0; luckynumLimit<sl; luckynumLimit++)
    luckynumsCheckbox[luckynumLimit].addEventListener("change", function (){
        if (document.querySelectorAll(":checked.checkbox-luckynum-loto").length > 1)
            this.checked = false;
    }, false);

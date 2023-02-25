let euromillionsBallsCheckbox = document.querySelectorAll("[type=checkbox].checkbox-ball-euromillions");
let bl = euromillionsBallsCheckbox.length;
for (let ballLimit = 0; ballLimit<bl; ballLimit++)
    euromillionsBallsCheckbox[ballLimit].addEventListener("change", function (){
        if (document.querySelectorAll(":checked.checkbox-ball-euromillions").length > 5)
            this.checked = false;
    }, false);

let starsCheckbox = document.querySelectorAll("[type=checkbox].checkbox-star-euromillions");
let sl = starsCheckbox.length;
for (let starLimit = 0; starLimit<sl; starLimit++)
    starsCheckbox[starLimit].addEventListener("change", function (){
        if (document.querySelectorAll(":checked.checkbox-star-euromillions").length > 2)
            this.checked = false;
    }, false);

"use strict";

window.addEventListener("DOMContentLoaded", () => {


// function that takes in a rank and converts that into number of stars 
function manystars(star){

    const rank = document.getElementById("rank");

    switch(star){
        case '1': 
        var stars1 = document.createElement("input");
        stars1.type = "radio";
        stars1.name = "rating";
        stars1.id = "1";
        stars1.value = "1";

        var showstar1 = document.createElement("label");
        showstar1.setAttribute('for','rating');
        showstar1.innerHTML = "☆";

        rank.appendChild(stars1);
        stars1.insertAdjacentElement('afterend',showstar1);
        
        break;

        case '2':
        var stars1 = document.createElement("input");
        stars1.type = "radio";
        stars1.name = "rating";
        stars1.id = "1";
        stars1.value = "1";

        var stars2 = document.createElement("input");
        stars2.type = "radio";
        stars2.name = "rating";
        stars2.id = "2";
        stars2.value = "2";

        var showstar1 = document.createElement("label");
        showstar1.setAttribute('for','rating');
        showstar1.innerHTML = "☆";

        var showstar2 = document.createElement("label");
        showstar2.setAttribute('for','rating');
        showstar2.innerHTML = "☆";

        rank.appendChild(stars1);
        stars1.insertAdjacentElement('afterend',showstar1);

        rank.appendChild(stars2);
        stars2.insertAdjacentElement('afterend',showstar2);
        break;

        case '3':
        var stars1 = document.createElement("input");
        stars1.type = "radio";
        stars1.name = "rating";
        stars1.id = "1";
        stars1.value = "1";

        var stars2 = document.createElement("input");
        stars2.type = "radio";
        stars2.name = "rating";
        stars2.id = "2";
        stars2.value = "2";

        var stars3 = document.createElement("input");
        stars3.type = "radio";
        stars3.name = "rating";
        stars3.id = "3";
        stars3.value = "3";

        var showstar1 = document.createElement("label");
        showstar1.setAttribute('for','rating');
        showstar1.innerHTML = "☆";

        var showstar2 = document.createElement("label");
        showstar2.setAttribute('for','rating');
        showstar2.innerHTML = "☆";

        var showstar3 = document.createElement("label");
        showstar3.setAttribute('for','rating');
        showstar3.innerHTML = "☆";

        rank.appendChild(stars1);
        stars1.insertAdjacentElement('afterend',showstar1);

        rank.appendChild(stars2);
        stars2.insertAdjacentElement('afterend',showstar2);

        rank.appendChild(stars3);
        stars3.insertAdjacentElement('afterend',showstar3);
        break;

        case '4':
        var stars1 = document.createElement("input");
        stars1.type = "radio";
        stars1.name = "rating";
        stars1.id = "1";
        stars1.value = "1";

        var stars2 = document.createElement("input");
        stars2.type = "radio";
        stars2.name = "rating";
        stars2.id = "2";
        stars2.value = "2";

        var stars3 = document.createElement("input");
        stars3.type = "radio";
        stars3.name = "rating";
        stars3.id = "3";
        stars3.value = "3";

        var stars4 = document.createElement("input");
        stars4.type = "radio";
        stars4.name = "rating";
        stars4.id = "4";
        stars4.value = "4";

        var showstar1 = document.createElement("label");
        showstar1.setAttribute('for','rating');
        showstar1.innerHTML = "☆";

        var showstar2 = document.createElement("label");
        showstar2.setAttribute('for','rating');
        showstar2.innerHTML = "☆";

        var showstar3 = document.createElement("label");
        showstar3.setAttribute('for','rating');
        showstar3.innerHTML = "☆";

        var showstar4 = document.createElement("label");
        showstar4.setAttribute('for','rating');
        showstar4.innerHTML = "☆";

        rank.appendChild(stars1);
        stars1.insertAdjacentElement('afterend',showstar1);

        rank.appendChild(stars2);
        stars2.insertAdjacentElement('afterend',showstar2);

        rank.appendChild(stars3);
        stars3.insertAdjacentElement('afterend',showstar3);

        rank.appendChild(stars4);
        stars4.insertAdjacentElement('afterend',showstar4);
        break;

        case '5':

            var stars1 = document.createElement("input");
            stars1.type = "radio";
            stars1.name = "rating";
            stars1.id = "1";
            stars1.value = "1";
    
            var stars2 = document.createElement("input");
            stars2.type = "radio";
            stars2.name = "rating";
            stars2.id = "2";
            stars2.value = "2";
    
            var stars3 = document.createElement("input");
            stars3.type = "radio";
            stars3.name = "rating";
            stars3.id = "3";
            stars3.value = "3";
    
            var stars4 = document.createElement("input");
            stars4.type = "radio";
            stars4.name = "rating";
            stars4.id = "4";
            stars4.value = "4";

            var stars5 = document.createElement("input");
            stars5.type = "radio";
            stars5.name = "rating";
            stars5.id = "5";
            stars5.value = "5";
    
            var showstar1 = document.createElement("label");
            showstar1.setAttribute('for','rating');
            showstar1.innerHTML = "☆";
    
            var showstar2 = document.createElement("label");
            showstar2.setAttribute('for','rating');
            showstar2.innerHTML = "☆";
    
            var showstar3 = document.createElement("label");
            showstar3.setAttribute('for','rating');
            showstar3.innerHTML = "☆";
    
            var showstar4 = document.createElement("label");
            showstar4.setAttribute('for','rating');
            showstar4.innerHTML = "☆";

            var showstar5 = document.createElement("label");
            showstar5.setAttribute('for','rating');
            showstar5.innerHTML = "☆";
    
            rank.appendChild(stars1);
            stars1.insertAdjacentElement('afterend',showstar1);
    
            rank.appendChild(stars2);
            stars2.insertAdjacentElement('afterend',showstar2);
    
            rank.appendChild(stars3);
            stars3.insertAdjacentElement('afterend',showstar3);
    
            rank.appendChild(stars4);
            stars4.insertAdjacentElement('afterend',showstar4);

            rank.appendChild(stars5);
            stars5.insertAdjacentElement('afterend',showstar5);
            break;




    }// end of switch

} // end of dunction manystars

const rank = document.getElementById("rank");

let num_of_star = rank.innerText.charAt(0);

manystars(num_of_star);
})
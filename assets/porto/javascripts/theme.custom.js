/* Add here all your JS customizations */



// FONCTION DE CALCUL DE POINT DE FIDELITE
function calcul(){
    var prix_vente = parseFloat(document.getElementById("Produit").elements['prix_vente'].value);
    var revenue = parseInt((document.getElementById("Produit").elements['prix_vente'].value / 10) * 150);
    document.getElementById("Produit").elements['revenue_point'].value = revenue;
    var cout = parseInt((document.getElementById("Produit").elements['prix_vente'].value * 1.8) * 100);
    document.getElementById("Produit").elements['cout_point'].value = cout;
}


// DATEPICKERS PERSO
$("#date_sortie").datepicker({
    format: "dd-mm-yyyy",
    language: "fr"
});



//FONCTION D'AFFICHARGE
function affichePromotion(){
    var promotionCheck = document.getElementById("Produit").elements['promotionCheck'].checked;

    if(promotionCheck.checked)
    {
        document.getElementById("Produit").elements['promotion'].style = "display: block;";
    }else{
        document.getElementById("Produit").elements['promotion'].style = "display: none;";
    }
}
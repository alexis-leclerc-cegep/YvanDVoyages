require('./bootstrap');



modifierQuantite(quantite, id){
    $.post("./modifier/" + id, {quantite: quantite});
}
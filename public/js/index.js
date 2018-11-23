/* ----- Création et mise en page du formulaire contact ------ */
$('#contact').hide();
$('#formAdmin').hide();

var nom = document.getElementById('nom');
nom.value = "Nom";
nom.style.color = "grey";
nom.style.fontStyle = "italic";
nom.addEventListener("focus", function(){
    if (this.value=="Nom"){
        nom.value = "";
        nom.style.color = "black";
        nom.style.fontStyle = "normal";
    }
});
nom.addEventListener("blur", function(){
    if (this.value==''){
        nom.value = "Nom";
        nom.style.color = "grey";
        nom.style.fontStyle = "italic";
    }
});

var mail = document.getElementById('mail');
mail.value = "E-mail";
mail.style.color = "grey";
mail.style.fontStyle = "italic";
mail.addEventListener("focus", function(){
    if (this.value=="E-mail"){
        mail.value = "";
        mail.style.color = "black";
        mail.style.fontStyle = "normal";
    }
});
mail.addEventListener("blur", function(){
    if (this.value==''){
        mail.value = "E-mail";
        mail.style.color = "grey";
        mail.style.fontStyle = "italic";
    }
});

var subject = document.getElementById('subject');
subject.value = "Sujet (requis)";
subject.style.color = "grey";
subject.style.fontStyle = "italic";
subject.addEventListener("focus", function(){
    if (this.value=="Sujet (requis)"){
        subject.value = "";
        subject.style.color = "black";
        subject.style.fontStyle = "normal";
    }
});
subject.addEventListener("blur", function(){
    if (this.value==''){
        subject.value = "Sujet (requis)";
        subject.style.color = "grey";
        subject.style.fontStyle = "italic";
    }
});

var message = document.getElementById('message');
message.value = "Message (requis)";
message.style.color = "grey";
message.style.fontStyle = "italic";
message.addEventListener("focus", function(){
    if (this.value=="Message (requis)"){
        message.value = "";
        message.style.color = "black";
        message.style.fontStyle = "normal";
    }
});
message.addEventListener("blur", function(){
    if (this.value==''){
        message.value = "Message (requis)";
        message.style.color = "grey";
        message.style.fontStyle = "italic";
    }
});

/* ----- afficher le formulaire de contact ----- */

$('#lienContact').on('click', function(){
    $('#contact').fadeIn(1000);
    $('#formAdmin').hide();
    $('#biog').hide();
    $('.descriptionAuteur').hide();
});

$('#menuAdmin').on('click', function(){
    $('#formAdmin').fadeIn(1000);
    $('#contact').hide();
    $('#biog').hide();
    $('.descriptionAuteur').hide();
});


/* ----- animation chargement de la page ----- */

$('#titre').show();
$('#biog').hide();
$('.descriptionAuteur').hide();
window.onload = function(){
    $('#titre').css({
        "opacity": '1',
        "transition": '3s'
    });
    $('#biog').fadeIn(1500);
    $('.descriptionAuteur').fadeIn(1500);
}
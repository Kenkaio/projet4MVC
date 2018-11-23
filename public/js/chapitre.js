var textarea = false;
$('#ajoutCommentaire').hide();

$('.repondre').on('click', function(){
	id = this.id.substr(10);
	$('#editTextarea'+id).fadeIn(1000);
    changerValue('auteurCom'+id, 'textareaCom'+id);
});

$('h2').on('click', function(){	
    $('#ajoutCommentaire').fadeIn();
    changerValue('auteurCom', 'reponseCom');  
	window.setInterval(function(){
		$("#ajoutCommentaire").scrollTop = $("#ajoutCommentaire").scrollHeight;
		$("#ajoutCommentaire").animate({scrollTop: $("#ajoutCommentaire").scrollHeight},3000);
	}, 2000);
});

function signalementRep()
{
    if(confirm('Confirmez-vous le signalement de ce commentaire ?'))
    {
        document.getElementById('#formSignalementRep').submit();
    }
}

function signalementCom()
{
    if(confirm('Confirmez-vous le signalement de ce commentaire ?'))
    {
        document.getElementById('#formSignalementCom').submit();
    }
}


function changerValue(idTitre, idText){
    var nom = document.getElementById(idTitre);    
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


    var commentaire = document.getElementById(idText);
    commentaire.value = "Votre commentaire";
    commentaire.style.color = "grey";
    commentaire.style.marginTop = '10px';
    commentaire.style.marginLeft = '-3px';
    commentaire.style.fontStyle = "italic";
    commentaire.addEventListener("focus", function(){
        if (this.value=="Votre commentaire"){
            commentaire.value = "";
            commentaire.style.color = "black";
            commentaire.style.fontStyle = "normal";
        }
    });
    commentaire.addEventListener("blur", function(){
        if (this.value==''){
            commentaire.value = "Votre commentaire";
            commentaire.style.color = "grey";
            commentaire.style.fontStyle = "italic";
        }
    });
}

function hideAll()
{
	$('#tablePosts').hide();
	$('#newComments').hide();
	$('#adminArticle').hide();
	$('#newComments').hide();
	$('#newResponses').hide();
	$('.viewOff').hide();
}

hideAll();

$('td').on('click', function(){
	if (this.id == '') {

	}else{
		id = this.id.substr(4);
		if (this.id == 'edit'+id) {
			$('#tablePosts').fadeOut(1000);	
		}
		else if (this.id == 'dele'+id) {

		}
		else{

		}
	}
});

$('#showArticles').on('click', function(){
	hideAll();
	$('#tablePosts').fadeIn(1000);
});

$('#showComments').on('click', function(){
	hideAll();
	$('#newComments').fadeIn(1000);
});

$('#showResponses').on('click', function(){
	hideAll();
	$('#newResponses').fadeIn(1000);
});

$('img').on('click', function(){
	hideAll();
	$('#adminArticle').fadeIn(1000);
});

$('.viewOff').on('click', function(){
	id = document.querySelectorAll('input[type="checkbox"]:checked');
	var identite = new FormData();
	for (var i = 0; i < id.length; i++) {
		// Ajout d'information dans l'objet
		identite.append("id"+i, id[i].id);
		// Création et configuration d'une requête HTTP POST vers le fichier post_form.php		
	}
	var req = new XMLHttpRequest();
	req.open("POST", "../models/log.php");
	// Envoi de la requête en y incluant l'objet
	req.send(identite);	
});

$('input[type="checkbox"]').on('click', function(){
	$('#tr'+this.id.substr(6)).css({
		'backgroundColor':'rgb(255, 255, 255)',
		'transition': '2s'
	});
});

$('input[type="checkbox"]').on('click', function(){
	numberCheked = document.querySelectorAll('input[type="checkbox"]:checked').length;
	if (this.checked) {
		$('#tr'+this.id.substr(6)).css({
			'backgroundColor':'rgb(173, 225, 250)',
			'transition': '2s'
		});
	}
	if (numberCheked > 0) {
		$('.viewOff').fadeIn(500);
	}
	else{
		$('.viewOff').fadeOut(500);
	}
});
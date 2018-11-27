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

$('.fa-bell').on('click', function(){
	hideAll();
	$('#newResponses').fadeIn(1000);
	$('#newComments').fadeIn(1000);
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

$('.viewOff').on('click', function(){
	id = document.querySelectorAll('input[type="checkbox"]:checked');	
    for (var i = 0; i < id.length; i++) {
    	$.post("../models/modelReceptionFichier.php", {	
	    	data:id[i].id
	    }, function (data){
	    	$('.return').html(data);
	    });
    }    
    window.location.reload();
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

$('.modif').on('click', function(){
	id = this.id;
	hideAll();	
	self.location.href="admin.php?com="+id;
});

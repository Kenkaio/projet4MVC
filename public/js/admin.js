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
$( document ).ready(function() {
    upNumber('rep');
	upNumber('com');
});

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
	upNumber('com');
	hideAll();
	$('#newComments').fadeIn(1000);
});

$('#showResponses').on('click', function(){
	upNumber('rep');
	hideAll();
	$('#newResponses').fadeIn(1000);
});

function getXhr(){
    var xhr = null; 
	if(window.XMLHttpRequest) // Firefox et autres
	   xhr = new XMLHttpRequest(); 
	else if(window.ActiveXObject){ // Internet Explorer 
	   try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
	}
	else { // XMLHttpRequest non supporté par le navigateur 
	   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
	   xhr = false; 
	} 
    return xhr;
}

function viewComs(choice){
	var xhr = getXhr()
	// On défini ce qu'on va faire quand on aura la réponse
	xhr.onreadystatechange = function(){
		// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
		if(xhr.readyState == 4 && xhr.status == 200){
			if (choice == 'rep') {
				document.getElementById('tableResponses').innerHTML = xhr.response;
			}
			else if(choice == 'com'){
				document.getElementById('tableComments').innerHTML = xhr.response;
			}
		}
	}
	if (choice == 'rep') {
		xhr.open("GET","../views/viewResponses.php",true);
		xhr.send(null);
	}
	else if (choice == 'com') {
		xhr.open("GET","../views/viewComments.php",true);
		xhr.send(null);
	}	
}

function upNumber(choice){
	var xhr = getXhr()
	// On défini ce qu'on va faire quand on aura la réponse
	xhr.onreadystatechange = function(){
		// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
		if(xhr.readyState == 4 && xhr.status == 200){
			if (choice == 'rep') {
				document.getElementById('hudeRep').innerHTML = xhr.response[1];
			}
			else if(choice == 'com'){
				document.getElementById('hudeCom').innerHTML = xhr.response[1];
			}
		}
	}
	if (choice == 'rep') {
		xhr.open("GET","../models/numberR.json",true);
	xhr.send(null);
	}
	else if (choice == 'com') {
		xhr.open("GET","../models/numberC.json",true);
		xhr.send(null);
	}	
}

$('.viewOff').on('click', function(){
	var choice = this.id;
	id = document.querySelectorAll('input[type="checkbox"]:checked');    
	for (var i = 0; i < id.length; i++) {
    	$.post("../models/modelReceptionFichier.php", {	
	    	data:id[i].id
	    }, function (data){
	    	$('.return').html(data);
	    });
    } 	
   	setTimeout(function(){ 
   		viewComs(choice); 
   	}, 1000);
   	$( document ).ready(function() {
   		if (choice == "rep") {
	   		upNumber('rep');
	   	}else{
	   		upNumber('com');
	   	}
	});
   	
});   		

var numberCheked = 0;

function changeStatus(thisInput){
	
	var id = thisInput.id.substr(9);
	if (thisInput.checked) {
		$('#tr'+id).css({
			'backgroundColor': 'rgb(173, 225, 250)',
			'transition': '2s'
		});
		numberCheked++;
	}else{
		$('#tr'+id).css({
			'backgroundColor': 'rgb(255, 255, 255)',
			'transition': '2s'
		});
		numberCheked--;
	}
	if (numberCheked > 0) {
		$('.viewOff').fadeIn(1000);
	}
	else{
		$('.viewOff').fadeOut(1000);
	}
}

$('.modif').on('click', function(){
	id = this.id;
	hideAll();	
	self.location.href="admin.php?com="+id;
});

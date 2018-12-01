function viewMessagerie(){
	hideAll();
	$('#mails').fadeIn(1000);

	var xhr = getXhr()
	// On défini ce qu'on va faire quand on aura la réponse
	xhr.onreadystatechange = function(){
		// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
		if(xhr.readyState == 4 && xhr.status == 200){
			document.getElementById('ongletTableau').innerHTML = xhr.response;
		}
	}
	xhr.open("GET","../views/viewMessages.php",true);
	xhr.send(null);
}


$('#lu').on('click', function(){
	id = document.querySelectorAll('input[type="checkbox"]:checked');
	for (var i = 0; i < id.length; i++) {
    	$.post("../models/modelReceptionFichier.php", {	
	    	mes:id[i].id
	    }, function (data){
	    	$('.return').html(data);
	    });
    } 	
   	setTimeout(function(){ 
   		viewMessagerie(); 
   	}, 1000);
   	$('body').css({'cursor':'wait'});
   	setTimeout(function(){ 
	   	upNumber('mail');
		$('body').css({'cursor':'default'});
   	}, 1500);	  	
});   	

function deleteMsg(id){
	$.post("../models/modelReceptionFichier.php", {	
	    	deleteMsg:'reload'
	    }, function (data){
	    	$('.return').html(data);
	    });
		xhr.open("GET","../models/json/numberR.json",true);
		xhr.send(null);
}
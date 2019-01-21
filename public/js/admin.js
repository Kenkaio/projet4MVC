$(document).ready(function() {
	setInterval(function(){
		upNumber('com');
		upNumber('sign');
	},1500);
});

/*------- xml en fonction des navigateurs -------*/
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

/*------- affichage des nombres (nouveaux com, nouvelles rep) -------*/
function upNumber(choice){
	var xhr = getXhr()
	// On défini ce qu'on va faire quand on aura la réponse
	xhr.onreadystatechange = function(){
		// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
		if(xhr.readyState == 4 && xhr.status == 200){
			if(choice == 'com'){
				document.getElementById('hudeCom').innerHTML = xhr.response[1];
			}
			else if(choice == 'sign'){
				document.getElementById('hudeSign').innerHTML = xhr.response[1];
			}
		}
	}
	if (choice == 'com') {
		$.post("index.php?action=reloadCom", { reloadCom: "reload" });
		xhr.open("GET","public/assets/json/numberC.json",true);
		xhr.send(null);
	}
	else if (choice == 'sign') {
		$.post("index.php?action=reloadSign", { reloadSign: "reload" });
		xhr.open("GET","public/assets/json/numberS.json",true);
		xhr.send(null);
	}
}

/*------- fonction ajax -------*/
$('.viewOff').on('click', function(){
	var choice = this.id;
	id = document.querySelectorAll('input[type="checkbox"]:checked');
	for (var i = 0; i < id.length; i++) {
    	$.post("../controllers/reload.php", {
	    	data:id[i].id
	    }, function (data){
	    	$('.return').html(data);
	    });
    }
   	setTimeout(function(){
   		viewComs(choice);
   	}, 1000);
   	$('body').css({'cursor':'wait'});
   	setTimeout(function(){
   		if (choice == "rep") {
	   		upNumber('rep');
		}else{
		   	upNumber('com');
		}
		$('body').css({'cursor':'default'});
   	}, 1500);
});

/*------- propriété css -------*/
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

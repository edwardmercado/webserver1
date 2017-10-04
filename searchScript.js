var xhr = false;

function showResult(){
	var word = document.getElementById("txtSearch");
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}
	else{
		if(window.ActiveXObject){
			try{
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
	}
	
	if(xhr){
		xhr.onreadystatechange = showContents;
		xhr.open("GET", "productsForm.php?word="+word, true);
		xhr.send(null);
	}
	else{
		alert("couldnt create XMLHttpRequest");
	}
}

function showContents(){
	if(xhr.readyState == 4){
		if(xhr.status == 200){
			outMsg = xhr.responseText;
		}
		else{
			alert("status "+xhr.status);
		}
		document.getElementById("display").innerHTML = outMsg;
	}
}
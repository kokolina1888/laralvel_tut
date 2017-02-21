var docReady = setInterval(function(){
	if (document.readyState !== 'complete') {
		return;
	}
	clearInterval(docReady);

	var contactMessages = document.getElementsByClassName('contact-message');
	console.log(contactMessages.length)
	//console.log(document.getElementsByClassName('contact-message')[0])
///CHECK FOR ELEMENTS HERE  - WHY THE MODALOPEN AND CLOSE NOT WORKING!!!!
for(var i = 0; i < contactMessages.length; i++){
	contactMessages[i].getElementsByTagName('li')[0].firstElementChild
	.addEventListener('click', modalOpen);
			//console.log(contactMessages[i])
			contactMessages[i].getElementsByTagName('li')[0].firstElementChild.addEventListener('click', modalContent);
			contactMessages[i].getElementsByTagName('li')[1].firstElementChild.addEventListener('click', deleteContactMessage);
		}

		document.getElementById('modal-close').addEventListener('click', modalClose);
	}, 100);

function modalContent(event){
	event.preventDefault();
	var subject = event.path[5].firstElementChild.firstElementChild.innerText;
	var sender = event.path[5].lastElementChild.firstElementChild.innerText;

	var message = event.path[5].dataset['message'];

	var modal = document.getElementsByClassName('modal')[0];
	//console.log(modal)
	var modalSubject = document.createElement('h1');
	var modalSender = document.createElement('h3');
	var modalMessage = document.createElement('p');
	modalSubject.innerText = subject;
	modalSender.innerText = sender;
	modalMessage.innerText = message;
	modal.insertBefore(modalMessage, modal.childNodes[0]);
	modal.insertBefore(modalSender, modal.childNodes[0]);
	modal.insertBefore(modalSubject, modal.childNodes[0]);
}

function deleteContactMessage(event){
	event.preventDefault();
	event.target.removeEventListener('click', deleteContactMessage);
	var messageId = event.path[5].dataset['id'];
	ajax('GET', 'message/'+messageId+'/delete', null, messageDeleted, [event.path[5]]);

}

function messageDeleted(params, success, responseObj){
	var article = params[0];
	if (success) {
		article.style.backgroundColor = '#ffc4bo';
		setTimeout(function(){
			article.remove();
			location.reload();
		}, 300);
	}
}


/****AJAX FUNC****/
function ajax(method, url, params, callback, calbackParams){
	var http;
	//console.log(window.XMLHttpRequest);
	if(window.XMLHttpRequest){
		http = new XMLHttpRequest();
	}
	else {
		http = new ActiveXObject("Microsoft.XMLHTTP");
	}
	http.onreadystatechange = function(){
		var obj,
		p;
		p = document.getElementById('info-p');
	//	console.log(p);
	if(http.readyState == XMLHttpRequest.DONE){
		
		if (http.status == 200) {				
			obj = JSON.parse(http.responseText);
				//console.log(obj.message);
				//p.innerHTML = obj.message;			
				//alert(obj.message);	
				callback(calbackParams, true, obj);
			} else if (http.status == 400) {
				//p.innerHTML = obj.message;	
				alert('Category could not be saved. Please try again');
				callback(callbackParams, false);				
			} else {
				
				obj = JSON.parse(http.responseText);
				if (obj.message) {
					alert(obj.message);
				} else {
					alert('Please check the name');
				}			
			}
		}
	};

	http.open(method, url, true);
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	http.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	http.send(params + "&_token="+token);
}

var docReady = setInterval(function(){
	if (document.readyState !== 'complete') {
		return;
	}
	clearInterval(docReady);
	var editSections = document.getElementsByClassName('edit');

	var i = 0;
for(i = 0; i < editSections.length; i++){
	editSections[i].firstElementChild.firstElementChild
	.children[1].firstChild
	.addEventListener('click', startEdit);
	editSections[i].firstElementChild.firstElementChild
	.children[2].firstChild
	.addEventListener('click', startDelete);
	console.log(editSections[i].firstElementChild.firstElementChild
	.children[2].firstChild);
}
	document.getElementsByClassName('btn')[0].addEventListener('click', createNewCategory);
	
}, 100);



function createNewCategory(event){
	event.preventDefault();
	var name = event.target.previousElementSibling.value;
	if(name.length === 0){
		alert('Please enter a valid category name');
		return;
	}
	console.log(name);
	ajax('POST', 'category/create', 'name='+name, newCategoryCreated, [name]);
}
function newCategoryCreated(params, success, responseObj){
	location.reload();
}
function startEdit(event){
	event.preventDefault();
	event.target.innerText = 'Save';

	var li = event.path[2].children[0];
	//console.log(event.path[4].previousElementSibling.children[0].innerText);
	li.children[0].value = event.path[4]
							.previousElementSibling
							.children[0].innerText;
	li.style.display = 'inline-block';
	//console.log(li.children[0].style.maxWidth);

	setTimeout(function(){
		li.children[0].style.maxWidth = '110px';
	});

	event.target.removeEventListener('click', startEdit);
	event.target.addEventListener('click', saveEdit);

}
function saveEdit(event){
	event.preventDefault();
	var li = event.path[2].children[0];
	var categoryName = li.children[0].value;
	//console.log(li.children[0].value);
	var categoryId = event.path[4].previousElementSibling.dataset['id'];
	if (categoryName.length === 0) {
		alert('enter a valid category name');
		return;
	}
	ajax('POST', 'categories/update', 'name=' + categoryName + '&category_id='+categoryId, endEdit, [event]);

}

function endEdit(params, success, responseObj){
	var event = params[0];
	
	if (success) {
		var newName = responseObj.name;
		var article = event.path[5];
		article.style.backgroundcolor = '#afefac';
		setTimeout(function(){

			article.style.backgroundcolor = '#fff';
		}, 300);
		article.firstElementChild.firstElementChild.innerHTML = newName;
	}
	event.target.innerText = 'Edit';
	var li = event.path[2].children[0];
	li.children[0].style.maxWidth = '0px';
	setTimeout(function(){
		li.style.display = 'none';
	}, 300);

	event.target.removeEventListener('click', saveEdit);
	event.target.addEventListener('click', startEdit);

}

/***DELETE EVENT***/

function startDelete(event){
	//open modal to ask if user is sure

	deleteCategory(event);

}

function deleteCategory(event){
	event.preventDefault();
	event.target.removeEventListener('click', startDelete);
	var categoryId = event.path[4].previousElementSibling.dataset['id'];
	ajax('GET', 'category/'+categoryId+'/delete', null, categoryDeleted, [event.path[5]]);
}

function categoryDeleted(params, success, responseObj){
	var article = params[0];
	//article.style.backgroundcolor = '#F64343';

	if (success) {
		article.style.backgroundColor = '#F64343';
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





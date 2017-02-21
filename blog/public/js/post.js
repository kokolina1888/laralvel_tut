var addedCategoriesText;
var addedCategoriesIds;

var docReady = setInterval(function(){
	if (document.readyState !== 'complete') {
		return;
	}

clearInterval(docReady);

var addCategoryBtn = document.getElementsByClassName('btn')[0];
addedCategoriesIds = document.getElementById('categories');

addCategoryBtn.addEventListener('click', addCategoryToPost);

addedCategoriesText = document.getElementsByClassName('added_categories')[0];

var len = addedCategoriesText.firstElementChild.children.length;
for(var i = 0; i < len; i++){
	addedCategoriesText.firstElementChild
	.children[i].firstElementChild
	.addEventListener('click', removeCategoryFromPost);


}

}, 100);

function addCategoryToPost(event) {
	var select = document.getElementById('category_select');

	var selectedCategoryId = select.options[select.selectedIndex].value;
	var selectedCategoryName = select.options[select.selectedIndex].text;


		if (addedCategoriesIds.value.split(',').indexOf(selectedCategoryId) != -1) {
			return;
		}

		if(addedCategoriesIds.value.length > 0){
			addedCategoriesIds.value = addedCategoriesIds.value + ',' + selectedCategoryId;
		} else {
			addedCategoriesIds.value = selectedCategoryId;
		}

console.log(addedCategoriesIds)
		var newCategoryLi = document.createElement('li');
		var newCategoryLink = document.createElement('a');
		console.log(newCategoryLink);
		newCategoryLink.href = '#';
		newCategoryLink.innerText = selectedCategoryName;
		newCategoryLink.dataset['category_id'] = selectedCategoryId;
		newCategoryLink.addEventListener('click', removeCategoryFromPost);
		newCategoryLi.appendChild(newCategoryLink);
		addedCategoriesText.firstElementChild.appendChild(newCategoryLi); 

}

function removeCategoryFromPost(event){
	event.preventDefault();
	// event.target.removeEventListener('click', removeCategoryFromPost);

	var categoryId = event.target.dataset['category_id'];
	//console.log(addedCategoriesIds.value);
	var categoryIdArray = addedCategoriesIds.value.split(',');
	//console.log(categoryIdArray)
	var index = categoryIdArray.indexOf(categoryId);
	//console.log(index);
	categoryIdArray.splice(index, 1);
	console.log(categoryIdArray)
	var newCategoriesIds = categoryIdArray.join(',');
	console.log(newCategoriesIds)

	addedCategoriesIds.value = newCategoriesIds;
	console.log(addedCategoriesIds)

	event.target.parentElement.remove();
	console.log(event.target.parentElement.remove())
}
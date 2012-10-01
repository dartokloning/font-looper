/* Author: 

*/









$(function(){
	$('.controls').tabs();
})

var inputElement = document.getElementById("submitted-font");
inputElement.addEventListener("change",handleFiles,false);

function handleFiles(){
	var fileList = this.files;
	
	var objectUrl = window.URL.createObjectURL(fileList[0]);
	
	console.log(objectUrl);
	
	$("<style>@font-face{ font-family: 'file-font'; src: url('"+ objectUrl +"');} .char-map span{ font-family: 'file-font'; }</style>").appendTo('head');
	
	window.URL.revokeObjectURL(fileList[0]);
	console.log(fileList);
}













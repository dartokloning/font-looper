/* Author: 

*/

//Array of acceptable last three characters, currently cheating ".woff" extension, for a quiet life

var extensions = ['off','otf','ttf','eot'];

var inputLocalFont = document.getElementById("submitted-font");
inputLocalFont.addEventListener("change",handleFiles,false);

function handleFiles(){
	var fileList = this.files;
	
	var anyWindow = window.URL || window.webkitURL;
	
	var objectUrl = anyWindow.createObjectURL(fileList[0]);
	
	console.log(objectUrl);
	
	$('head').children('style').remove();
	$("<style>@font-face{ font-family: 'file-font'; src: url('"+ objectUrl +"');} .char-map span{ font-family: 'file-font'; }</style>").appendTo('head');
	
	window.URL.revokeObjectURL(fileList[0]);
	console.log(fileList);
}

$('#web-font-file').keyup(function(){
	
	var fontUrl = $(this).val();
	
	//Add http:// if necessary
	
	if(fontUrl.slice(7) !== "http://"){
		fontUrl = "http://" + fontUrl;
	}
	
	var lastThreeChars = fontUrl.slice(-3);
	
	if(extensions.indexOf(lastThreeChars) > -1){
		$.ajax({
        type: 'HEAD',
        url: fontUrl,
        success: function () {
        	$('head').children('style').remove();
			$("<style>@font-face{ font-family: 'file-font'; src: url('"+ fontUrl +"');} .char-map span{ font-family: 'file-font'; }</style>").appendTo('head');	
			$('#web-font-file').addClass('correct');
			$('#web-font-file').removeClass('erroneous');
	        }
	       });
        
		
	}else{
		$('#web-font-file').removeClass('correct');
		$('#web-font-file').addClass('erroneous');
	}
	
	
});










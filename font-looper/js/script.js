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
	var currentFontName = fileList[0].name;
	console.log(fileList[0].name + "sausages");
	
	if(currentFontName.indexOf("zamafontawesome") >= 0){
		$('.char-map').load('custom-range.php?range_start=61440&range_end=61700');
		$('input.range-start').val('61440');
		$('input.range-end').val('61700');	
	}else{
		$('.char-map').load('custom-range.php?range_start=33&range_end=255');
		$('input.range-start').val('33');
		$('input.range-end').val('255');	
	}
	
	//console.log(objectUrl);
	
	$('head').children('style').remove();
	$("<style>@font-face{ font-family: 'file-font'; src: url('"+ objectUrl +"');} .char-map span{ font-family: 'file-font'; }</style>").appendTo('head');
	
	window.URL.revokeObjectURL(fileList[0]);
	//console.log(fileList);
}

$('#web-font-file').keyup(function(){
	
	var fontUrl = $(this).val();
	//console.log(fontUrl);
	
	//Add http:// if necessary
	
	if(fontUrl.slice(0,7) !== "http://"){
		fontUrl = "http://" + fontUrl;
		//console.log(fontUrl.slice(0,7));
	}
	
	if(fontUrl.indexOf("fontawesome") >= 0){
		$('.char-map').load('custom-range.php?range_start=61440&range_end=61700');
		$('input.range-start').val('61440');
		$('input.range-end').val('61700');	
	}else{
		$('.char-map').load('custom-range.php?range_start=33&range_end=255');
		$('input.range-start').val('33');
		$('input.range-end').val('255');	
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
			
			//console.log("Remote font looks good");
	       },
	      error: function(){
	      	//console.log("Remote file not found");
	      	
			$('#web-font-file').removeClass('correct');
			$('#web-font-file').addClass('erroneous');
	      }
	    });
        
		
	}else{
		$('#web-font-file').removeClass('correct');
		$('#web-font-file').addClass('erroneous');
	}
	
	
});

var characterRange = {};

function rangeMod(){
	if($('input.range-start').val() != characterRange.start || $('input.range-end').val() != characterRange.end){
		characterRange.start = $('input.range-start').val();
		characterRange.end = $('input.range-end').val();	
		if((characterRange.end - characterRange.start) > 0){
			$('.char-map').load('custom-range.php?range_start='+ characterRange.start +'&range_end='+characterRange.end);
		}
	}

}
$('form').on("change keyup","input.num-range",function(){
	if((parseInt($('input.range-end').val()) - parseInt($('input.range-start').val())) < 501){
		rangeMod();
	}else{
		$('input.range-end').val(parseInt($('input.range-start').val()) + 500);
		rangeMod();
	}
	
});

$('.skim-private').click(function(){
	$('.char-map').load('custom-range.php?pua_skim=true');
	
	
	
	return false;
});

$('.char-map').on("click","div.pua",function(){
	var focusedCode = parseInt($(this).children('span').data('decimal'));
	console.log(focusedCode);
	$('.char-map').load('custom-range.php?range_start='+ (focusedCode - 10) +'&range_end='+ (focusedCode + 489),
	function(){
		$(".char-map").on("change","#pua-code-"+focusedCode,function(){
			$('html, body').animate({
		         scrollTop: $("#pua-code-"+focusedCode).offset().top
		     }, 2000);
		})
			
	});

})











<?php include "code.php"; ?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Font Looper - because you can't spend all day puzzling over icon fonts</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <!-- CSS: implied media=all -->
  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.24.custom.css">
  <link rel="stylesheet" href="css/grid.css">
  
  <!-- php generated style -->
  <style>
  	  	@font-face {
		    font-family: 'LoopedFont';
		    src: url('<?php echo $active_font.'/'.$font_files['eot'];?>');
		    src: url('<?php echo $active_font.'/'.$font_files['eot'];?>?#iefix') format('embedded-opentype'),
		         url('<?php echo $active_font.'/'.$font_files['woff'];?>') format('woff'),
		         url('<?php echo $active_font.'/'.$font_files['ttf'];?>') format('truetype'),
		         url('<?php echo $active_font.'/'.$font_files['svg'];?>#LoopedFont') format('svg');
		    font-weight: normal;
		    font-style: normal;
		
		}
		.char-map span{
			font-family: 'LoopedFont';
		}
  </style>
  
  
  <!-- end CSS-->

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

  <div id="font-looper">
    <header>
    	<div  class="container_16 clearfix">
			<div class="grid_16">
				<div class="title">
					<h1>Font Looper</h1>
					<p>because you can't spend all day puzzling over icon fonts</p>
				</div>
				<div class="by-calcium">
					<h2>by <a href="http://www.calcium.ie/"><span>Ca</span>lcium</a></h2>
				</div>
		</div>
    </header>
    <div id="main" role="main" class="container_16">
    	<div class="grid_5 controls-wrapper">
			<div class="controls">
				<h2>What is this for?
				</h2>
				<p>Font Looper is a simple tool whcih shows you how characters in an icon font map to keyboard characters.</p>
				<h2>How do I use it?</h2>
				<p>Just use the form to select a font on your computer, and the character map on the right will change.
					The font won't be uploaded, all the important things happen client-side. Thanks, File API.
				</p>
					<form id="local-font-form">
	
						
						<fieldset>
							<label>Select a font file on your computer</label>
							<input type="file" id="submitted-font" class="local-font-file" />
						</fieldset>
						<p class="orp">or</p>
						<fieldset>
							<label>Provide the url for a font on a server</label>
							<input type="text" id="web-font-file" />
							<span class="check"></span>
						</fieldset>
						
							<p>You can only see a font if your browser supports it.</p>
							<p>The magic will only happen with .eot, .woff, .ttf and .svg files. I recommend .woff, as it has the best support these days.</p>
						<div class="advanced">
							<div class="title">
								
							</div>
							<fieldset>
								<strong>Custom character range</strong><br />
								<label for="">From</label><input type="" class="num-range range-start" />
								<label for="">To</label><input type="" class="num-range range-end" />
								<p>Enter a decimal number (not hexadecimal) for the first and last character in the range you want to see on the right.<br />
									<strong>This is currently limited to 500 characters from the first value.</strong>
								</p>
							</fieldset>
						</div>
						<!-- Next step
						<span class="numbering">2.</span>
						<fieldset>
							<label>Provide the url for a font on a server</label>
							<input type="text" class="web-font-file" />
							
						</fieldset>
						-->
					</form>
					
			
				
			</div>
		</div>
		<div class="grid_11">
			<div class="char-map" >
				<?php foreach($all_chars as $i => $k):?>
					<div><?php echo $k,'<span data-unicode-hex=\'',str_pad(dechex($i),4,0,STR_PAD_LEFT),'\' data-unicode-dec=',$i,'>',$k,'</span>';?></div>
				<?php endforeach;?>
			</div>

		</div>
		
    </div>
    <footer>

    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>
  <script src="/js/libs/jquery-ui-1.8.24.custom.min.js"></script>


  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="js/plugins.js"></script>
  <script defer src="js/script.js"></script>
  <!-- end scripts-->

	
  <!-- Change UA-XXXXX-X to be your site's ID -->
  <script>
    //window._gaq = [['_setAccount','UA-XXXXX-X'],['_trackPageview'],['_trackPageLoadTime']];
    //Modernizr.load({
     // load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    //});
  </script>


  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>

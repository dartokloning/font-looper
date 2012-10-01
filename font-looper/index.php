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

  <title>Font Looper</title>
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
    <header class="container_16">
		<div class="grid_8">
			<h1>Font Looper</h1>
		</div>
		<div class="grid_8">
			<h2>by <span>Ca</span>lcium</h2>
		</div>
    </header>
    <div id="main" role="main" class="container_16">
    	<div class="grid_5">
			<div class="controls">
				<ul>
					<li><a href="#tab-1">Local Fonts
						</a></li>
					<li><a href="#tab-2">Server Fonts
						</a></li>
					<li><a href="#tab-3">Tab Name 03
						</a></li>
				</ul>
				
				<div id="tab-1" class="local-fonts">
					<form id="local-font-form">
						<p>
							Pick a font from your computer to map it.
						</p>
						<fieldset>
							<input type="file" id="submitted-font" class="local-font-file" />
						</fieldset>
						
					</form>
					<img id="wawa" src="" />
					
				</div>
				<div id="tab-2">
					<?php if(count($font_folders) > 0):?>
		    	<h1><?php echo $folder_name; ?></h1>
		    	<p>(<em><?php echo $folder_name; ?></em>)</p>
		    	
		    	<div>
		    	<h2>Fonts Available</h2>
		    	<ul>
				<?php foreach($font_folders as $k => $font):?>
					<li><a href="?font_folder=<?php echo $font;?>"><?php echo $font;?></a></li>
				<?php endforeach; ?>
				<?php else:?>
					<li>No font folders found</li>
				</ul>	
				<?php endif; ?>
				</div>
				<div>
				  <p>A folder called 'fonts' should be in the same directory as this file.<br />
				  	Each font should have it's own folder within that.<br />
				  	.ttf, .woff, .eot and .svg are all supported.
				  	</p>
				  	<p>Click on the font folder name on the left to change the character map to the font in that folder.</p>
				</div>
				</div>
				<div id="tab-3"></div>
				
			</div>
		</div>
		<div class="grid_11">
			<div class="char-map" >
				<?php foreach($all_chars as $i => $k):?>
					<div><?php echo $k,'<span>',$k,'</span>';?></div>
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
    //window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
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

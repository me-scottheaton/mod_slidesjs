<?php 
// No direct access
defined('_JEXEC') or die;
JHtml::_('behavior.framework', true);
?>
<?php if (($thisoutput == 'nothome') && ($max !== 0)): // website visitor is not on homepage, and there are images to display based on date ?>
<?php
$loadjquery = NULL;
JLoader::import( 'joomla.version' );
$version = new JVersion();
if (version_compare( $version->RELEASE, '2.5', '<=')) {
	if (JFactory::getApplication()->get('jquery') !== true) {
		$loadjquery = TRUE;	
	}
} else {
	JHtml::_('jquery.framework');
}
?>
<style>
#slideshow {
	background-color: #000000;
	min-width: 900px;
}

#module_slides {
	padding: 24px 0 10px 0;
	clear: both;
	position:relative;
	width:900px;
	margin: auto;
}
 
.slides_container {
	width:900px;
	height:635px;
	overflow:hidden;
	position:relative;
	z-index: 1;
}

.slides_container a,
.slides_container img {
	display: block;
	width:900px;
	height:635px;
}

#module_slides .next,
#module_slides .prev {
	position:absolute;
	top:24px;
	left: 0px;
	width:38px;
	height:38px;
	background-image:url(<?php echo $thisbaseurl; ?>templates/jaxstorm-black/images/slides_arrows.png);
	z-index:10;
}

#module_slides .next {
	left:176px;
}

.module_slides_nav {
	display: none;
}

.module_slides_nav a.prev {
	background-position: 0 0;
	margin: 250px 0 0 0px; /* scott added: was margin: 181px 0 0 0px; */
}

.module_slides_nav a:hover.prev {
	background-position: 80px 200px;
}

.module_slides_nav a.next {
	background-position: 160px 0;
	margin: 250px 0 0 686px; /* scott added: was 181px 0 0 686px; */
}

.module_slides_nav a:hover.next {
	background-position: 40px 200px;
}

#module_slides ul.pagination {
	border: 0;
	position: absolute;
	z-index: 10;
	margin: -36px 0 0 -20px;
}

#module_slides ul.pagination li {
	float:left;
	margin: 0 -3px 0 0;
	list-style:none;
	padding-top: 10px;
	padding-left: 5px;
	padding-right: 5px;	
}

#module_slides ul.pagination li a {
	display:block;
	width:12px;
	height:0;
	padding-top:12px;
	background: url(<?php echo $thisbaseurl; ?>templates/jaxstorm-black/images/slides_arrows.png) 0 160px;
	float:left;
	overflow:hidden;
}

#module_slides ul.pagination li.current a {
	background: url(<?php echo $thisbaseurl; ?>templates/jaxstorm-black/images/slides_arrows.png) 188px 160px;
}
</style>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $thisbaseurl; ?>templates/jaxstorm-black/js/slides.js"></script>

	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#module_slides').slides({
				play: 5000,
				pause: 2500,
				hoverPause: true<?php if ($slideseffect == 1): ?>,
				effect: 'fade',
				crossfade: true,
				fadeSpeed: 500<?php endif; ?>
			});
		});
		
		jQuery(document).ready(function() {
			jQuery("#module_slides").hover(function() {
		    	jQuery(".module_slides_nav").css("display", "block");
		  	},
		  		function() {
		    	jQuery(".module_slides_nav").css("display", "none");
		  	});
		});
	</script>

	<div id="slideshow">
		<div id="module_slides">
			<div class="slides_container">
			
                <?php /* echo images to SlidesJS div in template pages */
                for($i = 0; $i < $max; $i++)
                {
                    foreach($images as $key => $value) {
                        if ($i == $key) { echo '<img src="'.$value.'" alt="" />'; }
                    }
                }
                ?>
                
			</div>
			<div class="module_slides_nav">
				<a href="#" class="prev"></a>
				<a href="#" class="next"></a>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php 
require_once('src/Minify.php');
require_once('src/CSS.php');
require_once('src/JS.php');
require_once('src/Exception.php');
require_once('src/Converter.php');

use MatthiasMullie\Minify;

class assets {
	public $cssFiles = array(
		"../lib/bootstrap/css/bootstrap.css",
		"../lib/bootstrap-datepicker/css/bootstrap-datepicker.min.css",
		"../lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css",
		"../lib/owl-carousel/owl.carousel.css",
		"../lib/Swiper/css/swiper.min.css",
		"../lib/vegas/vegas.min.css",
		"../lib/jquery.mb.YTPlayer/css/jquery.mb.YTPlayer.min.css",
		"../lib/Magnific-Popup/magnific-popup.css",
		"../lib/sweetalert/sweetalert.css",
		"../lib/smartmenus/sm-core-css.css",
		"../lib/smartmenus/jquery.smartmenus.bootstrap.css",

		"../lib/font-awesome/css/font-awesome.min.css",
		"../lib/Icon-font-7-stroke-PIXEDEN/css/pe-icon-7-stroke.css",
		"../lib/et-line-font/style.css",
		"../lib/themify-icons/themify-icons.css",
		
		"../css/animate.css",
		"../css/main.css",
		"../css/rgen-grids.css",
		"../css/helper.css",
		"../css/responsive.css"
	);
	public $jsFiles = array(
		"../lib/jquery/jquery.min.js",
		"../lib/bootstrap/js/bootstrap.min.js",
		"../lib/Swiper/js/swiper.jquery.min.js",
		"../lib/jquery-validation/jquery.validate.min.js",
		"../lib/bootstrap-datetimepicker/js/moment.min.js",
		"../lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js",
		"../lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js",
		"../js/plugins.js"
	);

	public function cssMinify($cssList, $inlineCSS = '', $fileKey = ''){
		$cssMinifier = new Minify\CSS();

		if (sizeof($cssList) > 0) {
			// All CSS files
			foreach ($cssList as $key => $value) {
				$cssMinifier->add($value);
			}
			
			// In-line CSS minify
			$cssMinifier->add($inlineCSS);

			$minifiedPath = $fileKey.'.css';
			$cssMinifier->minify($minifiedPath);
		}
	}

	public function jsMinify($jsList, $fileKey = ''){
		$jsMinifier = new Minify\JS();

		if (sizeof($jsList) > 0) {
			// All JS files
			foreach ($jsList as $key => $value) {
				$jsMinifier->add($value);
			}

			$minifiedPath = $fileKey.'.js';
			$jsMinifier->minify($minifiedPath);
		}
	}
}

$assetClass =  new assets();
$assetClass->cssMinify($assetClass->cssFiles, '', 'rgen_min');
$assetClass->jsMinify($assetClass->jsFiles, 'rgen_min');

?>
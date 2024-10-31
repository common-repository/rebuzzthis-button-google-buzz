<?php

/*

Plugin Name: RebuzzThis

Plugin URI: http://www.rebuzzthis.com

Description: Automatically displays a RebuzzThis Google Buzz on your Wordpress blog. Choose what style and where to place it.

Version: 1.0.1

Author: Manu Gill - Developer at RebuzzThis

Author URI: http://www.rebuzzthis.com/about.php



Copyright (C) RebuzzThis 2009

*/



if (!class_exists("rebuzzthis")) {

	class rebuzzthis {

		var $adminOptionsName = "rebuzzthisAdminOptions";

		function rebuzzthis() { //constructor

		}



		//Returns an array of admin options

		function getAdminOptions() {

			$rZEtAdminOptions = array('home' => 'true', 'post' => 'true', 'page' => 'true', 'tag' => 'true', 'arch' => 'true', 'srch' => 'true', 'display1' => 'true', 'style' => 'true');

			$rZEtOptions = get_option($this->adminOptionsName);

			if (!empty($rZEtOptions)) {

				foreach ($rZEtOptions as $key => $option)

				$rZEtAdminOptions[$key] = $option;

			}

			update_option($this->adminOptionsName, $rZEtAdminOptions);

			return $rZEtAdminOptions;

		}

		function init() {

			$this->getAdminOptions();

		}



		//Prints out the admin page

		function printAdminPage() {

			$rZEtOptions = $this->getAdminOptions();

			if (isset($_POST['update_rebuzzthisSettings'])) {

			

				// Save Settings

				if($_POST['home'] == "on") update_option('rZEt_home', "checked=on");

  				else update_option('rZEt_home', "");

  				if($_POST['post'] == "on") update_option('rZEt_post', "checked=on");

  				else update_option('rZEt_post', "");

  				if($_POST['page'] == "on") update_option('rZEt_page', "checked=on");

  				else update_option('rZEt_page', "");

  				if($_POST['tag'] == "on") update_option('rZEt_tag', "checked=on");

  				else update_option('rZEt_tag', "");

  				if($_POST['arch'] == "on") update_option('rZEt_arch', "checked=on");

  				else update_option('rZEt_arch', "");

  				if($_POST['srch'] == "on") update_option('rZEt_srch', "checked=on");

  				else update_option('rZEt_srch', "");

  				$rz_display1 = $_POST['display1'];

  				$rz_style = $_POST['style'];



				// Update Settings

				update_option('rZEt_display1', $rz_display1);

				update_option('rZEt_style', $rz_style);



				// Update Admin

				update_option($this->adminOptionsName, $rZEtOptions);

?>

<div class="updated"><p><span class="tblBold"><?php _e("Options Updated!", "rebuzzthis");?></span></p></div>

<?php

			} else {

				// Retrieve Options

				$rz_display1 = get_option('rZEt_display1');

				$rz_style = get_option('rZEt_style');

			}

?>

<div class="wrap">

<h2><?php _e('RebuzzThis Settings','rebuzzthis'); ?></h2>

<style type="text/css">

<!--

.tblPad td{padding:10px;text-align:left;}

.tblPad th{text-align:left;vertical-align:top;}

.tblRed{color:red;font-weight:700;}

.tblBold{font-weight:700;}

-->

</style>

<form class="form-table" method="post" action="<?php _e($_SERVER["REQUEST_URI"]); ?>">

<?php //Display Settings ?>



    <div class="postbox">

      <div class="inside">

<table width="100%">

<tr>

<th scope="row">

Hide Buttons On...

</td><td>

<span class="tblBold">

<input type="checkbox" name="home" <?php _e(get_option('rZEt_home')); ?> /> Homepage<br />

<input type="checkbox" name="post" <?php _e(get_option('rZEt_post')); ?> /> Posts<br />

<input type="checkbox" name="page" <?php _e(get_option('rZEt_page')); ?> /> Pages<br />

<input type="checkbox" name="tag" <?php _e(get_option('rZEt_tag')); ?> /> Tag Pages<br />

<input type="checkbox" name="arch" <?php _e(get_option('rZEt_arch')); ?> /> Archives<br />

<input type="checkbox" name="srch" <?php _e(get_option('rZEt_srch')); ?> /> Search Page Results<br />

<br />

</span>

</td></tr>

<tr>

<th scope="row">

Button Position

</td><td>

<select id="display1" name="display1">

	<option value="" <?php _e($rz_display1=="" ? "selected" : ""); ?>>Right</option>

	<option value="left" <?php _e($rz_display1=="left" ? "selected" : ""); ?>>Left</option>

</select>

</td></tr>

</table>

<?php //Button Settings ?>

<table width="100%">

<tr>

<th scope="row">

Choose Style

</td><td style="vertical-align:top;">

<select id="style" name="style">

	<option value="" <?php _e($rz_style=="" ? "selected" : ""); ?>>Style 1</option>

	<option value="2" <?php _e($rz_style=="2" ? "selected" : ""); ?>>Style 2</option>

	<option value="3" <?php _e($rz_style=="3" ? "selected" : ""); ?>>Style 3</option>

	<option value="4" <?php _e($rz_style=="4" ? "selected" : ""); ?>>Style 4</option>

	<option value="5" <?php _e($rz_style=="5" ? "selected" : ""); ?>>Style 5</option>

	<option value="6" <?php _e($rz_style=="6" ? "selected" : ""); ?>>Style 6</option>

	<option value="7" <?php _e($rz_style=="7" ? "selected" : ""); ?>>Style 7</option>

	<option value="8" <?php _e($rz_style=="8" ? "selected" : ""); ?>>Style 8</option>

	<option value="9" <?php _e($rz_style=="9" ? "selected" : ""); ?>>Style 9</option>

	<option value="10" <?php _e($rz_style=="10" ? "selected" : ""); ?>>Style 10</option>

	<option value="11" <?php _e($rz_style=="11" ? "selected" : ""); ?>>Style 11</option>

	<option value="12" <?php _e($rz_style=="12" ? "selected" : ""); ?>>Style 12</option>

	<option value="13" <?php _e($rz_style=="13" ? "selected" : ""); ?>>Style 13</option>

	<option value="14" <?php _e($rz_style=="14" ? "selected" : ""); ?>>Style 14</option>

</select>



</td>

<td>

<img src="http://www.rebuzzthis.com/images/wp_style_list.png" />

</td></tr>

</table>

      </div>

    </div>



	<input type="submit" name="update_rebuzzthisSettings" value="<?php _e('Update Settings', 'rebuzzthis') ?>" class="button-primary action" /><br /><br />

</form>

</div>

<?php

		}

	}

}



// Get Plugin URL

function rebuzzthis_Url() {

	$path = dirname(__FILE__);

	$path = str_replace("\\","/",$path);

	$path = trailingslashit(get_bloginfo('wpurl')) . trailingslashit(substr($path,strpos($path,"wp-content/")));

	return $path;

}



// Initialize the admin panel

if (!function_exists("rebuzzthis_ap")) {

	function rebuzzthis_ap() {

		global $rZEt_init;

		if (!isset($rZEt_init)) {

			return;

		}

		if (function_exists('add_options_page')) {

			add_options_page('RebuzzThis Settings', 'RebuzzThis', 9, basename(__FILE__), array(&$rZEt_init, 'printAdminPage'));

		}

	}

}



// Create Button

if (!function_exists("rebuzzthis_But")) {

	function rebuzzthis_But($content) {

		// Retrieve Options

		$rz_display1 = get_option('rZEt_display1');

		$rz_style = get_option('rZEt_style');



?>







<div style="padding:5px; float:<?php if($rz_display1==""){ echo"right"; }else{ echo"left"; } ?>;">

<?php



if($rz_style == ""){

?>

	<iframe src="http://www.rebuzzthis.com/button_large.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=1" border="0" style="border:0px;" width="46px" height="56px" scrolling="no"></iframe>

<?php

}else if($rz_style == "2"){

?>

	<iframe src="http://www.rebuzzthis.com/button_large.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=2" border="0" style="border:0px;" width="46px" height="56px" scrolling="no"></iframe>

}else if($rz_style == "3"){

?>

	<iframe src="http://www.rebuzzthis.com/button_large.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=3" border="0" style="border:0px;" width="46px" height="56px" scrolling="no"></iframe>

<?php

}else if($rz_style == "4"){

?>

	<iframe src="http://www.rebuzzthis.com/button_large.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=4" border="0" style="border:0px;" width="46px" height="56px" scrolling="no"></iframe>

<?php

}else if($rz_style == "5"){

?>

	<iframe src="http://www.rebuzzthis.com/button_gicon.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=1" border="0" style="border:0px;" width="46px" height="60px" scrolling="no"></iframe>

<?php

}else if($rz_style == "6"){

?>

	<iframe src="http://www.rebuzzthis.com/button_compact.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=1" border="0" style="border:0px;" width="70px" height="20px" scrolling="no"></iframe>

<?php

}else if($rz_style == "7"){

?>

	<iframe src="http://www.rebuzzthis.com/button_compact.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=2" border="0" style="border:0px;" width="70px" height="20px" scrolling="no"></iframe>

<?php

}else if($rz_style == "8"){

?>

	<iframe src="http://www.rebuzzthis.com/button_compact.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=3" border="0" style="border:0px;" width="70px" height="20px" scrolling="no"></iframe>

<?php

}else if($rz_style == "9"){

?>

	<iframe src="http://www.rebuzzthis.com/button_compact.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=4" border="0" style="border:0px;" width="70px" height="20px" scrolling="no"></iframe>

<?php

}else if($rz_style == "10"){

?>

	<iframe src="http://www.rebuzzthis.com/button_compact.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=5" border="0" style="border:0px;" width="70px" height="20px" scrolling="no"></iframe>

<?php

}else if($rz_style == "11"){

?>

	<iframe src="http://www.rebuzzthis.com/button_compact.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=6" border="0" style="border:0px;" width="70px" height="20px" scrolling="no"></iframe>

<?php

}else if($rz_style == "12"){

?>

	<iframe src="http://www.rebuzzthis.com/button_compact.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=7" border="0" style="border:0px;" width="70px" height="20px" scrolling="no"></iframe>

<?php

}else if($rz_style == "13"){

?>

	<iframe src="http://www.rebuzzthis.com/button_compact.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=8" border="0" style="border:0px;" width="70px" height="20px" scrolling="no"></iframe>

<?php

}else if($rz_style == "14"){

?>

	<iframe src="http://www.rebuzzthis.com/button_compact.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&style=9" border="0" style="border:0px;" width="87px" height="20px" scrolling="no"></iframe>

<?php

}



?>





</div>



<?php

	}

}



// Add Button

if (!function_exists("rebuzzthis_AddBut")) {

	function rebuzzthis_AddBut($content) {

		$rz_display1 = get_option('rZEt_display1');

		//error_reporting(E_ALL);

		if(is_home() && get_option('rZEt_home') == "checked=on") return $content;

		if(is_single() && get_option('rZEt_post') == "checked=on") return $content;

		if(is_page() && get_option('rZEt_page') == "checked=on") return $content;

		if(is_tag() && get_option('rZEt_tag') == "checked=on") return $content;

		if(is_archive() && get_option('rZEt_arch') == "checked=on") return $content;

		if(is_search() && get_option('rZEt_srch') == "checked=on") return $content;

		if($rz_display1 == "bottomL" || $rz_display1 == "bottomR") {

			$content = rebuzzthis_But($content).$content;

			if(is_page() || is_single()) {

					$content .= '</div>';

			} else {

				$content .= '</div>';

			}

			return $content;

		}

		else {

			$content = rebuzzthis_But($content).$content;

			return $content;

		}

	}

}



// Initialize Class

if (class_exists("rebuzzthis")) {

	$rZEt_init = new rebuzzthis();

}



//Actions and Filters

if (isset($rZEt_init)) {

	//Actions

	add_action('reshare-it/reshare-it.php', array(&$rZEt_init, 'init'));

	add_action('admin_menu', 'rebuzzthis_ap');

	//Filters

	add_filter('the_content', 'rebuzzthis_AddBut');

}



?>
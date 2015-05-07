<?php
/*****************************************************************************
 * Plugin Name: Angullery
 * Plugin URI: http://github.com/AdrianRamiro/angullery
 * Description: Media gallery enhanced wit AngularJS magic
 *
 * Author: Adrian Ramiro Gay Cattaneo <AdrianRamiro@github>
 * Version: 1.0.0
 * Author URI: http://github.com/AdrianRamiro
 ****************************************************************************/

namespace Angullery;

include_once __DIR__.'/vendor/autoload.php';

add_action('init', function(){
	$go = new AngulleryPlugin();
});

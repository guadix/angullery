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

/**
* 
*/
class Angullery
{
	
	public $instance;


	function __construct()
	{
		
		add_shortcode('angullery', array($this, 'shortcodeHandler'));

		if (is_admin())
		{
			//aca Guada
		}
		else
		{
			//aca Adrian
		}



	}

	function shortcodeHandler()
	{

	}

}
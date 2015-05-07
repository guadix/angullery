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
class AngulleryPlugin
{

	public $instance;

	/**
	 * Class constructor
	 */
	public function __construct()
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

	/**
	 * Handles angullery shortcode
	 *
	 * @return void
	 * @author Adrian Ramiro Gay Cattaneo <AdrianRamiro@github>
	 */
	public function shortcodeHandler()
	{
		$returned_markup = '';
		ob_start();
		include __DIR__ . '/../frontend/templates/angullery.php';
		$returned_markup = ob_get_clean();

		$this->enqueueAssets();

		return $returned_markup;
	}


	public function enqueueAssets()
	{

		wp_enqueue_script(
			'angularjs',
			plugin_dir_url(__FILE__) . '../frontend/webcomponent/js/angular.min.js',
			array(),
			'1.3.15',
			true
		);

		wp_enqueue_script(
			'angullery-app',
			plugin_dir_url(__FILE__) . '../frontend/webcomponent/js/app.js',
			array('angularjs'),
			'1.0.0',
			true
		);
	}

}

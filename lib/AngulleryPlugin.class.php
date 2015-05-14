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
			add_action('add_meta_boxes_post', array($this, 'addMetaBox'));
		}
		else
		{
			//aca Adrian
		}

	}

	/**
	 * Adds the Angullery metabox.
	 *
	 * @return void
	 */
	public function addMetabox()
	{
		add_meta_box(
			'angullery_metabox',
			__('Create Angullery'),
			array($this, 'renderMetabox'),
			'post',
			'side'
		);
	}

	/**
	 * Renders the Angullery Metabox
	 *
	 * @return void
	 */
	public function renderMetabox()
	{
		$path = __DIR__ . '/../admin/templates/metabox_angullery.php';

		$this->enqueueAssets();
		echo $this->getTemplateOutput($path);
	}

	/**
	 * Handles angullery shortcode
	 *
	 * @return string
	 * @author Adrian Ramiro Gay Cattaneo <AdrianRamiro@github>
	 */
	public function shortcodeHandler()
	{
		$path = __DIR__ . '/../frontend/templates/angullery.php';

		$this->enqueueAssets();

		return $this->getTemplateOutput($path);
	}

	/**
	 * Opens a template and returns the output buffer of reading it.
	 *
	 * This method also enqueues the assets used on Angullery.
	 *
	 * @param string $path
	 *
	 * @return string
	 */
	public function getTemplateOutput($path)
	{
		$returned_markup = '';
		ob_start();
		include $path;
		$returned_markup = ob_get_clean();

		return $returned_markup;
	}

	/**
	 * Enqueues JS and CSS assets.
	 *
	 * @return void
	 */
	public function enqueueAssets()
	{
		wp_enqueue_script(
			'angularjs',
			'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js',
			array(),
			'1.3.15',
			true
		);

		if (is_admin())
		{
			wp_enqueue_script(
				'angullery-admin-app',
				plugin_dir_url(__FILE__) . '../admin/webcomponent/js/angullery-admin.js',
				array('angularjs'),
				'1.0.0',
				true
			);
		}
		else
		{
			wp_enqueue_script(
				'angullery-app',
				plugin_dir_url(__FILE__) . '../frontend/webcomponent/js/app.js',
				array('angularjs'),
				'1.0.0',
				true
			);
		}
	}

}


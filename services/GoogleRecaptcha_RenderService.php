<?php
/*
* Google reCaptcha
*
* Forked from reCaptcha for Craft Render Service
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/craft-recaptcha
*
*/
namespace Craft;

class GoogleRecaptcha_RenderService extends BaseApplicationComponent
{

	public function render($params)
	{
		$plugin = craft()->plugins->getPlugin('googlerecaptcha');
	    $settings = $plugin->getSettings();

	    $oldTemplatesPath = craft()->path->getTemplatesPath();
	    $newTemplatesPath = craft()->path->getPluginsPath().'googlerecaptcha/templates/';
	    craft()->path->setTemplatesPath($newTemplatesPath);

	    $vars = array(
	    	'id' => 'gRecaptchaContainer',
	    	'siteKey' => $settings->attributes['siteKey']
	    );

	    $html = craft()->templates->render('frontend/recaptcha.html', $vars);
		craft()->path->setTemplatesPath($oldTemplatesPath);

		craft()->templates->includeJsFile('https://www.google.com/recaptcha/api.js');

		echo $html;
	}
}
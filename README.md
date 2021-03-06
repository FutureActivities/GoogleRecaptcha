# Google reCAPTCHA for Craft CMS
Craft plugin to display Google's new reCaptcha form widget and validate responses.

##Forked
Forked from https://github.com/aberkie/craft-recaptcha

Additional features:

- Uses a hook to verify the captcha when saving a user
- Returns error messages in the same way the account field validation works
- Composer ready

##Install
1. Upload entire recaptcha directory to craft/plugins on your server.
2. Navigate to your site's Plugin settings from the Control Panel.
3. Click Install
4. Click on the 'reCAPTCHA for Craft' link to enter in your reCAPTCHA site key and secret key. You can get both keys from the [Google reCaptcha console](http://www.google.com/recaptcha/intro/index.html).

##Usage
###Templates
To display a reCAPTCHA widget in any template, use `{{craft.recaptcha.render()}}`.

###User Registration Form
Just add the widget to the form and make sure the action is `users/saveUser`. This
plugin will listen for the new user and check the recaptcha.

###Verification
To verify a user's input, call the plugin's verify service from your own plugin:

	$captcha = craft()->request->getPost('g-recaptcha-response');
	$verified = craft()->recaptcha_verify->verify($captcha);
	if($verified)
	{
		//User is a person, not a robot. Go on and process the form!
	} else {
		//Uh oh...its a robot. Don't process this form!
	}

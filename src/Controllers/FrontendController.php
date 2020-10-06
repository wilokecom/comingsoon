<?php


namespace Comingsoon\Controllers;


class FrontendController extends Controller
{
	public function __construct()
	{
		add_action('template_redirect', [$this, 'maybeRedirectToComingsoon']);
	}

	public function maybeRedirectToComingsoon()
	{
		if (!is_user_logged_in()) {
			$aOptions = get_option($this->optionKey);
			include (COMINGSOON_PATH . 'src/Views/index.php');
			die;
		}
	}
}
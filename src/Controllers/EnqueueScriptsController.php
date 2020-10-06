<?php


namespace Comingsoon\Controllers;


class EnqueueScriptsController extends Controller
{
	public function __construct()
	{
		add_action('admin_enqueue_scripts', [$this, 'enqueueScripts']);
	}

	public function enqueueScripts()
	{
		$oCurrentScreen = get_current_screen();

		if (strpos($oCurrentScreen->base, $this->menuSlug) !== false) {
			wp_enqueue_style('semantic-ui', COMINGSOON_URL . 'assets/semantic-ui/semantic.min.css', [],
				COMINGSOON_VERSION);
			wp_enqueue_script('semantic-ui', COMINGSOON_URL . 'assets/semantic-ui/semantic.min.js', ['jquery'],
				COMINGSOON_VERSION, true);
		}
	}
}
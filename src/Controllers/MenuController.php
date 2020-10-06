<?php

namespace Comingsoon\Controllers;

use Comingsoon\Helpers\App;
use Comingsoon\Helpers\Input;

class MenuController extends Controller
{
	public function __construct()
	{
		add_action('admin_menu', [$this, 'registerMenus']);
	}

	public function registerMenus()
	{
		add_menu_page(
			'Coming Soon',
			'Coming Soon',
			'administrator',
			$this->menuSlug,
			[$this, 'menuSettings']
		);
	}

	public function deepClean($value)
	{
		global $wpdb;
		if (!is_array($value)) {
			return $wpdb->_real_escape($value);
		}

		return array_map([$this, 'deepClean'], $value);
	}

	private function saveData()
	{
		if (!isset($_POST['comingsoon'])) {
			return false;
		}

		global $wpdb;

		$aValues = [];
		foreach ($_POST['comingsoon'] as $key => $value) {
			$aValues[$wpdb->_real_escape($key)] = $this->deepClean($value);
		}

		update_option($this->optionKey, $aValues);
	}

	public function menuSettings()
	{
		$this->saveData();
		$aValues = get_option($this->optionKey);

		?>
        <form action="<?php add_query_arg(['page' => $this->menuSlug], admin_url('admin.php')); ?>" method="POST"
              class="ui form">
			<?php
			foreach (App::get('config/settings') as $aField) {
				switch ($aField['type']) {
					case 'input':
						$value = isset($aValues[$aField['singleName']]) ? $aValues[$aField['singleName']] :
							$aField['value'];
						Input::render($aField, $value);
						break;
				}
			}
			?>
            <button class="ui button" type="submit">Submit</button>
        </form>
		<?php
	}
}
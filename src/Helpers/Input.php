<?php

namespace Comingsoon\Helpers;

class Input
{
	public static function render($aField, $value = '')
	{
		$aField = wp_parse_args(
			$aField,
			[
				'label'       => '',
				'variation'   => 'text',
				'placeholder' => '',
				'name'        => '',
				'id'          => ''
			]
		);
		?>
        <div class="field">
			<?php if (!empty($aField['label'])) : ?>
                <label><?php echo esc_html($aField['label']); ?></label>
			<?php endif; ?>
            <input type="<?php echo esc_attr($aField['variation']); ?>"
                   name="<?php echo esc_attr($aField['name']); ?>"
                   placeholder="<?php echo esc_attr($aField['placeholder']); ?>"
                   value="<?php echo esc_attr($value); ?>">
        </div>
		<?php
	}
}
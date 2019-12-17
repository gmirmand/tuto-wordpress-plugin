<?php
// Enqueue scrips & styles
function enqueue_scripts_styles()
{
    wp_register_style('own_style', plugin_dir_url(__FILE__) . 'style.css');
    wp_register_style('bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
    wp_enqueue_style(['own_style', 'bootstrap_css']);

    wp_enqueue_script('own_script', plugin_dir_url(__FILE__) . 'script.js', array('jquery'));
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js');
}

add_action('after_setup_theme', 'enqueue_scripts_styles');

$options = get_option('help_popin_settings');
?>

<div class="help-popin <?php print_r($options['help_popin_select_field']) ?>">
    <button type="button" class="help-popin__icon btn btn-light rounded-circle">
        ?
    </button>
    <div class="card help__container d-none">
        <h3>
            <?php
            print_r($options['help_popin_text_field']);
            ?>
        </h3>
        <div class="help__description">
            <?php
            print_r($options['help_popin_textarea_field']);
            ?>
        </div>
    </div>
</div>

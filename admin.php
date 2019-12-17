<?php
add_action('admin_menu', 'help_popin_add_admin_menu');

function help_popin_add_admin_menu()
{
    //add_menu_page('Help pop-in settings', 'Help pop-in', 'manage_options', 'help_popin-plugin', 'help_popin_init');
    add_menu_page('Paramètre pop-in d\'aide', 'Paramètre pop-in d\'aide', 'manage_options', 'help-popin-settings', 'help_popin_options_page');
}

add_action('admin_init', 'help_popin_settings_init');

function help_popin_settings_init()
{
    register_setting('helpPlugin', 'help_popin_settings');
    add_settings_section(
        'help_popin_helpPlugin_section',
        __('Paramètres', 'wordpress'),
        '',
        'helpPlugin'
    );

    add_settings_field(
        'help_popin_text_field',
        __('Titre', 'wordpress'),
        'help_popin_text_field_render',
        'helpPlugin',
        'help_popin_helpPlugin_section'
    );

    add_settings_field(
        'help_popin_textarea_field',
        __('Description', 'wordpress'),
        'help_popin_textarea_field_render',
        'helpPlugin',
        'help_popin_helpPlugin_section'
    );

    add_settings_field(
        'help_popin_select_field',
        __('Position', 'wordpress'),
        'help_popin_select_field_render',
        'helpPlugin',
        'help_popin_helpPlugin_section'
    );
}

function help_popin_text_field_render()
{
    $options = get_option('help_popin_settings');
    ?>
    <input type='text' name='help_popin_settings[help_popin_text_field]'
           value='<?php echo $options['help_popin_text_field']; ?>'>
    <?php
}

function help_popin_textarea_field_render()
{
    $options = get_option('help_popin_settings');
    ?>
    <textarea name="help_popin_settings[help_popin_textarea_field]" cols="30"
              rows="10"><?php echo $options['help_popin_textarea_field']; ?></textarea>
    <?php
}

function help_popin_select_field_render()
{
    $options = get_option('help_popin_settings');
    ?>
    <select name='help_popin_settings[help_popin_select_field]'>
        <option value='top-right' <?php selected($options['help_popin_select_field']); ?>>Haut-Droite</option>
        <option value='top-left' <?php selected($options['help_popin_select_field']); ?>>Haut-Gauche</option>
        <option value='bottom-left' <?php selected($options['help_popin_select_field']); ?>>Bas-Gauche</option>
        <option value='bottom-right' <?php selected($options['help_popin_select_field']); ?>>Bas-Droite</option>
    </select>

    <?php
}

function help_popin_options_page()
{
    ?>
    <form action='options.php' method='post'>

        <h2>Page d'administration de la pop-in d'aide</h2>

        <?php
        settings_fields('helpPlugin');
        do_settings_sections('helpPlugin');
        submit_button();
        ?>

    </form>
    <?php
}
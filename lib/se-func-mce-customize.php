<?php

  function sentry_add_editor_style() {
    add_editor_style( get_template_directory_uri().'/css/editor-style.css' );
  }
  add_action('admin_init', 'sentry_add_editor_style');

  function sentry_register_button($buttons)
  {
      $buttons[] = 'marker_button';

      return $buttons;
  }
  add_filter('mce_buttons_2', 'sentry_register_button');

  function sentry_mce_plugin($plugin_array)
  {
      $plugin_array['custom_button_script'] = get_template_directory_uri() . '/js/editor_plugin.js';
      return $plugin_array;
  }
  add_filter('mce_external_plugins', 'sentry_mce_plugin');

?>

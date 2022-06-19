<?php

/**
 * Used to define default theme functions
 */
class BoilerplateDefault
{
  /**
   * Initialize the theme
   */
  public static function init()
  {
    // Emoji support
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');

    // Setup theme
    add_action('after_setup_theme', [self::class, 'setup_theme']);

    // Scripts and styles
    add_action('wp_enqueue_scripts', [self::class, 'remove_wp_block_library_css'], 100);
    add_action('wp_enqueue_scripts', [self::class, 'enqueue_scripts']);

    // Comments supports
    add_action('init', [self::class, 'remove_comment']);
    add_action('wp_before_admin_bar_render',[self::class, 'admin_bar_remove_comments']);
    add_action('admin_menu', [self::class, 'admin_menu_remove_comments']);
  }

  /**
   * Setup theme
   */
  public static function setup_theme()
  {

    register_nav_menus(
      array()
    );

    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      )
    );

    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

    add_theme_support('align-wide');

    add_theme_support('editor-styles');
    add_editor_style('css/editor-style.css');
  }

  /**
   * Remove wp-block-library css
   */
  public static function remove_wp_block_library_css()
  {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
  }

  /**
   * Get asset path
   * 
   * @param string $path Path to asset
   * 
   * @return string
   */
  private static function get_asset_path($path)
  {
    if (wp_get_environment_type() === 'production') {
      return get_stylesheet_directory_uri() . '/' . $path;
    }

    return add_query_arg('time', time(),  get_stylesheet_directory_uri() . '/' . $path);
  }

  /**
   * Enqueue scripts
   */
  public static function enqueue_scripts()
  {
    $theme = wp_get_theme();
    $version = $theme->get('Version');

    $css_path = self::get_asset_path('css/app.css');
    $js_path = self::get_asset_path('js/app.js');

    wp_enqueue_style('app-style', $css_path, [], $version, true);
    wp_enqueue_script('app-script', $js_path, [], $version, true);
  }

  /**
   * Remove comment support
   */
  public static function remove_comment()
  {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
  }

  /**
   * Remove comments
   */
  public static function admin_menu_remove_comments()
  {
    remove_menu_page('edit-comments.php');
  }

  /**
   * Remove comments from admin bar
   */
  public static function admin_bar_remove_comments()
  {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
  }
}

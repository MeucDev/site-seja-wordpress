<?php

add_action('after_setup_theme', 'sejameuc_setup');
function sejameuc_setup()
{
  load_theme_textdomain('sejameuc', get_template_directory() . '/languages');
  add_theme_support('menus');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('responsive-embeds');
  add_theme_support('automatic-feed-links');
  add_theme_support('html5', array('search-form'));
  add_theme_support('woocommerce');
  global $content_width;
  if (!isset($content_width)) {
    $content_width = 1920;
  }
  register_nav_menus(array(
    'top-menu' => 'Menu Topo',
    'footer-menu' => 'Rodapé',
    'socials-menu' => 'Redes Sociais'
  ));

  add_image_size('cropped-thumbnail', 300, 200, true);
  add_image_size('cover', 3840, 360);
}

add_action('admin_notices', 'sejameuc_admin_notice');
function sejameuc_admin_notice()
{
  $user_id = get_current_user_id();
  if (!get_user_meta($user_id, 'sejameuc_notice_dismissed_4') && current_user_can('manage_options'))
    echo '<div class="notice notice-info"><p>' . __('<big><strong>sejameuc</strong>:</big> Help keep the project alive! <a href="?notice-dismiss" class="alignright">Dismiss</a> <a href="https://calmestghost.com/donate" class="button-primary" target="_blank">Make a Donation</a>', 'sejameuc') . '</p></div>';
}

add_action('admin_init', 'sejameuc_notice_dismissed');
function sejameuc_notice_dismissed()
{
  $user_id = get_current_user_id();
  if (isset($_GET['notice-dismiss']))
    add_user_meta($user_id, 'sejameuc_notice_dismissed_4', 'true', true);
}

add_action('wp_enqueue_scripts', 'sejameuc_enqueue');
function sejameuc_enqueue()
{
  wp_enqueue_style('sejameuc-style', get_stylesheet_uri());
  wp_enqueue_script('jquery');
}

add_action('wp_footer', 'sejameuc_footer');
function sejameuc_footer()
{
?>
  <script>
    jQuery(document).ready(function($) {
      var deviceAgent = navigator.userAgent.toLowerCase();
      if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        $("html").addClass("ios");
      }
      if (navigator.userAgent.search("MSIE") >= 0) {
        $("html").addClass("ie");
      } else if (navigator.userAgent.search("Chrome") >= 0) {
        $("html").addClass("chrome");
      } else if (navigator.userAgent.search("Firefox") >= 0) {
        $("html").addClass("firefox");
      } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        $("html").addClass("safari");
      } else if (navigator.userAgent.search("Opera") >= 0) {
        $("html").addClass("opera");
      }
    });
  </script>
<?php
}

add_filter('document_title_separator', 'sejameuc_document_title_separator');
function sejameuc_document_title_separator($sep)
{
  $sep = '|';
  return $sep;
}

add_filter('the_title', 'sejameuc_title');
function sejameuc_title($title)
{
  if ($title == '') {
    return '...';
  } else {
    return $title;
  }
}

add_filter('nav_menu_link_attributes', 'sejameuc_schema_url', 10);
function sejameuc_schema_url($atts)
{
  $atts['itemprop'] = 'url';
  return $atts;
}

if (!function_exists('sejameuc_wp_body_open')) {
  function sejameuc_wp_body_open()
  {
    do_action('wp_body_open');
  }
}

add_action('wp_body_open', 'sejameuc_skip_link', 5);
function sejameuc_skip_link()
{
  echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'sejameuc') . '</a>';
}

add_filter('the_content_more_link', 'sejameuc_read_more_link');
function sejameuc_read_more_link()
{
  if (!is_admin()) {
    return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'sejameuc'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
  }
}

add_filter('excerpt_more', 'sejameuc_excerpt_read_more_link');
function sejameuc_excerpt_read_more_link($more)
{
  if (!is_admin()) {
    global $post;
    return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(__('...%s', 'sejameuc'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
  }
}

add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'sejameuc_image_insert_override');
function sejameuc_image_insert_override($sizes)
{
  unset($sizes['medium_large']);
  unset($sizes['large']);
  unset($sizes['1536x1536']);
  unset($sizes['2048x2048']);
  return $sizes;
}

add_action('widgets_init', 'sejameuc_widgets_init');
function sejameuc_widgets_init()
{
  register_sidebar(array(
    'name' => esc_html__('Sidebar Widget Area', 'sejameuc'),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>'
  ));
}

add_action('wp_head', 'sejameuc_pingback_header');
function sejameuc_pingback_header()
{
  if (is_singular() && pings_open()) {
    printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
  }
}

add_action('comment_form_before', 'sejameuc_enqueue_comment_reply_script');
function sejameuc_enqueue_comment_reply_script()
{
  if (get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

function sejameuc_custom_pings($comment)
{
?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url(comment_author_link()); ?></li>
<?php
}

add_filter('get_comments_number', 'sejameuc_comment_count', 0);
function sejameuc_comment_count($count)
{
  if (!is_admin()) {
    global $id;
    $get_comments = get_comments('status=approve&post_id=' . $id);
    $comments_by_type = separate_comments($get_comments);
    return count($comments_by_type['comment']);
  } else {
    return $count;
  }
}

add_action('init', 'register_event_post_type');
function register_event_post_type() {
  $args = array(
    'labels'      => array(
      'name'          => _x('Eventos', 'sejameuc'),
      'singular_name' => _x('Evento', 'sejameuc'),
    ),
    'description' => 'Eventos',
    'public'      => true,
    'has_archive' => true,
    'rewrite'     => array('slug' => 'eventos'),
    'menu_icon'   => 'dashicons-calendar-alt',
    'taxonomies'  => array('event-category')
  );
  register_post_type('event', $args);

  $taxArgs = array(
    'labels'      => array(
      'name'          => _x('Categorias de Evento', 'sejameuc'),
      'singular_name' => _x('Categoria de Evento', 'sejameuc'),
    ),
    'description'  => 'Categorias de Evento',
    'public'       => true,
    'has_archive'  => true,
    'hierarchical' => true,
    'rewrite'     => array('slug' => 'categorias-de-evento')
  );
  register_taxonomy('event-category', 'event', $taxArgs);

  add_post_type_support('event', array('thumbnail', 'excerpt'));
}

add_action('wp_enqueue_scripts', 'register_scripts');
function register_scripts() {
  wp_enqueue_script('popper.js', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js');
  wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js');
  wp_enqueue_script('photoswipe', get_template_directory_uri() . '/photoswipe/photoswipe.min.js');
  wp_enqueue_script('photoswipe-ui', get_template_directory_uri() . '/photoswipe/photoswipe-ui-default.min.js');
}

add_action('wp_enqueue_scripts', 'register_styles');
function register_styles() {
  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
  wp_enqueue_style('font.montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap');
  wp_enqueue_style('photoswipe', get_template_directory_uri() . '/photoswipe/photoswipe.css');
  wp_enqueue_style('photoswipe-ui', get_template_directory_uri() . '/photoswipe/default-skin.css');
}

function get_relative_path($path) {
  $domain = get_site_url();
  return str_replace($domain, '', $path);
}

add_filter('rewrite_rules_array', 'sejameuc_insertrules');
function sejameuc_insertrules($rules)
{
  $subEventPages = array(
    'galeria' => 'Galeria'
  );

  $newrules = array();
  foreach ($subEventPages as $slug => $title)
      $newrules['eventos/([^/]+)/' . $slug . '/?$'] = 'index.php?event=$matches[1]&subeventpage=' . $slug;

  return $newrules + $rules;
}

add_filter('query_vars', 'sejameuc_insertqv');
function sejameuc_insertqv($vars)
{
  array_push($vars, 'subeventpage');
  return $vars;
}

remove_filter('wp_head', 'rel_canonical');
add_filter('wp_head', 'sejameuc_rel_canonical');
function sejameuc_rel_canonical()
{
    global $current_sub_event_page, $wp_the_query;

    if (!is_singular())
        return;

    if (!$id = $wp_the_query->get_queried_object_id())
        return;

    $link = trailingslashit(get_permalink($id));

    if (!empty($current_sub_event_page))
        $link .= user_trailingslashit($current_sub_event_page);
  
    echo '<link rel="canonical" href="'.$link.'" />';
}

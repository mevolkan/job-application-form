<?php
/*
Plugin Name: Odoo Jobs Plugin
Plugin URI: https://github.com/mevolkan
Version: 1.2.0
Author: Volkan
Author URI: https://github.com/mevolkan
*/

class PageTemplater
{

    /**
     * A reference to an instance of this class.
     */
    private static $instance;

    /**
     * The array of templates that this plugin tracks.
     */
    protected $templates;

    /**
     * Returns an instance of this class. 
     */
    public static function get_instance()
    {

        if (null == self::$instance) {
            self::$instance = new PageTemplater();
        }

        return self::$instance;
    }

    /**
     * Initializes the plugin by setting filters and administration functions.
     */
    private function __construct()
    {

        $this->templates = array();
        
        if (version_compare(floatval(get_bloginfo('version')), '4.7', '<')) {
            add_filter(
                'page_attributes_dropdown_pages_args',
                array($this, 'register_project_templates')
            );
        } else {
            add_filter(
                'theme_page_templates',
                array($this, 'add_new_template')
            );
        }

        add_filter(
            'wp_insert_post_data',
            array($this, 'register_project_templates')
        );
        add_filter(
            'template_include',
            array($this, 'view_form_template')
        );
        $this->templates = array(
            'job-form.php' => 'Job Form Template',
        );
    }

    /**
     * Adds our template to the page dropdown for v4.7+
     *
     */
    public function add_new_template($posts_templates)
    {
        $posts_templates = array_merge($posts_templates, $this->templates);
        return $posts_templates;
    }

    /**
     * Adds our template to the pages cache in order to trick WordPress
     * into thinking the template file exists where it doens't really exist.
     */
    public function register_project_templates($atts)
    {

        $cache_key = 'page_templates-' . md5(get_theme_root() . '/' . get_stylesheet());
        $templates = wp_get_theme()->get_page_templates();
        if (empty($templates)) {
            $templates = array();
        }

        wp_cache_delete($cache_key, 'themes');
        $templates = array_merge($templates, $this->templates);
        wp_cache_add($cache_key, $templates, 'themes', 1800);

        return $atts;
    }

    /**
     * Checks if the template is assigned to the page
     */
    public function view_form_template($template)
    {

        global $post;

        if (!$post) {
            return $template;
        }

        if (!isset($this->templates[get_post_meta(
            $post->ID,
            '_wp_page_template',
            true
        )])) {
            return $template;
        }

        $file = plugin_dir_path(__FILE__) . get_post_meta(
            $post->ID,
            '_wp_page_template',
            true
        );

        if (file_exists($file)) {
            return $file;
        } else {
            echo $file;
        }
        return $template;
    }
}
add_action('plugins_loaded', array('PageTemplater', 'get_instance'));

function job_scripts($hook)
{

    $my_js_ver  = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'scripts/file.js'));
    $my_css_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'styles/style.css'));

    wp_register_script('careers_js', plugins_url('scripts/file.js', __FILE__), array(), $my_js_ver, true);
    wp_register_style('careers_css', plugins_url('styles/style.css', __FILE__), false, $my_css_ver);
    wp_enqueue_style('careers_css');
    wp_enqueue_script('careers_js');
}
add_action('wp_enqueue_scripts', 'job_scripts');

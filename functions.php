<?php  

if(!defined('PATH_DIR_URI')){
    define('PATH_DIR_URI', get_template_directory_uri());
}

if(!defined('PATH_DIR')){
    define('PATH_DIR', get_template_directory());
}

require_once PATH_DIR . '/inc/helpers/autoload.php';

\PRACTICE_3\Inc\Theme::get_instance();
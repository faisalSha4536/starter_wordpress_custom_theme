<?php  

/**
* All the styles and scripts will enque from here.
* @package Practice 3
*/

namespace PRACTICE_3\Inc;

use PRACTICE_3\Inc\Traits\Singleton;

class Enqueue_Script{
    use Singleton;

    protected function __construct()
    {
        # Setup Hook function which contain all the acctions/hooks.
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        # Hook for adding action of enqueue scripts.
        add_action('wp_enqueue_scripts', [$this, 'enqueue_script']);        
    }

    function enqueue_script(){

        wp_enqueue_style('main-style', PATH_DIR_URI . '/style.css', [], filemtime(PATH_DIR . '/style.css'), 'all');

        # Bootstrap css.
        wp_enqueue_style('bootstrap-style', PATH_DIR_URI . '/assets/src/library/bootstrap/css/bootstrap.min.css', [], filemtime(PATH_DIR . '/assets/src/library/bootstrap/css/bootstrap.min.css'), 'all');

        # Bootstrap js.
        wp_enqueue_script('boot-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['jquery'], null, true);
        
    }

   
}
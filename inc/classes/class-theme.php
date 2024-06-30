<?php  

/**
* All the class will instansiate here and this class
* is directly connect with function.php with traite singlton.
* @package Practice 3
*/

namespace PRACTICE_3\Inc;

use PRACTICE_3\Inc\Traits\Singleton;

class Theme{
    use Singleton;

    protected function __construct()
    {
        # All the class will instantiate here.
        Enqueue_Script::get_instance();
        Menu::get_instance();

        # Setup Hook function which contain all the acctions/hooks.
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        # All the hooks & theme_support will setup here.
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' )
        ) );
    }

 
}
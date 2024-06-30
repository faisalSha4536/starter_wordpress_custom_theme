<?php  

/**
* Adding Dynamic menu.
* @package Practice 3
*/

namespace PRACTICE_3\Inc;

use PRACTICE_3\Inc\Traits\Singleton;

class Menu{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        add_action('init', [$this, 'register_menu']);
    }

    function register_menu(){
        register_nav_menus([
            'PRACTICE_header_menu' => esc_html__("Header Menu", 'PRACTICE'),
            'PRACTICE_footer_menu' => esc_html__("Footer Menu", 'PRACTICE'),
        ]);
    }

    function menu_id($location){
        $locations = get_nav_menu_locations();
        $location = $locations[$location];
        return $location;
    }

    function child_menus($header_menus, $parent_id){
        $child = [];
        if(is_array($header_menus) && !empty($header_menus)){
            foreach($header_menus as $menu){
                if(intval($menu->menu_item_parent) === $parent_id){
                    array_push($child, $menu);
                }
            }
        }

        return $child;
    }

 
}
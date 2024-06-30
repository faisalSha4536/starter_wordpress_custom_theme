<?php  
/**
* Traite Singleton
* @package Practice 3
*/

namespace PRACTICE_3\Inc\Traits;

trait Singleton{
    protected function __construct(){
    }

    final protected function __clone(){

    }
    final public static function get_instance(){
        static $instance = [];

        $called_class = __CLASS__;

        if(!isset($instance[$called_class])){
            $instance[$called_class] = new $called_class;
        }

        return $instance[$called_class];
    }
}
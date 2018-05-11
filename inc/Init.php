<?php
/**
 * @package hg-adsmanager
 */

namespace HG;

final class Init {

    public static function get_services() {
        return [
            Base\ErrorHandler::class,
            Pages\Admin::class,
            Pages\Country::class,
            Pages\Customer::class,
            Pages\Publication::class,
            Pages\AdsWidget::class,
            Base\Enqueue::class
        ];
    }
    
    public static function register_services() {
        foreach (self::get_services() as $class) {
            
            $service = self::instantiate( $class );
            
            if( method_exists( $service, 'register') ) {
                $service->register();
                //\error_log("{$class} registered!");
            }
        }
    }

    private static function instantiate( $class ) {
        return new $class();
    }
}

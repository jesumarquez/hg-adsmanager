<?php
/**
 * @package hg-adsmanager
 */

namespace HG\Base;
//use \HG\Base\DataBase;

class Activate {
    public static function activate() {
        //DataBase::install();
        flush_rewrite_rules();
    }
}
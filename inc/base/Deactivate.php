<?php
/**
 * @package hg-adsmanager
 */

namespace HG\Base;
//use \HG\Base\DataBase;

class Deactivate {
    public static function deactivate() {
        //DataBase::install();
        flush_rewrite_rules();
    }
}
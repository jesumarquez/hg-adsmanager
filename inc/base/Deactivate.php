<?php
/**
 * @package hg-adsmanager
 */

namespace HG\Base;

class Deactivate {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}
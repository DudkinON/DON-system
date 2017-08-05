<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: Kernel.php
 * Date: 8/3/2017
 * Time: 2:07 PM
 */

namespace don\core;


interface Kernel
{
    public function __construct($settings);
    public function active_app_define();
    public function get_app();
}
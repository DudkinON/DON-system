<?php

use don\core\BaseModel;

/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: models.php
 * Date: 8/4/2017
 * Time: 2:11 PM
 */


class IndexModel extends BaseModel
{

    public $name = '{"char_field":{"max_length":30,"blank":true,"null":true,"default":false}}';
//    public $title = char_field('{"max_length":30,"blank":true,"null":true,"default":false}');
    public $is_active = '{"bool_field":true}';
    public $created = '{"date_time_field":{"auto_now_add":true,"auto_now":false}}';
    public $updated = '{"date_time_field":{"auto_now_add":true,"auto_now":false}}';

}


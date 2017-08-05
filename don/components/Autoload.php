<?php

spl_autoload_register(function ($class) {
    include BASE_DIR . '/' . $class . '.php';
});
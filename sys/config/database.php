<?php

/**
 * Fusion
 *
 * An open source MVC application development framework for PHP.
 * This content is released under the GNU GENERAL PUBLIC LICENSE.
 * Copyright (c) 2012 - 2016, Softyard LAB.
 *
 * @package  Fusion
 * @author  Md. Shamim Shahnewaz
 * @copyright  Copyright (c) 2012 - 2016, Softyard LAB (http://softyardbd.com)
 * @license  GNU GENERAL PUBLIC LICENSE (https://www.gnu.org/licenses/gpl-3.0.en.html) License
 * @since  Version 1.0.0
 * @filename  database.php
 */

$drivers = array(

    'PDO' => array(

        'hostname' => 'localhost',

        'username' => 'root',

        'password' => '',

        'database' => 'fusion'

    ),

    'mysqli' => array(

        'hostname' => 'localhost',

        'username' => 'root',

        'password' => '',

        'database' => 'fusion'

    ),

);

$connection['default'] = 'mysqli';
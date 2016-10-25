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
 * @filename  BaseModel.php
 */

namespace Fusion\Sys\Core\Libs;


class BaseModel
{

    /**
     * List of loaded database.
     *
     * @var array
     */
    protected $db = array();

    /**
     * BaseModel constructor.
     *
     * @return object|mixed
     */
    public function __construct()
    {

        $connection = array();

        $drivers = array();

        if (file_exists(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config/database.php')) {

            require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config/database.php';

            $hostname = $drivers[$connection['default']]['hostname'];

            $username = $drivers[$connection['default']]['username'];

            $password = $drivers[$connection['default']]['password'];

            $database = $drivers[$connection['default']]['database'];

            switch ($connection['default']) {

                case 'PDO' :

                    $this->db = new DatabasePDO($hostname, $username, $password, $database);

                    break;

                case 'mysqli' :

                    $this->db = new DatabaseMySQLi($hostname, $username, $password, $database);

                    break;

                default :

                    show_error(NO_DEFAULT_DB);

            }

        }

    }

}
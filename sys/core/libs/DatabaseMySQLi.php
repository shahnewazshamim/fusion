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
 * @filename  DatabaseMuSQLi.php
 */

namespace Fusion\Sys\Core\Libs;


class DatabaseMySQLi extends \mysqli
{

    /**
     * Database Hostname.
     *
     * @var string
     */
    private $hostname ;

    /**
     * Database Username.
     *
     * @var string
     */
    private $username ;

    /**
     * Database Password.
     *
     * @var string
     */
    private $password ;

    /**
     * Database Name.
     *
     * @var string
     */
    private $database ;

    /**
     * DatabasePDO constructor.
     */
    public function __construct($hostname, $username, $password, $database)
    {

        $this->hostname = $hostname;

        $this->username = $username;

        $this->password = $password;

        $this->database = $database;

        $this->connection();

    }

    /**
     * Establish a PDO connection.
     *
     * @return object
     */
    private function connection()
    {

        ini_set('display_errors', '0');

        $mysqli = new \mysqli($this->hostname, $this->username, $this->password, $this->database);

        if ($mysqli->connect_errno) {

            show_error(DB_CONNECTION_FAILED, null, $mysqli->connect_error);

        }

        return $mysqli;

    }

}
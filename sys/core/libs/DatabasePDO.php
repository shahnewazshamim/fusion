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
 * @filename  DatabasePDO.php
 */

namespace Fusion\Sys\Core\Libs;


class DatabasePDO extends \PDO
{

    /**
     * Database Hostname.
     *
     * @var string
     */
    private $hostname;

    /**
     * Database Username.
     *
     * @var string
     */
    private $username;

    /**
     * Database Password.
     *
     * @var string
     */
    private $password;

    /**
     * Database Name.
     *
     * @var string
     */
    private $database;

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
     * @return void
     */
    private function connection()
    {

        try {

            $dsn = "mysql:host={$this->hostname};dbname={$this->database}";

            new \PDO($dsn, $this->username, $this->password);

        } catch (\PDOException $e) {

            show_error(DB_CONNECTION_FAILED, null, $e->getMessage());

        }

    }

}
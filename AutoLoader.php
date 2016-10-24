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
 * @filename  autoloader.php
 */

namespace Fusion;

class AutoLoader
{

    /**
     * Reference to the AutoLoader singleton
     *
     * @var    object
     */
    private static $instance;

    /**
     * AutoLoader constructor get instance.
     *
     * @return    object
     */
    public function __construct()
    {
        if (is_null(self::$instance)) {

            self::$instance = new self();

        }

        return self::$instance;
    }

    /**
     * Load class file by namaspace.
     *
     * @param $namespace
     *
     * @return bool|mixed
     */
    private static function load_by_namespace($namespace)
    {
        $path = '';

        $name = '';

        $first_word = true;

        $split_path = explode('\\', $namespace);

        for ($i = 0; $i < count($split_path); $i++) {

            if ($split_path[$i] and !$first_word) {

                if ($i == count($split_path) - 1) {

                    $name .= $split_path[$i];

                } else {

                    $path .= DIRECTORY_SEPARATOR . $split_path[$i];

                }

            }

            if ($split_path[$i] && $first_word) {

                if ($split_path[$i] != __NAMESPACE__) {

                    break;

                }

                $first_word = false;

            }

        }

        if (!$first_word) {

            $full_path = __DIR__ . $path . DIRECTORY_SEPARATOR . $name . '.php';

            if (file_exists($full_path)) {

                return include_once $full_path;

            }

        }

        return false;
    }

    /**
     * Load class file with autoload register.
     */
    public static function load()
    {
        spl_autoload_register(__NAMESPACE__ . '\AutoLoader::load_by_namespace');
    }

}
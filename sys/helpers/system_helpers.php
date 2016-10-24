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
 * @filename  system_helpers.php
 */


if (!function_exists('app_dir')) {

    function app_dir()
    {
        return dirname(dirname(__DIR__)) . '/app/';
    }

}

if (!function_exists('controller_dir')) {

    function controller_dir()
    {
        return dirname(dirname(__DIR__)) . '/app/controller/';
    }

}

if (!function_exists('model_dir')) {

    function model_dir()
    {
        return dirname(dirname(__DIR__)) . '/app/models/';
    }

}

if (!function_exists('view_dir')) {

    function view_dir()
    {
        return dirname(dirname(__DIR__)) . '/app/views/';
    }

}

if (!function_exists('public_path')) {

    function public_path($path = null)
    {
        if ($path != null) {

            return 'http://' . $_SERVER['HTTP_HOST'] . '/public/' . $path;

        }

        return 'http://' . $_SERVER['HTTP_HOST'] . '/public/';
    }

}

if (!function_exists('show_error')) {

    function show_error($error, $file_name = null)
    {
        switch ($error) {

            case PAGE_NOT_FOUND :

                $error_head = '404 Not Found';

                $error_desc = 'Your requested page is not found.';

                include_once dirname(dirname(__DIR__)) . '/app/views/default/errors/system.php';

                break;


            case FILE_NOT_FOUND :

                $error_head = 'File does not exist';

                if ($file_name != null) {

                    $error_desc = $file_name;

                }

                include_once dirname(dirname(__DIR__)) . '/app/views/default/errors/system.php';

                break;


            default:

                $error_head = 'Unknown Error';

                $error_desc = 'Please contact your server administrator.';

                include_once dirname(dirname(__DIR__)) . '/app/views/default/errors/system.php';

                break;

        }

    }

}
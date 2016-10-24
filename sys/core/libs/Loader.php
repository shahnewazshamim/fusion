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
 * @filename  Loader.php
 */

namespace Fusion\Sys\Core\Libs;

class Loader
{

    /**
     * Loader constructor.
     *
     * @return mixed
     */
    public function __construct()
    {

    }

    /**
     * Render a view file.
     *
     * @param $view_name
     * @param null $data
     *
     * @return void
     */
    public function view($view_name, $data = null)
    {

        if (isset($view_name)) {

            if (file_exists(view_dir() . $view_name . '.php')) {

                if(!empty($data)) {

                    extract($data);

                }

                include view_dir() . $view_name . '.php';

            } else {

                echo $view_name . ' view not found.';

            }

        }

    }


    /**
     * Initiate a model class.
     *
     * @param $model_name
     *
     * @return object
     */
    public function model($model_name)
    {

        if (isset($model_name)) {

            $model_name = ucfirst($model_name) . 'Model';

            if (file_exists(model_dir() . $model_name . '.php')) {

                $class_name = "Fusion\\App\\Models\\" . $model_name;

                if (class_exists($class_name)) {

                    return new $class_name();

                } else {

                    echo 'Model ' . $class_name . ' is Not Found!';

                }

            } else {

                echo $model_name . ' model not found.';

            }

        }

    }

}
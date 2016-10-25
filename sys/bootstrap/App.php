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
 * @filename  App.php
 */

namespace Fusion\Sys\Bootstrap;

class App
{

    /**
     * Reference to the AutoLoader singleton
     *
     * @var object
     */
    private static $instance;

    /**
     * App constructor.
     *
     * @return object
     */
    public function __construct()
    {

        if (is_null(self::$instance)) {

            self::$instance = new self();

        }

        return self::$instance;

    }

    /**
     * Require system necessary files.
     */
    public static function load()
    {
        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'helpers/system_helpers.php';

        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core/constants/system_constants.php';
    }

    /**
     * Run the main functionality.
     */
    public static function run()
    {

        $route = array();

        if (isset($_GET['route']) and !empty($_GET['route'])) {

            $route = rtrim($_GET['route'], '/');

            $segment = explode('/', $route);

            if (isset($segment[0])) {

                $class_name = "Fusion\\App\\Controllers\\" . ucfirst($segment[0]) . 'Controller';

                $default_method = 'indexAction';

                if (class_exists($class_name)) {

                    $controller = new $class_name();

                    if (isset($segment[1])) {

                        $method = $segment[1] . 'Action';

                        if (isset($segment[2])) {

                            $param = $segment[2];

                            if (method_exists($controller, $method)) {

                                $controller->$method($param);

                            } else {

                                show_error(PAGE_NOT_FOUND);

                            }

                        } else {

                            if (method_exists($controller, $method)) {

                                $controller->$method();

                            } else {

                                show_error(PAGE_NOT_FOUND);

                            }

                        }

                    } else {

                        if (method_exists($controller, $default_method)) {

                            $controller->$default_method();

                        } else {

                            show_error(PAGE_NOT_FOUND);

                        }

                    }

                } else {

                    show_error(PAGE_NOT_FOUND);

                }

            }

        } else {

            if (file_exists(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config/routes.php')) {

                include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config/routes.php';

                $class_name = "Fusion\\App\\Controllers\\" . ucfirst($route['default_controller']) . 'Controller';

                if (class_exists($class_name)) {

                    $controller = new $class_name();

                    $method = 'indexAction';

                    if (method_exists($controller, $method)) {

                        $controller->$method();

                    } else {

                        show_error(PAGE_NOT_FOUND);

                    }


                } else {

                    show_error(PAGE_NOT_FOUND);

                }

            } else {

                $file_name = realpath(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config') . DIRECTORY_SEPARATOR . 'routes.php';

                show_error(FILE_NOT_FOUND, $file_name);

            }

        }

    }

}
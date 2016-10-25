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
 * @filename  WelcomeController.php
 */

namespace Fusion\App\Controllers;

use Fusion\Sys\Core\Libs\BaseController;

class WelcomeController extends BaseController
{

    /**
     * WelcomeController constructor.
     *
     * @return mixed
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Default Action.
     *
     * @return void
     */
    public function indexAction()
    {

        $this->load->view('welcome/index');

    }

    public function testAction()
    {

        $category = $this->load->model('category');

        $data['name'] = 'My Name';

        $data['categories'] = $category->get_data();

        $this->load->view('welcome/test', $data);

    }

}
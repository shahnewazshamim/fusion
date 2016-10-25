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
 * @filename  CategoryModel.php
 */

namespace Fusion\App\Models;

use Fusion\Sys\Core\Libs\BaseModel;

class CategoryModel extends BaseModel
{

    /**
     * CategoryModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get Data from Database.
     *
     * @return array
     */
    public function get_data()
    {
        return [

            'Time', 'and', 'Tide', 'wait', 'for', 'none!'

        ];
    }

}
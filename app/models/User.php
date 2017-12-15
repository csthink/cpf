<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 5:32 PM
 */

namespace app\models;

class User extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    public function getData()
    {
        return User::where('Host', '=', 'localhost')->get();
    }
}

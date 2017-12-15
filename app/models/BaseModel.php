<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 6:02 PM
 */

namespace app\models;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $capsule = new Capsule;
        $capsule->addConnection(include MODULE_PATH . 'config/Database.php');
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}

<?php

namespace Willypuzzle\Helpers\General;

use Illuminate\Database\Eloquent\Model;
use Willypuzzle\Helpers\Exceptions\WrongTypeException;

class Database {
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function getIdsFromModelsArray(array $models){
        $idsArray = [];
        foreach ($models as $m){
            if($m instanceof Model){
                $id = $m->id;
                if($id){
                    $idsArray[] = $id;
                }
            }else{
                throw new WrongTypeException(substr(serialize($m), 0, 25)."... is not a instance of ".Model::class);
            }
        }
    }

    public function test(){
        echo "test";
    }
}
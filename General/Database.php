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
                if(is_array($m)){
                    throw new WrongTypeException("Array element is an array and not an instance of ".Model::class);
                }if(is_object($m)){
                    throw new WrongTypeException("Array element is an instance of ".get_class($m)." and not an instance of ".Model::class);
                }else{
                    throw new WrongTypeException("Array element ($m) is primitive type and not an instance of ".Model::class);
                }

            }
        }
        return $idsArray;
    }

    public function test(){
        echo "test";
    }
}
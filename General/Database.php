<?php

namespace Willypuzzle\Helpers\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
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

    /**
     * Get the model associated with a custom polymorphic type.
     *
     * @param  string  $alias
     * @return string|null
     */
    public static function getMorphedModelInverse($className)
    {
        foreach (Relation::$morphMap as $key => $value){
            if($value == $className){
                return $key;
            }
        }

        return $className;
    }
}

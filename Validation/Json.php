<?php

namespace Willypuzzle\Helpers\Validation;

class Json {
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param $json object
     * @param $schema object
     * @throws \Willypuzzle\Helpers\Exceptions\Validation\WrongJson
     * @throws \Willypuzzle\Helpers\Exceptions\Validation\WrongSchema
     */

    public function validate($json, $schema)
    {
        $metaSchema = \League\JsonReference\Dereferencer::draft4()->dereference('http://json-schema.org/draft-04/schema#');

        $metaValidator  = new \League\JsonGuard\Validator($schema, $metaSchema);

        if ($metaValidator->fails()) {
            // Invalid schema
            $errorsString = '';
            $errors = $metaValidator->errors();
            foreach ($errors as $error){
                $errorsString .= $error->getMessage();
            }
            throw new \Willypuzzle\Helpers\Exceptions\Validation\WrongSchema($errorsString);
        }

        $validator     = new \League\JsonGuard\Validator((object)$json, $schema);

        if($validator->fails()){
            $errorsString = '';
            $errors = $validator->errors();
            foreach ($errors as $error){
                $errorsString .= $error->getMessage();
            }
            throw new \Willypuzzle\Helpers\Exceptions\Validation\WrongJson($errorsString);
        }
    }
}
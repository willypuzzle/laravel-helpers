# Laravel General Helpers by Willypuzzle

In order to setup:
 * Install with composer: **composer require willypuzzle/laravel-helpers**
 * add this to the providers array: **Willypuzzle\Helpers\GeneralServiceProvider::class**

This is a collection of helpers that could be useful in a laravel enviroment.
The helpers are grouped in facades divided by namespaces.

1. Willypuzzle\Helpers\Facades\General\Database
   * getIdsFromModelsArray(array $models): It get a array of eloquent models and give back a set of ids relative to the models in the array.
   
2. Willypuzzle\Helpers\Facades\General\Environment
   * isProduction(), it says if the environment is production
   * isTesting(), it says if the environment is testing
   * isDevelop(), it says if the enviroments is develop
   * is($develop, $testing, $production), it says if it belongs to any of that environment for example is(true, true, false) says it is develop or testing environment.
   
 In order to test the enviroment it uses the following values of APP_ENV:
 * Develop: 'local', '''dev', 'develop', 'developing'
 * Testing: 'test'. 'testing, 'staging', 'stage'
 * Production: Other any values
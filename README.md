# Laravel General Helpers by Willypuzzle

In order to setup:
 * Install with composer: **composer require willypuzzle/laravel-helpers**
 * add this to the providers array: **Willypuzzle\Helpers\GeneralServiceProvider::class**

This is a collection of helpers that could be useful in a laravel enviroment.
The helpers are grouped in facades divided by namespaces.

1. Willypuzzle\Helpers\Facades\General\Database
   * getIdsFromModelsArray(array $models): It get a array of eloquent models and give back a set of ids relative to the models in the array.
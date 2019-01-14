# Typed

This library allows you to create typed variables in PHP 7.4 +

### Composer installation :
```console
$ composer require azjezz/typed
```

### Usage Example :

```php
<?php declare(strict_types=1);

use Typed as t;

$name = &t\string('saif');
$age = &t\int(19);

try {

  $name = 'azjezz'; // works
  $name = 15; // fails
  $age = null; // fails

} catch(TypeError $error) {
   
} finally {
    t\clean();
}
```

#### callable => `func`, array => { `arr`, `keyset`, `vector`, `set` }
Since `callable` and `array` cant be used for function names, instead i have used `func` for callable and `arr` for array.
`keyset`, `vector` and `set` are just helper to help you create an array of keys ( `keyset = arr(array_keys($value))` ), an array of values ( `vector = arr(array_values($value))` ) and an array of unique values ( `set = arr(array_unique($value))` ).

#### `typed` 
`typed()` is a function to help you create a typed variables based on the type of the passed variable, currently it supports `string`, `int`, `float`, `bool`, `object` and `iterable`. it was suggested by @mikesherov on [twitter](https://twitter.com/mikesherov/status/1084512906388144128).

#### `purge`, `clean`, `delete` and `c`
As mentioned [here](https://twitter.com/drealecs/status/1084658093252849665) and [here](https://www.reddit.com/r/PHP/comments/afq3it/typed_variables_for_php_74/ee1belg), memory leak is a huge issue here, if a specific function created a typed variable, the variable will still exist inside the repository even after execution,
for this i made some helper functions that allow you to remove variables from the repository.

- `Typed\purge()` will delete every reference registered in the repository, you can call this function at the end of every request/response cycle in a web application per example.
- `Typed\clean(string $namespace = 'default')` this function will delete every reference to a typed variable in a specific namespace as shown in the example above, its recommended to use a unique namespace every time you use typed variables and call `clean()` to ensure there's no memory leak.
- `Typed\delete(mixed $value, string $namespace = 'default')` this function will delete the last created reference to typed variable with the given value in a specific namespace. example : 
```php
<?php declare(strict_types=1);

use Typed as t;
    
$name = &t\string('azjezz', 'data');
$age = &t\int(19, 'data');

t\delete('azjezz', 'data');

/**
 * the reference to the `$name` variable has been deleted.
 * therefor we can assign any type to the variable `$name` now. 
 */
$name = []; // works
```
- `Typed\c` this function accepted a callable that take no arguments, the callable will be called inside `c` ( container ) and all the assigned typed variables in the time of the call would be deleted afterward, this makes it easier to ensure that function calls don't cause any memory leak. example :
```php
<?php declare(strict_types=1);

use Typed as t;
use function Typed\c;

/**
 * all assigned variables inside the callable will be destroyed after execution. 
 */
c(function(): void {
    $name = &t\string('saif eddin');
    $age = &t\int(5);
    $arr = &t\arr([
        'age' => $age,
        'name' => $name    
    ]);
});

```

#### More :
A cool PSR-15 Middleware to delete all typed variables created inside the next middleware/handler

```php
<?php declare(strict_types=1);

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use function Typed\c;

class TypedMiddleware implements MiddlewareInterface 
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = null;
        c(function() use($request, &$response, $handler) {
            /**
             * if any typed variable is created in the handler, it would be deleted after execution.
             */
            $response = $handler->handle($request);
        });
        return $response;
    }
}

```


#### TODO :
- add `nullable*` functions.

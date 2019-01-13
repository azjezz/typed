# Typed

This libaray allows you to create typed variables in PHP 7.4 +

example :

```php
<?php declare(strict_types=1);

$name = &string('saif');
$age = &int(19);

try {

  $name = 'azjezz'; // works
  $name = 15; // fails
  $age = null; // fails

} catch(TypeError $error) {
   
}

// based on the passed variable type
$string = &typed('saif');
$traversable = &traversable(new ArrayObject());
$countable = &countable(new ArrayObject());
$func = &func('strtolower');
$object = &object((object) []);
$stdClass = &stdClass((object) []);
$iterable = &iterable([]);
$bool = &bool(false);
$bool = &boolean(true);
$set = &set(['a', 'b', 'b', 'a']); // ['a', 'b']
$vector = &vector(['a' => 1, 'b' => 2]); // [1, 2]
$array = &arr(['a' => 1 , 'b' => 2]); // ['a' => 1, 'b' => 2]
$keyset = &keyset(['a' => 1, 'b' => 2]); // ['a', 'b']
$int = &integer(5);
$int = &int(48);
$string = &string('f');
$float = &float(1.56);
```

### callable => func, array => { arr, keyset, vector, set }
Since `callable` and `array` cant be used for function names, instead i have used `func` for callable and `arr` for array.
`keyset`, `vector` and `set` are just helper to help you create an array of keys ( `keyset = arr(array_keys($value))` ), an array of values ( `vector = arr(array_values($value))` ) and an array of unique values ( `set = arr(array_unique($value))` ).

### typed 
`typed()` is a function to help you create a typed variables based on the type of the passed variable, currently it supports `string`, `int`, `float`, `bool`, `object` and `iterable`. it was suggected by @mikesherov on [twitter](https://twitter.com/mikesherov/status/1084512906388144128).

---

check this [twitter thread](https://twitter.com/dshafik/status/1084248443118219264).

---

### Compoer installation :
```console
soon
```

#### TODO :
- add `nullable*` functions.

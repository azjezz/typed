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
```

you can see all avaible `helpers` [here](https://github.com/azjezz/typed/blob/master/src/bootstrap.php).

check this [twitter thread](https://twitter.com/dshafik/status/1084248443118219264).

### Compoer installation :
```console
soon
```

#### TODO :
- add `nullable*` functions.

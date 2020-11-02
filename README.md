# unit-test-array
Set of helpful assertions for array

## Installation
You may install these assertions with Composer by running:

``composer require --dev zjkiza/unit-test-array``

Afterwards, add the trait to your base TestCase class:

```php
<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use ZJKiza\Testing\AssertArray;

class AssertArraySubset extends TestCase
{
    use AssertArray;
} 
```

##Assertions

If the array $actual is part of an array $expect. Checks if are of the same type.

``
public function assertArraySubsetSame(array $expect , array $actual): void
``

If the array $actual is part of an array $expect. Checks if are is equal after type juggling.

``
public function assertArraySubsetEqual(array $expect , array $actual): void
``

If there are the same keys in the array.

``
public function assertArrayEqualsKeys(array $expect, array  $actual): void
``

Finds a part of an array in a multidimensional array. 

``
public function assertArrayFragmentSame(array $expect , array $actual, string $columnName, string $needle): void
``
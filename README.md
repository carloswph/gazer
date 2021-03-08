# Gazer

An easier and practical implementation of the Observer pattern in PHP. Work with abstracts rather than implementing interfaces.

# Installation

`composer require carloswph/gazer`

# Usage

Simple: instead of creating yourself abstracts or implementing pairs SplSubject and SplObserver in multiple classes, all you need to do is extending the classes Gazer\Subject and Gazer\Gazer in your subject class and the observers, respectivelly. Let's use a quick example:

```php
use Gazer\Subject;
use Gazer\Gazer;

require __DIR__ . '/vendor/autoload.php';

// This is the subject class
class A extends Subject {

}
// This is one observer - but you could use the same logic
// for more observers, like classes C or D, for instance
class B extends Gazer {

}
```

At this moment, the classes A and B area already able to perform their roles in the observer pattern. Logic follows the pattern regular interfaces SplSubject and SplObserver, so the methods will be exactly the ones you expected.

```php
$a = new A();
$b = new B();

// Now, all we need to do for B to "observer" A
// is using the method attach() from A

$a->attach($b);

// Ready! If A uses the method notify(), then a method
// update() in B will be ran, and B gets the A object
// held in the variable $subject, thus...

$a->notify(); // B gets A object immediately
```

Let's use the same classes, but now with some methods and properties. We'll create a property $example in A and a random method in B, which will apply any logic using the native property $subject.

```php
use Gazer\Subject;
use Gazer\Gazer;

require __DIR__ . '/vendor/autoload.php';

class A extends Subject {

	public $example = 'Observed';

	public function __construct() {

		echo "Subject\n";
	}
}

class B extends Gazer {

	public function info() {

		echo $this->subject->example;
	}

}

$a = new A();
$b = new B();

// The only thing you can see is the word "Subject" echoed
// But now, let's put B to observe A

$a->attach($b);
$a->notify();

// As B is observing and A has notified all observers, so
// now we can manipulate the A object, which has been updated
// and held in the property $subject of B

$b->info(); // Prints "Observed"

```
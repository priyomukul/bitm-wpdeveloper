<?php
$name = 'HabiJabi'; // Data Type: String
echo "Hello World " . $name; // String Concat (বাংলায়ঃ যোগ করা)

echo  "<br/>"; // line break for output well.

$isUser = true; // or false // Data Type: boolean

/**
 * 1 or 0 is also represent boolean as 1 is truthy and 0 is falsy value.
 *
 * even an empty string is falsy and a string with some chars is truthy.
 *
 * which is also refer as true & false boolean value. you can use below function to justify.
 */
var_dump( boolval( '' ) ); // false

echo  "<br/>"; // line break for output well.

var_dump( boolval( 'abc' ) ); // true

echo  "<br/>"; // line break for output well.

$age = 21; // Data Type: integer
$amount = 29.5; // Data Type: float

/**
 * This Person is a blueprint of, how  a Person object will be.
 */
class Person {
    public $name = ''; // Here name is a property for a Person.

    /**
     * Construct is a function which invoked automatically
     *
     * where some params type is in below.
     * @param string $name
     * @param string $age
     */
    public function __construct($name,  $age = ''){
        $this->name = $name;
    }

    // In a class function written like below, is called method.
    // which can be used as $object->query() in real world.;
    public function query(){
        echo 'Query <br>';
    }
}

$mukul = new Person('Mukul'); // mukul is an object of Person.
$mukul->query(); // here we are calling a method from that object. which is writen in Person class.
var_dump( gettype($mukul) );

echo  "<br/>"; // line break for output well.


$age = 30;
echo $age >= 30 ? 'Bura' : 'Juwan';  // this is Ternary operator.

echo  "<br/>"; // line break for output well.
/**
 * From line 64 to 68,
 * these lines of code represents line number 59 in a detail way.
 */
if( $age >= 30 ) {
    echo 'Bura';
} else {
    echo 'Juwan';
}

echo  "<br/>"; // line break for output well.

echo $age ?? 40; // This is null operator.

echo  "<br/>"; // line break for output well.
/**
 * Loops, for, while, do while.
 */
for($i = 0; $i < 10; $i++) {
    echo $i . '<br/>';
}

// while( condition ) {
//     //condition has to be false in a certain time;
// }

// do {
// code, code will run at least one time.
// condition false
// } while( condition );

$array = [ // this is an associative array. means that we defined all the index manually.
    'name' => 'Janina',
    'age' => 'Age o Janina'
];
// foreach will excute for each value in an array.
foreach( $array as $index => $value ) { // means this will run 2 times. as array has 2 value.
    // loop body
    echo $index . ':- ' . $value . '<br>';
}


$array = [ 1, 2, 3, 4, 5]; // this is a numerical array, means we don't define any index here. index will start from 0
list( $color, $kichuekta ) = $array; // Assign variables as if they were an array, https://www.php.net/manual/en/function.list


extract( $array ); // Import variables into the current symbol table from an array, https://www.php.net/manual/en/function.extract


/**
 * This is how a function is written.
 * function can have one/more parameters or nothing.
 * function can return something or nothing/void.
 *
 * for example this function has a params called $name and return the $name with UPPERCASE letter.
 */
function makeTheNameUpperCase($name){ // here $name is a param for the function
    return strtoupper($name);
}

$upperCaseName = makeTheNameUpperCase( 'mukul' ); // here 'mukul' is an argument for the function.
var_dump( $upperCaseName );

/**
 * ...$params is called
 * Variable-length argument lists
 *
 * @param array $params
 * @return void
 */
function functionName(...$params){ // $params is an array here.
    return $params[0];
}
/**
 *  you can pass multiple argument for this function. cause this function is catching all the pramas
 * using ... token
 *
 * https://www.php.net/manual/en/functions.arguments.php#functions.variable-arg-list
 */
// functionName( 'Value 1', 'Value 2' );

/**
 * Passing by value is default.
 * Passing by reference: https://www.php.net/manual/en/functions.arguments.php#functions.arguments.by-reference
 */
<?php
// $name = 'HabiJabi';
// echo "Hello World " . $name;

// var_dump(boolval(''));

class Person {
    public $name = '';

    public function __construct($name,  $age = ''){
        $this->name = $name;
    }

    public function query(){
        echo 'Query';
    }
}

$mukul = new Person('Mukul');
$mukul->query();

return;

// var_dump( gettype($mukul) );

$age = 30;
// echo $age >= 30 ? 'Bura' : 'Juwan';

// var_dump( $age );

// echo $age ?? 40;

// if( $age >= 30 ) {
//     echo 'Bura';
// } else {
//     echo 'Juwan';
// }

// for($i = 0; $i < 10; $i++) {
//     echo $i;
// }

// function funcName() {
//     yield 50;
//     yield 100;
// }




// while( condition ) {

//     //condition has to be false in a certain time;
// }


// do {


//     // condition false
// } while( condition );

$array = [ 1, 2, 3, 4, 5];
list( $color, $kichuekta ) = $array;

// var_dump( $color );

$array2 = [
    'name' => 'Janina',
    'age' => 'Age o Janina'
];
// foreach( $array as $index => $value ) {
//     // body

//     echo $index . ':- ' . $value . '<br>';
// }

// extract( $array );

// var_dump( $name );

// var_dump( array_values($array2) );

function funcName(&$args ){
    // body
        // extract( $args );
    // code

    $args['name'] = 'Changed Name';

    var_dump( $args );
}

$args = array( 'name' => 'Mukul' ) ;
funcName( $args );

var_dump( $args );

// mukul+bitm@ar.com.bd


// bitm.mukul.me
<?php

trait Helper {
    public static function toString(){
        echo 'toString: ' . get_called_class();
    }
}

class User {
    use Helper;

    private $username = 'mukul';

    public static $count = 0;

    public function __construct(){
        static::$count++;
    }

    /**
     * This __get, __set magic methods are used to dynamically creates properties and methods.
     * ( which we use private or protected properties mostly)
     *
     * most likely getters and setters.
     *
     * @param string $name
     * @return void
     */
    public function __get( $name ){
        return $this->$name;
    }
    public function __set( $name, $value ){
        $this->$name = $value;
    }

}

$user = new User;
$user2 = new User;
// $user->username = 'Habib';
echo $user::$count; // Static Keyword/Variable in action.
echo '<br>';

abstract class Account {
    use Helper;

    public $name;
    private $balance = 0;
    protected $opening_date;

    public function __construct( $name, $opening_date ){
        echo "Account Created. \n";
        $this->name = $name;
        $this->opening_date = $opening_date;
    }

    public function get_balance(){
        return $this->balance;
    }

    public function isValidTransaction(){
        return true;
    }

    // abstract public function isValidTransaction();

    public function deposit( $amount ){
        $this->balance = $this->balance + $amount;
    }

    public function withdraw( $amount ){

        if( ! $this->isValidTransaction() ) {
            return "Your transaction is failed due to invalid credentials.";
        }

        if( $this->balance >= $amount ) {
            $this->balance = $this->balance - $amount;
            return $this->balance;
        }

        return "You don't have sufficient balance.";
    }
}

class SavingsAccount extends Account {
    private $tenor = '5 Years';

    public static $staticValue = 0;

    public function __construct( $name, $opening_date ){
        parent::__construct( $name, $opening_date );
        self::$staticValue = ++self::$staticValue;
    }

    public function isValidTransaction(){
        if( strtotime( '+' . $this->tenor, strtotime( $this->opening_date ) ) <= time() ) {
            return true;
        }

        return false;
    }

}

User::toString();
echo '</br>';

$mukul = new SavingsAccount( 'Mukul', '01/01/2017' );
$mukul2 = new SavingsAccount( 'Mukul 2', '01/01/2017' );

echo $mukul->name;
echo '</br>';
echo SavingsAccount::$staticValue;

echo '</br>';

$mukul->deposit( 1000 );

echo '</br>';

echo $mukul->get_balance();

echo '</br>';

echo $mukul->withdraw(500);
echo '</br>';
echo $mukul->withdraw(501);
<?php

function dump( $data ){
    echo '<pre>', print_r( $data, 1 ), '</pre>';
}

function database(){
    try {
        $pdo = new PDO( 'mysql:host=127.0.0.1;dbname=todo', 'root', 'secret' );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (\Exception $e) {
        die('Connection failed.');
    }
}
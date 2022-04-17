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

/**
 * C -  Create
 * R - Read
 * U - Update
 * D - Delete
 */

// dump( database()->query('SELECT * FROM todo', PDO::FETCH_ASSOC)->fetchAll() );  // Read Operation in SQL via PDO

// dump( database()->prepare("INSERT INTO todo( name ) VALUES( :name )")->execute([
//     'name' => 'Task 3',
// ]) ); // Create Operation in SQL via PHP

// database()->prepare("UPDATE todo SET name = :name WHERE id = :id")->execute([
//     'name' => 'List 1',
//     'id' => 3
// ]); // Update Operation in SQL via PHP

// database()->prepare("DELETE FROM todo WHERE id = :id")->execute([
//     'id' => 3
// ]);
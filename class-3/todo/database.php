<?php
function dump( $data ) {
    echo '<pre>', print_r( $data, 1 ), '</pre>';
}

function database(){
    try {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=todo', 'root', 'secret');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (\Exception $e) {
        die('Database connection failed.');
    }
}

function todolist(){
    return database()->query('select * from todo', PDO::FETCH_ASSOC)->fetchAll();
}

function create_todo( $name ){
    return database()->prepare("INSERT INTO todo(name) VALUES(:name)")->execute([
        'name' => $name
    ]);
}

function update_todo( $id, $name ){
    return database()->prepare("UPDATE todo SET name = :name WHERE id = $id")->execute([
        'name' => $name,
    ]);
}

$message = '';

if( isset( $_POST['todo_submit'] ) && ! isset( $_GET['id'] ) ) {
    if( create_todo( $_POST['todo_name'] ) ) {
        $message = 'Successfully Todo Added.';
    }
}

if( isset( $_GET['action'] ) ) {
    if( $_GET['action'] == 'delete' ) {
        $_id = (int) $_GET['id'];
        if( database()->exec("DELETE FROM todo WHERE id = $_id") ) {
            $message = 'Delete';
            header('Location: /todo');
        }
    }

    if( $_GET['action'] == 'edit' ) {
        $_id = (int) $_GET['id'];
        $todo = database()->query("SELECT * FROM todo WHERE id = $_id", PDO::FETCH_ASSOC)->fetch();
        if( isset( $_POST['todo_submit'] ) ) {
            if( update_todo( $_id, trim($_POST['todo_name']) ) ) {
                $message = 'Successfully Todo Edited.';
                header('Location: /todo');
            }
        }
    }
}
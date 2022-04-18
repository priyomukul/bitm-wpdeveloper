<?php
  require_once 'database.php';
?>

  <!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App JavaScript | CodingNepal</title>
    <link rel="stylesheet" href="todo/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <header>Todo App</header>
    <p><?php  echo $message; ?></p>
    <form action="" method="POST">
        <div class="inputField">
        <input type="text" name="todo_name" value="<?php echo ! empty( $todo['name'] ) ? $todo['name'] : ''; ?>"  placeholder="Add your new todo">
        <input type="submit"  name="todo_submit" value="<?php echo ! empty( $todo['id'] ) ? 'Edit Todo' : 'Add Todo'; ?>">
        <!-- <button type="submit" name="todo_submit"><i class="fas fa-plus"></i></button> -->
      </div>
    </form>

    <?php
      if( ! empty( $list = todolist() )) {
        ?>

        <ul class="todoList">

          <?php
            foreach( $list as $item ) {
              $html = '<li>';
              $html .= $item['name'];
              $html .= '<span class="icon"><a href="?action=delete&id='. $item['id'] .'"><i class="fas fa-trash"></i></a>';
              $html .= '<a href="?action=edit&id='. $item['id'] .'"><i class="fas fa-star"></i></a></span>';
              $html .= '</li>';

              echo $html;
            }
          ?>
        </ul>

        <?php

      }

    ?>


    <div class="footer">
      <span>You have <span class="pendingTasks"></span> pending tasks</span>
      <button>Clear All</button>
    </div>
  </div>

  <!-- <script src="todo/script.js"></script> -->

</body>
</html>

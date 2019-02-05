<?php
  require_once('scripts/config.php');
  confirm_logged_in();

  if(isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    //$password = trim($_POST['password']);

    // validation
    if(empty($username) || empty($email)){
      $message = 'Please fill the required fields';
    }else{
      $result = createUser($name, $username, $email);
      $message = $result;
    }
  }
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Create User</title>
</head>
<body>
  <?php if(!empty($message)):?>
    <p><?php echo $message;?></p>
  <?php endif;?>
  <h2>Create User</h2>

  <form action="admin_createuser.php" method="POST">

    <label for="name">first name</label>
    <input type="text" id="first_name" name="name"><br><br>

    <label for="username">username</label>
    <input type="text" id="user_name" name="username"><br><br>

    <label for="email">email</label>
    <input type="text" id="email" name="email"><br><br>

    <!-- <label for="password">password</label>
    <input type="password" id="password" name="password"><br><br> -->

    <button type="submit" name="submit">Create User</button>

  </form>


</body>
</html>

<?php
  function createUser($name, $username, $email){
    include('connect.php');

    $check_user_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name = :username';
    $check_user_set = $pdo->prepare($check_user_query);
    $check_user_set->execute(
      array(
        ':username' => $username
      )
    );

    $check_user = $check_user_set->fetchColumn();
    if($check_user > 0){
      return 'User Exists';
    }

    $newpassword = generate_password();
    // while($user_set = $check_user_set->fetchAll(PDO::FETCH_ASSOC)){
    //   if()
    //   return 'User exists.';
    // }

    $create_user_query = 'INSERT INTO tbl_user (user_fname, user_name, user_pass, user_email) VALUES (:name, :username, :password, :email)';
    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_set->execute(
        array(
        ':name' => $name,
        ':username' => $username,
        ':password' => password_hash($newpassword, PASSWORD_DEFAULT),
        ':email' => $email
      )
    );

    if($create_user_set->rowCount()){
      //redirect_to('index.php');
      //redirect_to('fakeemail.php');
      echo 'Your System Generated Password is: '.$newpassword.' and your login username is: '.$username;
      send_email($name, $email, $username, $newpassword);
    }else{
      return 'NOOOOOPE';
    }

    // if($create_user_set){
    //   redirect_to('index.php');
    // }else{
    //   return 'User failed.';
    // }
  }

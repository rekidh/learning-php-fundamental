<?php
session_start();
if (isset($_SESSION["login"])) {
  header('location:index.php');
  exit;
}
require 'functions.php';
if (isset($_POST["login"])) {

  $userName = $_POST["username"];
  $password = $_POST["password"];


  $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$userName'");


  // cek apakah ada username di tabel user
  if (mysqli_num_rows($result) === 1) {

    // cek pasword nya
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      $_SESSION["login"] = true;
      header("location: index.php");
      exit;
    }
  }
  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
</head>
<style>
  form {
    margin-left: 25%;
    margin-top: 3rem;
    width: 35rem;
    height: 25rem;
    position: absolute;
    border: 1px solid black;
  }

  form ul li {
    margin-top: 4rem;
    list-style: none;
  }

  form ul li input {
    width: 50%;
    height: 1.3rem;
    margin-left: 5rem;
  }

  form ul li button {
    width: 10rem;
    margin: 0 0 0 30%;
  }

  input ::focus {
    border: 1px solid #d7d7d7;
  }

  form h4,
  p,
  .daftar {
    text-align: center;
  }
</style>

<body>


  <form action="" method="post">
    <h4>LOGIN FROM</h4>
    <ul>
      <li>
        <label for="username"> username:</label>
        <input type="text" name="username" id="username">
      </li>
      <li>
        <label for="password">password:</label>
        <input type="password" name="password" id="password">
      </li>
      <li> <button type="submit" name="login">LOGIN</button></li>
    </ul>
    <?php if (isset($error)) : ?>
      <p style="color: red; ">username/password salah</p>
    <?php endif; ?>
    <br>
    <div class="daftar">
      <a href="registrasi.php">daftar</a>
      <a href="registrasi.php">Login Google</a>
    </div>
  </form>
</body>

</html>
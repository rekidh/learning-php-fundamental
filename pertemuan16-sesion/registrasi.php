<?php

require 'functions.php';

if (isset($_POST['register'])) {
  if (register($_POST) > 0) {
    echo "<script> alert('user berhasil di tambahakan') </script>";
  } else {
    echo mysqli_error($db);
    echo "<script>alert ('gagal') </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registarasi</title>
</head>
<style>
  form {
    margin-left: 25%;
    margin-top: 3rem;
    width: 40rem;
    height: 30rem;
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

  #password2 {
    margin-left: 1rem;
  }

  form ul li button {
    width: 10rem;
    margin: 0 0 0 30%;
  }

  input ::focus {
    border: 1px solid #d7d7d7;
  }

  form h4 {
    text-align: center
  }
</style>

<body>

  <form action="" method="post">
    <h4>Daftarkan email anda untuk bisa masuk</h4>
    <ul>
      <li>
        <label for="username">username:</label>
        <input type="text" name="username" id="username">
      </li>
      <li>
        <label for="password">pasword:</label>
        <input type="password" name="password" id="password">
      </li>
      <li>
        <label for="password2">Konfismasi Pasword</label>
        <input type="password" name="password2" id="password2">
      </li>
      <li><button type="submit" name="register">Registarasi</button></li>
    </ul>

  </form>

</body>
<script></script>

</html>
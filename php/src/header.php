<?php
$pdo = new PDO('mysql:host=database; dbname=mon_site','mon_user','secret!');

if (isset($_POST['username'],$_POST['password'],$_POST['confirm_password'])
                          &&  $_POST['confirm_password'] === $_POST['password'])
{
  $username=strip_tags($_POST['username']);
  $password=strip_tags($_POST['password']);
  $confirm= strip_tags($_POST['confirm_password']);
  $query = 'INSERT INTO users VALUES (NULL,:username,:password,:confirm_password)';
  $statement = $pdo->prepare($query);
  $status = $statement->execute([':username'=>$username,':password'=>$password,':confirm_password'=>$confirm]);
    echo  ($status===false) ? 'ECHEC' :  'OK';
}
?>

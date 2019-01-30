<?php
session_start();
if (isset($_SESSION['id'])){
    $pdo = new PDO('mysql:host=database; dbname=mon_site','mon_user','secret!');
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username= :username");
    $stmt->execute([':username'=>$_SESSION['username']]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $author_id=$data['id'];
      if(isset($_POST['submit'])){
          if (isset($_POST['title'],$_POST['content'])){
              $title=strip_tags($_POST['title']);
              $content=strip_tags($_POST['content']);
                if(empty($title) || empty($content)){
                  echo "Title and content must be set";
                 }else{
                      $query = 'INSERT INTO article VALUES (NULL,:title,:content,:author_id)';
                      $statement = $pdo->prepare($query);
                      $status = $statement->execute([':title'=>$title,':content'=>$content,':author_id'=>$author_id]);
                        echo  ($status===false) ? 'A problem was ancountred with DB' :  'You add an article successfuly';
                      }
                }
       }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/css/style.css" />
<title>Mon Site</title>
</head>
<body>
  <h1 align="center">Welcome</h1>
  <p align =center class="par">Please fill the textarea or upload a file and click on the button add to post a new article</p>
  <h3  align="center"><a href="mySpace.php">back to articles</a></h3>
</br>
<div>
  <form action="" method="post">
        <div>
          Please give a title to you article:
          <input type="text" name="title" placeholder="title"></input>
        </div>
        <hr>
      <div>
        <div>
          Article:
          <textarea name="content" rows="50" cols="100"></textarea>
        </div>
      <div>
        <input type="submit" name="submit" value="Add article"></input>
      </div>
  </form>
</div>
<?php }else{echo "You are not authorized";}?>
</body>
</html>

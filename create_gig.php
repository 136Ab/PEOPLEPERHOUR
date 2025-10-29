<?php include 'db.php'; session_start(); if(!isset($_SESSION['user_id'])){echo "<script>window.location.href='login.php';</script>"; exit;} ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Create Gig</title>
<style>
body{font-family:Poppins,sans-serif;background:#f0f2f5;margin:0;}
.container{max-width:500px;margin:50px auto;background:#fff;padding:30px;border-radius:15px;box-shadow:0 4px 12px rgba(0,0,0,0.1);}
h2{text-align:center;color:#182848;}
input,textarea{width:100%;padding:10px;margin:10px 0;border:1px solid #ccc;border-radius:8px;}
button{background:#4b6cb7;color:#fff;border:none;padding:10px;width:100%;border-radius:8px;cursor:pointer;}
button:hover{background:#182848;}
</style>
</head>
<body>
<div class="container">
<h2>Create a Gig</h2>
<form method="POST">
  <input type="text" name="title" placeholder="Gig Title" required>
  <textarea name="description" placeholder="Description" required></textarea>
  <input type="text" name="category" placeholder="Category" required>
  <input type="number" step="0.01" name="price" placeholder="Price ($)" required>
  <button name="create">Create Gig</button>
</form>
</div>

<?php
if(isset($_POST['create'])){
  $uid=$_SESSION['user_id'];
  $t=$_POST['title']; $d=$_POST['description']; $c=$_POST['category']; $p=$_POST['price'];
  $sql="INSERT INTO gigs(user_id,title,description,category,price)VALUES('$uid','$t','$d','$c','$p')";
  if($conn->query($sql)){echo "<script>alert('Gig created successfully!');window.location.href='dashboard.php';</script>";}
  else{echo "<script>alert('Error creating gig');</script>";}
}
?>
</body>
</html>

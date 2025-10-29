<?php include 'db.php'; session_start(); if(!isset($_SESSION['user_id'])){echo "<script>window.location.href='login.php';</script>"; exit;} ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Post a Job</title>
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
<h2>Post a New Job</h2>
<form method="POST">
  <input type="text" name="title" placeholder="Job Title" required>
  <textarea name="description" placeholder="Job Description" required></textarea>
  <input type="number" step="0.01" name="budget" placeholder="Budget ($)" required>
  <input type="date" name="deadline" required>
  <button name="post">Post Job</button>
</form>
</div>

<?php
if(isset($_POST['post'])){
  $title=$_POST['title']; $desc=$_POST['description']; $budget=$_POST['budget']; $deadline=$_POST['deadline']; $cid=$_SESSION['user_id'];
  $sql="INSERT INTO jobs(client_id,title,description,budget,deadline)VALUES('$cid','$title','$desc','$budget','$deadline')";
  if($conn->query($sql)){echo "<script>alert('Job posted successfully!');window.location.href='my_jobs.php';</script>";}
  else{echo "<script>alert('Error posting job');</script>";}
}
?>
</body>
</html>

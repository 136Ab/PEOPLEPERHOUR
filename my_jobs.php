<?php include 'db.php'; session_start(); if(!isset($_SESSION['user_id'])){echo "<script>window.location.href='login.php';</script>"; exit;} ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>My Jobs</title>
<style>
body{font-family:Poppins,sans-serif;background:#f8f9fa;margin:0;}
.container{max-width:900px;margin:40px auto;}
.job{background:#fff;padding:20px;margin:15px 0;border-radius:12px;box-shadow:0 4px 10px rgba(0,0,0,0.1);}
button{background:#4b6cb7;color:#fff;border:none;padding:8px 15px;border-radius:6px;cursor:pointer;}
button:hover{background:#182848;}
h2{text-align:center;color:#182848;}
</style>
</head>
<body>
<div class="container">
<h2>My Posted Jobs</h2>
<?php
$cid=$_SESSION['user_id'];
$res=$conn->query("SELECT * FROM jobs WHERE client_id=$cid ORDER BY id DESC");
while($j=$res->fetch_assoc()){
  echo "<div class='job'>
    <h3>{$j['title']}</h3>
    <p>{$j['description']}</p>
    <p><strong>Budget:</strong> $".$j['budget']."</p>
    <button onclick=\"redirect('payment.php?job_id={$j['id']}')\">Make Payment</button>
  </div>";
}
?>
</div>
<script>function redirect(p){window.location.href=p;}</script>
</body>
</html>

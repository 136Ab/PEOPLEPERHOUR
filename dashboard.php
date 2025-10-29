<?php include 'db.php'; session_start(); if(!isset($_SESSION['user_id'])){echo "<script>window.location.href='login.php';</script>"; exit;} ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<style>
body{font-family:Poppins,sans-serif;background:#f8f9fa;margin:0;}
header{background:#182848;color:#fff;padding:15px;text-align:center;}
.container{max-width:1000px;margin:40px auto;}
.card{background:#fff;border-radius:12px;box-shadow:0 4px 10px rgba(0,0,0,0.1);padding:20px;margin:20px 0;text-align:center;}
button{background:#4b6cb7;color:#fff;border:none;padding:10px 20px;border-radius:8px;cursor:pointer;}
button:hover{background:#182848;}
</style>
</head>
<body>
<header>
  <h2>Welcome to Dashboard</h2>
</header>
<div class="container">
  <div class="card">
    <h3>Freelancer Options</h3>
    <button onclick="redirect('create_gig.php')">Create Gig</button>
    <button onclick="redirect('browse_jobs.php')">Browse Jobs</button>
  </div>
  <div class="card">
    <h3>Client Options</h3>
    <button onclick="redirect('post_job.php')">Post Job</button>
    <button onclick="redirect('my_jobs.php')">My Jobs</button>
  </div>
  <div class="card">
    <button onclick="redirect('messages.php')">Messages</button>
    <button onclick="redirect('logout.php')">Logout</button>
  </div>
</div>

<script>
function redirect(p){window.location.href=p;}
</script>
</body>
</html>

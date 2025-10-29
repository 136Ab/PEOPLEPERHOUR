<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Browse Jobs</title>
<style>
body{font-family:Poppins,sans-serif;background:#f8f9fa;margin:0;}
.container{max-width:900px;margin:40px auto;}
.job{background:#fff;border-radius:12px;padding:20px;margin:15px 0;box-shadow:0 4px 10px rgba(0,0,0,0.1);}
button{background:#4b6cb7;color:#fff;border:none;padding:8px 15px;border-radius:6px;cursor:pointer;}
button:hover{background:#182848;}
h2{text-align:center;color:#182848;}
</style>
</head>
<body>
<div class="container">
<h2>Available Jobs</h2>
<?php
$res=$conn->query("SELECT jobs.*, users.name FROM jobs JOIN users ON jobs.client_id=users.id WHERE status='open' ORDER BY jobs.id DESC");
while($job=$res->fetch_assoc()){
  echo "<div class='job'>
    <h3>{$job['title']}</h3>
    <p>{$job['description']}</p>
    <p><strong>Budget:</strong> $".$job['budget']." | <strong>Client:</strong> ".$job['name']."</p>
    <button onclick=\"redirect('view_job.php?id={$job['id']}')\">View Job</button>
  </div>";
}
?>
</div>
<script>function redirect(p){window.location.href=p;}</script>
</body>
</html>

<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Freelancer Profile</title>
<style>
body{font-family:Poppins,sans-serif;background:#f8f9fa;margin:0;}
.container{max-width:800px;margin:40px auto;background:#fff;padding:25px;border-radius:15px;box-shadow:0 4px 10px rgba(0,0,0,0.1);}
h2{color:#182848;}
.gigs{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:15px;margin-top:20px;}
.card{background:#fff;border:1px solid #ddd;border-radius:10px;padding:15px;box-shadow:0 2px 5px rgba(0,0,0,0.05);}
</style>
</head>
<body>
<div class="container">
<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $res=$conn->query("SELECT * FROM users WHERE id=$id AND user_type='freelancer'");
  if($res->num_rows>0){
    $u=$res->fetch_assoc();
    echo "<h2>{$u['name']}</h2>";
    echo "<p><strong>Skills:</strong> {$u['skills']}</p>";
    echo "<p><strong>Bio:</strong> {$u['bio']}</p>";
    
    echo "<h3>Gigs</h3><div class='gigs'>";
    $gigs=$conn->query("SELECT * FROM gigs WHERE user_id=$id");
    while($g=$gigs->fetch_assoc()){
      echo "<div class='card'><h4>{$g['title']}</h4><p>".substr($g['description'],0,80)."...</p><p><strong>$".$g['price']."</strong></p></div>";
    }
    echo "</div>";
  }else{
    echo "<h2>Freelancer not found!</h2>";
  }
}
?>
</div>
</body>
</html>

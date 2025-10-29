<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login | PeoplePerHour Clone</title>
<style>
body{font-family:Poppins,sans-serif;background:#f0f2f5;margin:0;}
.container{max-width:400px;margin:80px auto;background:#fff;padding:30px;border-radius:15px;box-shadow:0 4px 12px rgba(0,0,0,0.1);}
h2{text-align:center;color:#182848;}
input{width:100%;padding:10px;margin:10px 0;border:1px solid #ccc;border-radius:8px;}
button{background:#4b6cb7;color:#fff;border:none;padding:10px;width:100%;border-radius:8px;cursor:pointer;}
button:hover{background:#182848;}
a{text-decoration:none;color:#4b6cb7;}
</style>
</head>
<body>
<div class="container">
  <h2>Login</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button name="login">Login</button>
  </form>
  <p style="text-align:center;">Don’t have an account? <a href="#" onclick="redirect('signup.php')">Signup</a></p>
</div>

<script>
function redirect(p){window.location.href=p;}
</script>

<?php
if(isset($_POST['login'])){
  $email=$_POST['email']; $pass=$_POST['password'];
  $res=$conn->query("SELECT * FROM users WHERE email='$email'");
  if($res->num_rows>0){
    $row=$res->fetch_assoc();
    if(password_verify($pass,$row['password'])){
      $_SESSION['user_id']=$row['id'];
      $_SESSION['user_type']=$row['user_type'];
      echo "<script>alert('Login successful!');redirect('dashboard.php');</script>";
    } else echo "<script>alert('Incorrect password');</script>";
  } else echo "<script>alert('Email not found');</script>";
}
?>
</body>
</html>

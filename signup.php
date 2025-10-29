<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Signup | PeoplePerHour Clone</title>
<style>
body{font-family:Poppins, sans-serif;background:#f0f2f5;margin:0;padding:0;}
.container{max-width:400px;margin:60px auto;background:#fff;padding:30px;border-radius:15px;box-shadow:0 4px 12px rgba(0,0,0,0.1);}
h2{text-align:center;color:#182848;}
input,select{width:100%;padding:10px;margin:10px 0;border:1px solid #ccc;border-radius:8px;}
button{background:#4b6cb7;color:#fff;border:none;padding:10px;width:100%;border-radius:8px;cursor:pointer;}
button:hover{background:#182848;}
a{text-decoration:none;color:#4b6cb7;}
</style>
</head>
<body>
<div class="container">
  <h2>Create Account</h2>
  <form method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <select name="user_type" required>
      <option value="">Select Account Type</option>
      <option value="freelancer">Freelancer</option>
      <option value="client">Client</option>
    </select>
    <button type="submit" name="signup">Signup</button>
  </form>
  <p style="text-align:center;">Already have an account? <a href="#" onclick="redirect('login.php')">Login</a></p>
</div>

<script>
function redirect(p){window.location.href=p;}
</script>

<?php
if(isset($_POST['signup'])){
  $name=$_POST['name']; $email=$_POST['email']; $pass=password_hash($_POST['password'],PASSWORD_BCRYPT); $type=$_POST['user_type'];
  $check=$conn->query("SELECT * FROM users WHERE email='$email'");
  if($check->num_rows>0){echo "<script>alert('Email already registered');</script>";}
  else{
    $sql="INSERT INTO users(name,email,password,user_type)VALUES('$name','$email','$pass','$type')";
    if($conn->query($sql)){echo "<script>alert('Account created successfully!');redirect('login.php');</script>";}
    else{echo "<script>alert('Error creating account');</script>";}
  }
}
?>
</body>
</html>

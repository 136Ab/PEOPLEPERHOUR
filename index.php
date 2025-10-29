<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PeoplePerHour Clone | Home</title>
<style>
body {
  font-family: 'Poppins', sans-serif;
  margin: 0; padding: 0;
  background: #f8f9fa;
  color: #333;
}
header {
  background: #4b6cb7;
  background: linear-gradient(90deg, #182848, #4b6cb7);
  color: white;
  padding: 20px 50px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
header h1 {
  font-size: 28px;
  margin: 0;
}
nav a {
  color: white;
  text-decoration: none;
  margin: 0 15px;
  font-weight: 500;
}
nav a:hover {
  text-decoration: underline;
}
.container {
  max-width: 1100px;
  margin: 40px auto;
  text-align: center;
}
h2 {
  color: #182848;
  font-size: 26px;
}
.freelancers, .categories {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 20px;
  margin-top: 30px;
}
.card {
  background: white;
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  padding: 20px;
  transition: 0.3s;
}
.card:hover {
  transform: translateY(-5px);
}
button {
  background: #4b6cb7;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 8px;
  cursor: pointer;
}
button:hover {
  background: #182848;
}
footer {
  text-align: center;
  background: #182848;
  color: white;
  padding: 15px 0;
  margin-top: 50px;
}
</style>
</head>
<body>

<header>
  <h1>PeoplePerHour Clone</h1>
  <nav>
    <a href="#" onclick="redirect('login.php')">Login</a>
    <a href="#" onclick="redirect('signup.php')">Signup</a>
    <a href="#" onclick="redirect('browse_jobs.php')">Browse Jobs</a>
  </nav>
</header>

<div class="container">
  <h2>Featured Freelancers</h2>
  <div class="freelancers">
    <?php
    $result = $conn->query("SELECT * FROM users WHERE user_type='freelancer' LIMIT 6");
    while($row = $result->fetch_assoc()){
      echo "<div class='card'>
              <h3>{$row['name']}</h3>
              <p>".substr($row['bio'],0,80)."...</p>
              <button onclick=\"redirect('freelancer_profile.php?id={$row['id']}')\">View Profile</button>
            </div>";
    }
    ?>
  </div>

  <h2>Popular Categories</h2>
  <div class="categories">
    <div class="card">💻 Web Development</div>
    <div class="card">🎨 Graphic Design</div>
    <div class="card">✍️ Writing & Translation</div>
    <div class="card">📈 Digital Marketing</div>
    <div class="card">📷 Photography</div>
    <div class="card">🎥 Video Editing</div>
  </div>
</div>

<footer>
  <p>© 2025 PeoplePerHour Clone — All Rights Reserved</p>
</footer>

<script>
function redirect(page){
  window.location.href = page;
}
</script>

</body>
</html>

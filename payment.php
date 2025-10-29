<?php
include 'db.php';
session_start();
if(!isset($_SESSION['user_id'])){
  echo "<script>window.location.href='login.php';</script>";
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Payment</title>
<style>
body{font-family:Poppins,sans-serif;background:#f0f2f5;margin:0;}
.container{max-width:400px;margin:60px auto;background:#fff;padding:30px;border-radius:15px;box-shadow:0 4px 12px rgba(0,0,0,0.1);}
h2{text-align:center;color:#182848;}
select,input{width:100%;padding:10px;margin:10px 0;border:1px solid #ccc;border-radius:8px;}
button{background:#4b6cb7;color:#fff;border:none;padding:10px;width:100%;border-radius:8px;cursor:pointer;}
button:hover{background:#182848;}
</style>
</head>
<body>
<div class="container">
<h2>Payment Page</h2>
<form method="POST">
  <select name="method" required>
    <option value="">Select Payment Method</option>
    <option value="COD">Cash on Delivery</option>
    <option value="Online">Dummy Online Payment</option>
  </select>
  <input type="number" step="0.01" name="amount" placeholder="Amount ($)" required>
  <button type="submit" name="pay">Make Payment</button>
</form>
</div>

<?php
if(isset($_POST['pay'])){
  $method = $_POST['method'];
  $amount = $_POST['amount'];
  $client = $_SESSION['user_id'];
  $job_id = $_GET['job_id'] ?? 0;

  // ✅ Insert dummy payment
  $sql = "INSERT INTO payments (job_id, client_id, amount, payment_method, status, created_at)
          VALUES ('$job_id', '$client', '$amount', '$method', 'Paid', NOW())";

  if($conn->query($sql)){
    echo "<script>alert('Payment successful!');window.location.href='my_jobs.php';</script>";
  } else {
    echo "<script>alert('Error: Payment not recorded');</script>";
  }
}
?>
</body>
</html>

<?php
include 'db.php';
session_start();
if(!isset($_SESSION['user_id'])){
  echo "<script>window.location.href='login.php';</script>";
  exit;
}
$uid = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Messages</title>
<style>
body{font-family:Poppins,sans-serif;background:#f8f9fa;margin:0;}
.container{max-width:700px;margin:40px auto;background:#fff;padding:20px;border-radius:15px;box-shadow:0 4px 10px rgba(0,0,0,0.1);}
.message{border-bottom:1px solid #eee;padding:10px 0;}
.sent{background:#e3f2fd;padding:8px;border-radius:10px;margin:5px 0;text-align:right;}
.received{background:#f1f1f1;padding:8px;border-radius:10px;margin:5px 0;text-align:left;}
input,textarea{width:100%;padding:10px;margin:10px 0;border:1px solid #ccc;border-radius:8px;}
button{background:#4b6cb7;color:#fff;border:none;padding:10px;width:100%;border-radius:8px;cursor:pointer;}
button:hover{background:#182848;}
h2{text-align:center;color:#182848;}
</style>
</head>
<body>
<div class="container">
<h2>Messages</h2>

<!-- ✅ Message Send Form -->
<form method="POST">
  <input type="number" name="receiver_id" placeholder="Enter Receiver User ID" required>
  <textarea name="message" placeholder="Write your message..." required></textarea>
  <button type="submit" name="send">Send Message</button>
</form>

<hr>
<h3>Conversation History</h3>

<?php
// ✅ Handle Message Sending
if(isset($_POST['send'])){
  $sender = $_SESSION['user_id'];
  $receiver = intval($_POST['receiver_id']);
  $msg = trim($_POST['message']);

  if($msg != ""){
    $insert = "INSERT INTO messages (sender_id, receiver_id, message, created_at)
               VALUES ('$sender', '$receiver', '$msg', NOW())";
    if($conn->query($insert)){
      echo "<script>alert('Message sent successfully!');window.location.href='messages.php?chat_with=$receiver';</script>";
    } else {
      echo "<script>alert('Error sending message!');</script>";
    }
  }
}

// ✅ Select conversation (optional filter)
$chat_with = isset($_GET['chat_with']) ? intval($_GET['chat_with']) : 0;

// ✅ Fetch messages where user is sender OR receiver
if($chat_with > 0){
  echo "<h4>Chat with User ID: $chat_with</h4>";
  $query = "SELECT * FROM messages 
            WHERE (sender_id='$uid' AND receiver_id='$chat_with') 
               OR (sender_id='$chat_with' AND receiver_id='$uid')
            ORDER BY id ASC";
} else {
  echo "<p style='color:gray;'>Select a user ID above to view chat.</p>";
  $query = "SELECT * FROM messages WHERE receiver_id='$uid' OR sender_id='$uid' ORDER BY id DESC LIMIT 10";
}

$result = $conn->query($query);

if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    $class = ($row['sender_id'] == $uid) ? "sent" : "received";
    echo "<div class='$class'>{$row['message']}<br><small>{$row['created_at']}</small></div>";
  }
} else {
  echo "<p>No messages found.</p>";
}
?>
</div>
</body>
</html>

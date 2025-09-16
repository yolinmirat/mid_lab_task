<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Logout</title>
</head>
<body>
  <h2>You have been logged out successfully.</h2>
  <a href="homepage.html">Go to Homepage</a> <br>
  <a href="homepage.html">Login Again</a>
</body>
</html>
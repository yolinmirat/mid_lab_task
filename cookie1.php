<?php
setcookie("cookie1", "This is Cookie 1", time() + 3600, "/");
echo "Cookie1 has been set successfully! <br>";
echo "<a href='homepage.html'>Back to Homepage</a>";
?>
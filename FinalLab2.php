<!DOCTYPE html>
<html>
<head>
  <title>PHP Form with File Upload Validation</title>
  <style>
    .error { color: red; }
  </style>
</head>
<body>

<?php
// Error variables
$nameErr = $emailErr = $websiteErr = $genderErr = $fileErr = "";
$name = $email = $website = $comment = $gender = "";

// Run when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and whitespace allowed";
    }
  }

  // Email
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  // Website (optional)
  if (!empty($_POST["website"])) {
    $website = $_POST["website"];
    if (!filter_var($website, FILTER_VALIDATE_URL)) {
      $websiteErr = "Invalid URL";
    }
  }

  // Comment
  if (!empty($_POST["comment"])) {
    $comment = $_POST["comment"];
  }

  // Gender
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }

  // File Upload Validation
  if (!empty($_FILES["file"]["name"])) {
    $target_dir = "uploads/";   // Make sure this folder exists
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $fileSize = $_FILES["file"]["size"];

    // Check file size (max 2MB)
    if ($fileSize > 2*1024*1024) {
      $fileErr = "File is too large. Max 2MB allowed.";
    }

    // Allow only specific file types
    if($fileType != "jpg" && $fileType != "png" && $fileType != "pdf") {
      $fileErr = "Only JPG, PNG & PDF files allowed.";
    }

    // If no errors → move file
    if ($fileErr == "") {
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // File uploaded successfully
      } else {
        $fileErr = "Error uploading your file.";
      }
    }
  } else {
    $fileErr = "Please upload a file.";
  }
}
?>

<h2>PHP Form with File Upload</h2>
<p><span class="error"> </span></p>

<form method="post" action="" enctype="multipart/form-data">
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr; ?></span>
  <br><br>

  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr; ?></span>
  <br><br>

  Website: <input type="text" name="website">
  <span class="error"><?php echo $websiteErr; ?></span>
  <br><br>

  Comment: <textarea name="comment"></textarea>
  <br><br>

  Gender:
  <input type="radio" name="gender" value="Male"> Male
  <input type="radio" name="gender" value="Female"> Female
  <input type="radio" name="gender" value="Other"> Other
  <span class="error">* <?php echo $genderErr; ?></span>
  <br><br>

  Upload File: <input type="file" name="file">
  <span class="error">* <?php echo $fileErr; ?></span>
  <br><br>

  <input type="submit" value="Submit">
</form>

</body>
</html>

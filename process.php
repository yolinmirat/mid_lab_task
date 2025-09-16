<?php
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $errors = [];

        if (empty($_POST["name"])) 
            {
                $errors[] = "Name is required";
            } 
        else 
            {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $name)) 
                    {
                        $errors[] = "Only letters and white space allowed in Name";
                    }
            }

    if (empty($_POST["email"])) 
        {
            $errors[] = "Email is required";
        } 
    else 
        {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                    $errors[] = "Invalid email format";
                }
        }

    if (!empty($_POST["website"])) 
        {
            $website = test_input($_POST["website"]);
            if (!filter_var($website, FILTER_VALIDATE_URL)) 
                {
                    $errors[] = "Invalid URL";
                }
        } 
    else 
        {
            $website = "";
        }

    $comment = !empty($_POST["comment"]) ? test_input($_POST["comment"]) : "";

    if (empty($_POST["gender"])) 
        {
            $errors[] = "Gender is required";
        } 
    else 
        {
            $gender = test_input($_POST["gender"]);
        }

    if (!empty($errors)) 
        {
            echo "<h3>Errors:</h3>";
            foreach ($errors as $err) 
                {
                    echo "<p style='color:red;'>$err</p>";
                }
        echo "<br><a href='index.html'>Go Back</a>";
        } 
    else 
        {
            echo "<h2>You submitted:</h2>";
            echo "Name: $name<br>";
            echo "Email: $email<br>";
            echo "Website: $website<br>";
            echo "Comment: $comment<br>";
            echo "Gender: $gender<br>";
        }
}
?>

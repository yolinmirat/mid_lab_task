<?php
require_once "User.php";
$user = new User();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) 
    {
        $name = trim($_POST["name"]);
        if (!empty($name)) 
            {
                $user->insertUser($name);
            }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) 
    {
        $id = intval($_POST["id"]);
        $name = trim($_POST["name"]);
        if (!empty($name)) 
            {
                $user->updateUser($id, $name);
            }
}

if (isset($_GET["delete"])) 
    {
        $id = intval($_GET["delete"]);
        $user->deleteUser($id);
    }

$users = $user->getAllUsers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <style>
        body 
        { 
            font-family: Arial, sans-serif; 
            margin: 40px; 
        }
        form 
        { 
            margin-bottom: 20px; 
        }
        input[type=text] 
        { 
            padding: 5px; 
            width: 200px; 
        }
        input[type=submit] 
        { 
            padding: 5px 15px; 
        }
        table 
        { 
            border-collapse: collapse; 
            width: 60%; 
            margin-top: 20px; 
        }
        table, th, td 
        { 
            border: 1px solid #333; 
            padding: 10px; 
            text-align: center; 
        }
        a 
        { 
            color: red; 
            text-decoration: none; 
        }
        h3
        {
            color: blue;
            font-weight: bolder;
        }

    </style>
</head>
<body>
    <h2>Form</h2>

    <?php if(!empty($message)): ?>
        <div class="msg success"><?= $message; ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="submit" name="submit" value="Save">
    </form><br><br>

    <h3>Users Information</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $users->fetch_assoc()): ?>
        <tr>
            <td><?= $row["id"]; ?></td>
            <td>
                <form method="post" action="" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                    <input type="text" name="name" value="<?= $row["name"]; ?>" required>
                    <input type="submit" name="update" value="Update">
                </form>
            </td>
            <td>
                <a href="?delete=<?= $row["id"]; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
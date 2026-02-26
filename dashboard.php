<?php
session_start();

if (!isset($_SESSION["name"]) || !isset($_SESSION["email"])) {
    header("Location: form.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-secondary-subtle">

<div class="container mt-5">
    <div class="card shadow p-4">

        <h2 class="text-center">Dashboard</h2>
        <hr>

        <p>
            Welcome:
            <strong><?php echo $_SESSION["name"]; ?></strong>
        </p>

        <p>
            Email:
            <strong><?php echo $_SESSION["email"]; ?></strong>
        </p>

        <p>
            Cookie Value:
            <strong>
                <?php
                if (isset($_COOKIE["username"])) {
                    echo $_COOKIE["username"];
                } else {
                    echo "No Cookie Found";
                }
                ?>
            </strong>
        </p>

        <div class="text-center">
            <a href="logout.php" class="btn btn-danger">
                Logout
            </a>
        </div>

    </div>
</div>

</body>
</html>
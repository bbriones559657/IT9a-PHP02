<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);

    if (empty($name) || empty($email)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;

        setcookie("username", $name, time() + 3600, "/");

        header("Location: dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow p-4" style="width:400px;">

        <h3 class="text-center mb-3">Login Form</h3>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Submit
            </button>

        </form>

        <?php if ($error != "") : ?>
            <div class="alert alert-danger mt-3">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

    </div>
</div>

</body>
</html>
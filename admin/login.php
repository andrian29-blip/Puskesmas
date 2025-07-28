<?php
session_start();
if (isset($_SESSION['login_admin'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(135deg, #2C3E50, #3498DB);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-card {
        background-color: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        width: 400px;
        animation: fadeIn 0.8s ease;
    }

    .login-card h4 {
        text-align: center;
        margin-bottom: 25px;
        font-weight: bold;
        color: #2C3E50;
    }

    .form-control {
        padding-left: 40px;
    }

    .input-group-text {
        background-color: #f4f4f4;
        border-right: none;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #3498DB;
    }

    button[type="submit"] {
        background: linear-gradient(90deg, #1ABC9C, #16A085);
        border: none;
        transition: 0.3s;
    }

    button[type="submit"]:hover {
        background: linear-gradient(90deg, #16A085, #1ABC9C);
        transform: scale(1.02);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</head>

<body>

    <div class="login-card">
        <h4><i class="fa-solid fa-user-shield me-2"></i>Login Admin</h4>
        <form action="ceklogin.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="username" class="form-control" required autofocus
                        placeholder="Masukkan Username">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" required
                        placeholder="Masukkan Password">
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100 mt-3"><i
                    class="fa-solid fa-right-to-bracket me-2"></i>Login</button>
        </form>
    </div>

</body>

</html>
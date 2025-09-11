<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: ../index.php"); // Jei vartotojas jau prisijungęs, jis bus nukreiptas į pagrindinį puslapį
    exit();
}
?>

<!DOCTYPE html>
<html lang="lt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prisijungimas / Registracija</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background: white;
      width: 350px;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .tabs {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .tab {
      cursor: pointer;
      width: 50%;
      text-align: center;
      padding: 10px;
      background: #e9e9e9;
      border-radius: 5px 5px 0 0;
      font-weight: bold;
    }

    .tab.active {
      background: #fff;
      border-bottom: 2px solid white;
    }

    .form {
      display: none;
    }

    .form.active {
      display: block;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-size: 14px;
    }

    input {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      width: 100%;
      padding: 10px;
      background: #007bff;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
      text-decoration: none;
    }

    .social-login {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 20px;
    }

    .social-btn {
      padding: 10px;
      border: none;
      border-radius: 5px;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

    .myg{
    background-color: lightblue;
    border-radius: 20%;
    border: solid black 1px;
    }
    a {
    color: white;
    }
    a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}
  </style>
</head>
<body>

<div class="container">
  <div class="tabs">
    <div class="tab active" id="loginTab">Prisijungti</div>
    <div class="tab" id="registerTab">Registruotis</div>
  </div>

  <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger text-center">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

  <!-- Login Form -->
  <form action="process_login.php" class="form active" id="loginForm" action="/login" method="POST">
        <div class="form-group">
            <label for="email" class="form-label">El. paštas:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Slaptažodis:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Prisijungti</button>
        <button><a href="../index.php" >Į pagrindinį</a></button>
    </form>

  <!-- Register Form -->


  <form action="process_register.php" class="form" id="registerForm" action="/register" method="POST">
  <div class="form-group">
            <label for="name" class="form-label">Vardas:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">El. paštas:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Slaptažodis:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Registruotis</button>
        <button><a href="../index.php" class="btn btn-success">Į pagrindinį</a></button>
    </form>
</div>


<script>
  const loginTab = document.getElementById('loginTab');
  const registerTab = document.getElementById('registerTab');
  const loginForm = document.getElementById('loginForm');
  const registerForm = document.getElementById('registerForm');

  loginTab.addEventListener('click', () => {
    loginTab.classList.add('active');
    registerTab.classList.remove('active');
    loginForm.classList.add('active');
    registerForm.classList.remove('active');
  });

  registerTab.addEventListener('click', () => {
    registerTab.classList.add('active');
    loginTab.classList.remove('active');
    registerForm.classList.add('active');
    loginForm.classList.remove('active');
  });
</script>

</body>
</html>

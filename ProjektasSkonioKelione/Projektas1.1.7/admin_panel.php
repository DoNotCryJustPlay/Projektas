<?php
session_start();
?>

<!DOCTYPE html>
<html lang="lt">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Siųsti receptą - Skonio kelionė</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/fontAwesome.css">
  <link rel="stylesheet" href="css/templatemo-style.css">
  <link rel="stylesheet" href="css/index.css">

  <style>
    .form-section {
      padding: 50px 0;
    }
    .alert-success {
      position: fixed;
      bottom: 30px;
      right: 30px;
      z-index: 1000;
      display: none;
    }
    #preview-container {
      text-align: center;
    }
    #preview {
      margin-top: 15px;
      max-width: 100%;
      height: auto;
      border: 1px solid #ddd;
      padding: 5px;
      border-radius: 5px;
      display: none;
    }
    #videoPreview {
      max-width: 100%;
      display: none;
      border: 1px solid #ddd;
      border-radius: 5px;
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="container">
      <a href="#" class="navbar-brand scroll-top">Skonio kelionė</a>
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="main-nav" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
             <li><a href="index.php" class="myg">Pagrindinis</a></li>
                        <li><a href="menu.php" class="myg">Receptai</a></li>
                        <li><a href="contact.php" class="myg">Apie mus</a></li>
                        <li><?php if (isset($_SESSION['user'])): ?>
                            <a href="prisijungimas/logout.php" class="myg">Atsijungti</a>
                <p>Sveiki, <?php echo $_SESSION['user']; ?>!</p>
                <li><a href="blog.php" class="myg">Atsiųsti receptą</a></li>
                        <?php else: ?>
                            <a href="prisijungimas/login.php" class="myg">Prisijungti</a>
                        <?php endif; ?></li>
                        <?php if (isset($_SESSION['user']) && $_SESSION['role'] === 'admin'): ?>
        <li><a href="admin_panel.php" class="myg">Admino panelė</a></li>
    <?php endif; ?>
                        
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <section class="form-section">
    <div class="container">

          <h2>Admino panelė</h2>
          <p>Kolkas nėra funkcionalumo</p>
    </div>
  </section>

</body>
</html>

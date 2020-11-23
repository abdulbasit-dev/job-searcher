<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-white m-2 radius-10 shadow-sm">
    <a class="navbar-brand" href="#"><img src="assets/img/logo.svg" width="40"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ml-3  <?php if ($page == "home") echo "active" ?>">
          <a class="nav-link btn btn-light" href="index.php">Home</a>
        </li>
        <li class="nav-item ml-3 <?php if ($page == "login") echo "active" ?>">
          <a class="nav-link btn btn-light" href="Login.php">Log In</a>
        </li>
        <li class="nav-item ml-3 <?php if ($page == "register") echo "active" ?>">
          <a class="nav-link btn btn-light" href="register.php">Register</a>
        </li>

        <?php if (isset($_SESSION["admin"]) || isset($_SESSION["user"])) : ?>
          <li class="nav-item ml-3">
            <a class="nav-link btn btn-light text-danger" href="?logout">Logout <img src=" assets/img/logout.svg" class="ml-1" width="25" alt=""></a>
          </li>
        <?php endif; ?>

      </ul>
      <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET" class="form-inline my-2 my-lg-0 justify-content-center">
        <input name="search" class="form-control form-control-lg mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary btn-lg my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
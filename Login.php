<?php
$page="login";
include 'includes/nav.php' ?>

<?php

if (isset($_POST["adminLogin"])) {
  $username = clear($_POST["username"]);
  $password = clear($_POST["password"]);

  $hashPassword = hash("gost", $password);
  // 1 = b0f784fe99f37c57188d100f79bffa0e877f38c8ad50baf7e474b7596a02b5bf

  if (empty($username) || empty($password)) {
    header("Location:login.php");
  } else {
    $query = mysqli_query($db, "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$hashPassword'");
    if (mysqli_num_rows($query)) {
      while ($row = mysqli_fetch_assoc($query)) {
        session_start();
        $_SESSION["admin"] = $row["id"];
        $_SESSION["username"] = $row["username"];
       
      }
      header("Location:index.php");
    } else {
      header("Location:login.php");
    }
  }
}

?>


<div class="container mt-4 bg-light p-4 pt-0">
  <div class="row justify-content-center mb-3">
    <img type="button" src="assets/img/user.svg" width="200" title="User Login" class="m-3 user_btn" alt=" user">
    <img type="button" src="assets/img/admin.svg" width="200" title="Admin Login" class="m-3 admin_btn" alt="admin">
  </div>

  <div class="row justify-content-center">
    <?php
    $i = 0;
    while ($i <= 1) : ?>
      <div class="<?php $class = $i === 0 ? "user d-none" :  "admin";
                  echo $class; ?> col-lg-6 mb-sm-4 mb-md-0">
        <form class="bg-white p-5   shadow-sm radius-10" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
          <h4 class="text-muted mb-3"><?php $title = $i === 0 ? "User Login" :  "Admin Login";
                                      echo $title; ?> </h4>
          <div class="form-group">
            <label for="username">UserName</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <button type="submit" name="<?php if ($i === 0) echo "userLogin";
                                      else echo "adminLogin" ?>" class="btn <?php if ($i === 0) echo "user_login";
                                                                            else echo "admin_login"; ?> btn-block radius-10">Login</button>
        </form>
      </div>
    <?php $i++;
    endwhile; ?>
  </div>
</div>

<?php include 'includes/bottom.php' ?>
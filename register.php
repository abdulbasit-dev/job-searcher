<?php
$page = "register";
include 'includes/nav.php';
include 'includes/search.php';
?>

<?php

if (isset($_POST["signup"])) {
  $name = $_POST["name"];
  $age = $_POST["age"];
  $job_id = $_POST["job_id"];
  $file = $_FILES["file"];
  $fileName = $file["name"];
  $fileTmpName = $file["tmp_name"];
  $fileType = $file["type"];
  $fileError = $file["error"];
  $fileSize = $file["size"];


  $error = ["result" => ""];
  if (empty($name) && empty($age) && empty($job) && empty($username) && empty($password)) {
    $error["result"] = "تکایە هەموو خانەکان پر بکەوە";
  } else {
    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower($fileExt[1]);
    $NewFileName = $fileExt[0] . "." . $fileActualExt;
    move_uploaded_file($fileTmpName, "upload/$NewFileName");
    $query = mysqli_query($db, "INSERT INTO `person` (`name`,`age`,`job_id`,`job_state`,`cv_file`) VALUES ('$name','$age','$job_id',2,'$NewFileName')");
    if ($query)
      header("Location:index.php?success");
  }
}

$query = mysqli_query($db, "SELECT * FROM `job`");


?>



<div class="container mt-4 bg-light p-4 pt-0">
  <div class="row justify-content-center">
    <div class="col-lg-6 mb-sm-4 mb-md-0">
      <form class="bg-white p-5   shadow-sm radius-10" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
        <small class="text-danger mb-3"><?php if (isset($_POST["signup"])) {
                                          echo $error["result"];
                                        } ?></small>
        <h4 class="text-muted mb-3">Register YourSelf</h4>
        <div class="form-group">
          <label for="username">Name</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
          <label for="age">Age</label>
          <input type="text" class="form-control" id="age" name="age">
        </div>
        <div class="form-group">
          <label for="job">Choose Your Job</label>
          <select class="form-control" name="job_id" id="">
            <?php while ($row = mysqli_fetch_assoc($query)) : ?>
              <option value="<?php echo $row["job_id"] ?>"><?php echo $row["job"] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="age">Choose your cv</label>
          <input type="file" class="form-control" name="file">
        </div>
        <button type="submit" name="signup" class="btn btn-primary btn-block radius-10">Register</button>
      </form>
    </div>
  </div>
</div>

<?php include 'includes/bottom.php' ?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'cv');
session_start();

if (isset($_SESSION["admin"])) {
  $admin = $_SESSION["admin"];
}

if (isset($_SESSION["user"])) {
  $user = $_SESSION["user"];
}

if (isset($_GET["logout"])) {
  session_unset();
  session_destroy();
  unset($admin);
  unset($user);
  header("Location:index.php");
}


if (isset($_GET["like"]) && isset($admin)) {
  mysqli_query($db, "UPDATE `need` SET `num_need` = `num_need`-1");
  updateJobState("like", "1");
}

if (isset($_GET["unlike"]) && isset($admin)) {
  updateJobState("unlike", "0");
}

function updateJobState($acceptState, $isAccept)
{
  global $db;
  $id = $_GET["$acceptState"];
  $query = mysqli_query($db, "UPDATE `person` SET `job_state` = '$isAccept' WHERE `id` = '$id'");
  if ($query) {
    header("Location:index.php");
  }
}


//clear data
function clear($data)
{
  global $db;
  $data = mysqli_real_escape_string($db, htmlspecialchars($data));
  return $data;
}

//delete item
if (isset($_GET['d']) && isset($admin)) {
  $id = clear($_GET['d']);
  mysqli_query($db, "DELETE FROM `person` WHERE `id` = '$id'");
  header("Location:index.php");
}

//update 
if (isset($_POST["update"]) && isset($admin)) {
  $name = $_POST["name"];
  $age = $_POST["age"];
  $id = $_POST["id"];
  $jobState = $_POST["job_state"];
  if($jobState>=1){
    $jobState = "1";
  }
  $query = mysqli_query($db, "UPDATE `person` SET `name`='$name',`age`='$age',`job_state`='$jobState' WHERE `id` = '$id'");
  if ($query) {
    header("Loaction:index.php");
  }
}

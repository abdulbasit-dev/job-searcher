<?php
$page = "home";
include 'includes/nav.php';
include 'includes/search.php';
?>

<?php

function getTableData($tableName, $colName)
{
  global $db;
  $query = mysqli_query($db, "SELECT * FROM `$tableName`");
  if ($query) {
    while ($row = mysqli_fetch_assoc($query)) {
      echo $row["$colName"];
    }
  }
}

function getJobState($condition)
{
  global $db;
  $query = mysqli_query($db, "SELECT * FROM `person` WHERE `job_state` = '$condition'");
  if ($query) {
    echo mysqli_num_rows($query);
  }
}



?>


<div class="container bg-light radius-10 shadow-sm p-3">
  <div class="d-flex">
    <div class="btn-group  btn-group-sm" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-secondary d-flex align-items-center">
        <i class="fas fa-thumbs-up fa-2x text-success"></i>
        <span class="ml-2">Accept</span>
      </button>
      <button type="button" class="btn btn-secondary d-flex align-items-center">
        <i class="fas fa-thumbs-down fa-2x text-danger"></i>
        <span class="ml-2">Reject</span>
      </button>
      <button type="button" class="btn btn-secondary d-flex align-items-center">
        <i class="fas fa-paper-plane fa-2x text-primary"></i>
        <span class="ml-2">Waiting</span>
      </button>
    </div>
    <div>
      <div class="btn-group  ml-4 btn-group-sm" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary d-flex align-items-center">
          <i class="fas fa-user-friends text-waring fa-2x text-warning"></i>
          <span class="ml-2"><?php getTableData("need", "num_need");
                              ?> person needed</span>
        </button>
      </div>

      <div class="btn-group  btn-group-sm" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary ml-2 d-flex align-items-center">
          <i class="fas fa-thumbs-up fa-2x text-success"></i>
          <span class="ml-2">
            <?php getJobState(1) ?></span>
        </button>
        <button type="button" class="btn btn-secondary d-flex align-items-center">
          <i class="fas fa-thumbs-down fa-2x text-danger"></i>
          <span class="ml-2"><?php getJobState(0) ?></span>
        </button>
        <button type="button" class="btn btn-secondary d-flex align-items-center">
          <i class="fas fa-paper-plane fa-2x text-primary"></i>
          <span class="ml-2"><?php getJobState(2) ?></span>
        </button>
      </div>
    </div>
  </div>


  <div class="row m-3 justify-content-center">
    <?php
    $query = mysqli_query($db, "SELECT * FROM `person` JOIN `job` ON person.job_id = job.job_id ORDER BY `id` DESC");
    while ($row = mysqli_fetch_assoc($query)) { ?>
      <?php include "includes/card.php" ?>
    <?php } ?>
  </div>
</div>

<?php include 'includes/bottom.php' ?>
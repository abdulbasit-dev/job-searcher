<!-- Modal -->
<div class="modal fade" id="modal_<?php echo $row["id"] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Profile <span class="text-muted"><?php echo $row["name"] ?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
          <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo clear($row["name"]) ?>" aria-describedby="name">
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="text" class="form-control" id="age" name="age" value="<?php echo clear($row["age"]) ?>" aria-describedby="age">
          </div>
          <?php if (isset($admin)) : ?>
            <div class="form-group">
              <label for="job">Job State (1 for accept , 0 for Reject )</label>
              <input type="text" class="form-control" id="job" name="job_state" value="<?php echo clear($row["job_state"]) ?>" aria-describedby="job">
            </div>
          <?php endif; ?>
          <button type="submit" name="update" class="btn btn-outline-success btn-block">Update</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="card m-2 border-0 p-3 radius-10 shadow-sm" style="width: 18rem;">
  <img src="assets/img/<?php echo clear($row['photo']); ?>" class="w-50 m-auto">
  <div class="card-body text-center">
    <h5 class="card-title">Name : <?php echo clear($row['name']); ?></h5>
    <p class="card-text">Age : <?php echo clear($row['age']); ?></p>
    <p class="card-text">Job : <?php echo clear($row['job']); ?></p>
    <p class="card-text">Job State : <?php if ($row['job_state'] == 0) {
                                        echo "<span class='text-danger font-weight-bold'>Reject</span> ";
                                      } else if ($row['job_state'] == 1) {
                                        echo "<span class='text-success font-weight-bold'>Accpet</span> ";
                                      } else
                                        echo "<span class='text-muted font-weight-bold'>Waiting</span> ";
                                      ?></p>
    <?php if (isset($admin)) : ?>
      <a href="upload/<?php echo $row['cv_file'] ?>">View CV</a>
    <?php endif; ?>
  </div>
  <?php if (isset($admin)) : ?>
    <a href="?d=<?php echo clear($row['id']); ?>"><img src="assets/img/remove.svg" title="delete" class="delete_btn atcion_btn" alt="delete icon"></a>
    <span><img src="assets/img/pencil.svg" width="40" class="edit_btn atcion_btn" title="edit" data-toggle="modal" data-target="#modal_<?php echo $row["id"] ?>" alt="edit icon"></span>

    <?php if ($row["job_state"] === "2") : ?>
      <div class="d-flex justify-content-center align-items-center ">
        <a href="?like=<?php echo $row["id"] ?>">
          <button type="button" class="btn btn-secondary ml-2 " title="Aceept">
            <i class="fas fa-thumbs-up text-success"></i>
          </button>
        </a>
        <a href="?unlike=<?php echo $row["id"] ?>">
          <button type="button" class="btn btn-secondary ml-2" title="Reject">
            <i class="fas fa-thumbs-down text-danger"></i>
          </button>
        </a>
      </div>
    <?php endif ?>
  <?php endif; ?>


</div>
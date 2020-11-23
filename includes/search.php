<?php


if(isset($_GET["search"])){
  $searchData = clear($_GET["search"]);
  $query = mysqli_query($db,"SELECT * FROM `person` WHERE `name` LIKE '%$searchData%' OR `age` = '$searchData'");
  ?>
  <div class="container bg-light radius-10 shadow-sm p-3">
  <div class="row m-3 justify-content-center">
    <?php if(mysqli_num_rows($query)>0){ 
      while($row=mysqli_fetch_assoc($query)):?>
        <?php include "includes/card.php"?>;
      <?php endwhile;?>
    <?php }else{?>

      <div class="card m-2 border-0 p-3 radius-10 shadow-sm" style="width: 28rem;">
      <img src="assets/img/not-found.svg" class="w-100 m-auto img-fluid">
        <div class="card-body text-center">
        <h5>:( ببوورە هیچ نەدۆزراوەیە </h5>
        </div>
      </div>
    <?php }?>
  </div>
  </div>
  <?php 
  exit();
   
}



?>
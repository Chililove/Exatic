   <div>
       <img height="490" class="style404" src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents("assets/404.png")); ?>">
   </div>
   <?php
    include($rootPath . "View/_partials/footer.php");
    ?>

   <style>
       .style404 {
           display: block;
           margin-left: auto;
           margin-right: auto;
       }
   </style>
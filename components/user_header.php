<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

      <section class="flex">

      <a class="navbar-brand" href="home.php"><i class='fa fa-paw'style='font-size:4rem;'></i> <b>P4Pet</b></a>
      
            <nav class="navbar">
               <a href="home.php">Home</a>
        
               <a href="courses.php">Contents</a>
       
               <a href="teachers.php"><span>Vets</span></a>

               <a href="food.php"><span>Foods</span></a>

               <a href="review.php"><span>Reviews</span></a>

               <a href="adoption.php"><span>Adoption</span></a>
               <a href="quiz.php"><span>Quiz</span></a>

               <!--<a href=""><span>Fun Quiz</span></a>-->
            </nav>
        

      <div class="icons" >
       
         <div id="user-btn" class="fas fa-user" style =' color:white; background-color: #5d351a;;'></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span>user</span>
         <a href="profile.php" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
         <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         <?php
            }else{
         ?>
         <h3>please login or register</h3>
          <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
         <?php
            }
         ?>
      </div>
</section>

</header>




<!-- header section ends -->



<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Vets</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- teachers section starts  -->

<section class="teachers">

   <h1 class="heading">Available Vets</h1>

   <form action="search_tutor.php" method="post" class="search-tutor">
      <input type="text" name="search_tutor" maxlength="100" placeholder="search vet..." required>
      <button type="submit" name="search_tutor_btn" class="fas fa-search"></button>
   </form>

   <div class="box-container">

      <div class="box offer">
         <h3>become a member</h3>
         <p>Join as an active vet memeber of our family !</p>
         <a href="admin/register.php" target="_blank" class="inline-btn">Get Started</a>
      </div>

      <?php
         $select_tutors = $conn->prepare("SELECT * FROM `tutors`");
         $select_tutors->execute();
         if($select_tutors->rowCount() > 0){
            while($fetch_tutor = $select_tutors->fetch(PDO::FETCH_ASSOC)){

               $tutor_id = $fetch_tutor['id'];

               $count_playlists = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
               $count_playlists->execute([$tutor_id]);
               $total_playlists = $count_playlists->rowCount();

               $count_contents = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ?");
               $count_contents->execute([$tutor_id]);
               $total_contents = $count_contents->rowCount();

               $count_likes = $conn->prepare("SELECT * FROM `likes` WHERE tutor_id = ?");
               $count_likes->execute([$tutor_id]);
               $total_likes = $count_likes->rowCount();

               $count_comments = $conn->prepare("SELECT * FROM `comments` WHERE tutor_id = ?");
               $count_comments->execute([$tutor_id]);
               $total_comments = $count_comments->rowCount();
      ?>
      <div class="box">
         <div class="tutor">
            <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
            <div>
               <h3><?= $fetch_tutor['name']; ?></h3>
               <span><?= $fetch_tutor['profession']; ?></span>
            </div>
         </div>
         <p>playlists : <span><?= $total_playlists; ?></span></p>
         <p>total videos : <span><?= $total_contents ?></span></p>
         <p>total likes : <span><?= $total_likes ?></span></p>
         <p>total comments : <span><?= $total_comments ?></span></p>
         <form action="tutor_profile.php" method="post">
            <input type="hidden" name="tutor_email" value="<?= $fetch_tutor['email']; ?>">
            <input type="submit" value="view profile" name="tutor_fetch" class="inline-btn">
         </form>
      </div>

      <?php
            }
         }else{
            echo '<p class="empty">no vets found!</p>';
         }
      ?>

   </div>

<br><br><br><br>
<div class="map">
   <h3 class="white-text-with-blue-shadow"> Vets Near You! </h3>
   <p><iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d29075.27607732818!2d88.60862998751381!3d24.36705371654046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1svetinary%20clinic%20near%20me!5e0!3m2!1sen!2sbd!4v1689514826016!5m2!1sen!2sbd" width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>

</div>

</section>

<!-- teachers section ends -->





























<?php include 'Chat.php'; ?>
    

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>
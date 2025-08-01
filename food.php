<?php

include 'components/connect.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

   <!-- custom css file link  -->

   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="courses">

   <h1 class="heading">Food category</h1>

   <div class="box-container">


      <div class="box">
         <img src="images/food_cat_5.png" class="thumb" alt="">
         <h3 class="title">Cat Section</h3>
         <a href="#cat" class="inline-btn">View Menu</a>
      </div>

      <div class="box">
         <img src="images/dog_food_2.png" class="thumb" alt="">
         <h3 class="title">Dog Section</h3>
         <a href="#dog" class="inline-btn">View Menu</a>
      </div>

      <div class="box">
         <img src="images/food_bird_2.png" class="thumb" alt="">
         <h3 class="title">Bird Section</h3>
         <a href="#bird" class="inline-btn">View Menu</a>
      </div>

   </div>

</section>

<?php include 'components/foods.php'; ?>


<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<!--<script src="js/script.js"></script>-->


</body>
</html>
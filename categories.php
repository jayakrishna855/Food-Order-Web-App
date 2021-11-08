<?php include("partials-front/menu.php");
?>
<!-- Navbar Section Ends Here -->



<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        <?php
        $sql="SELECT * FROM tbl_category WHERE active='Yes'";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count>=1){
            while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $title=$row['title'];
                $image_name=$row['image_name'];
                ?>
        <?php
                
                if(empty($image_name)){
                    echo "<div class='error'>Image Not Added</div>";
                }
                else{
                    ?>

        <a href="<?PHP ECHO SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
            <div class="box-3 float-container">
                <img src="<?php echo SITEURL;?>images/<?php echo $image_name;?> " alt="Pizza"
                    class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php echo $title;?></h3>
            </div>
        </a>
        <?php }?>
        <?php
            }
        }
        
        else{
            echo "<div class='error'>Category Not Added</div>";
            }
            ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        $sql2="SELECT * FROM tbl_food WHERE active='Yes' ";
        $res2=mysqli_query($conn,$sql2);

        $count2=mysqli_num_rows($res2);
        if($count2>0){
            while($row=mysqli_fetch_assoc($res2)){
                $id=$row['id'];
                $title=$row['title'];
                $price=$row['price'];
                $description=$row['details'];
                $image_name=$row['image_name'];
                ?>
        <div class="food-menu-box">

            <?php 
           if(empty($image_name)){

               echo "<div class='error'>Image Not Available</div>";

           }
           else{
               
               ?>
            <div class="food-menu-img">
                <img src="<?php echo SITEURL; ?>images/<?php echo $image_name;?>" alt="Chicke Hawain Pizza"
                    class="img-responsive img-curve">
            </div>









            <div class="food-menu-desc">
                <h4><?php echo $title; ?></h4>
                <p class="food-price"><?php echo $price; ?></p>
                <p class="food-detail">
                    <?php echo $description; ?>
                </p>
                <br>

                <a href="<?php SITEURL?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
            </div>
        </div>
        <?php

            

            }
        }
    }
        else{

            echo "<div class='error'>No Foods Available</div>";
        }
        
        
        ?>













        <div class="clearfix"></div>



    </div>

</section>
<!-- Categories Section Ends Here -->


<!-- social Section Starts Here -->

<!-- social Section Ends Here -->

<!-- footer Section Starts Here -->

<?php include('partials-front/footer.php');?>
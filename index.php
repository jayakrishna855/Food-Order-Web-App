<?php include("partials-front/menu.php");
?>
<!-- fOOD Menu Section Ends Here -->

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?php SITEURL;?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<?php
if(isset($_SESSION['order'])){
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}


?>

<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        <?php
        $sql="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes'";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count>=1){
            while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $title=$row['title'];
                $image_name=$row['image_name'];
                ?>

        <a href="<?PHP ECHO SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
            <div class="box-3 float-container">
                <?php
                
                if(empty($image_name)){
                    echo "<div class='error'>Image Not Added</div>";
                }
                else{
                    ?>
                <img src="<?php echo SITEURL;?>images/<?php echo $image_name?>" class="img-responsive img-curve">
                <?php
                

                }
                 ?>
                <h3 class="float-text text-white">
                    <?php echo $title;?>
                </h3>

            </div>
        </a>
        <?php


        }


        }
        else{
        echo "<div class='error'>Category Not Added</div>";
        }
        ?>
    </div>
    <!-- social Section Ends Here -->
</section>

<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php 
        $sql2="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' ";
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

<?php include('partials-front/footer.php');
?>
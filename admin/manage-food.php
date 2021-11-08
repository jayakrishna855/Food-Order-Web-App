<?php include("partials/menu.php") ?>

<div class="main_content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <?php
        if(isset($_SESSION['add-food'])){
                    
            echo $_SESSION['add-food'];
            unset($_SESSION['add-food']);
        }

        ?>
        <br>
        <br>
        <a href="add-food.php" class="btn-primary">Add Food</a>
        <br>
        <br>



        <table class="tbl-full">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>

            </tr>
            <?php 
            $sql ="SELECT * FROM tbl_food";
            $res=mysqli_query($conn,$sql);
            if($res==TRUE){
                $rows=mysqli_num_rows($res);
                if($rows>0){
                    while($rows=mysqli_fetch_assoc($res)){
                        $id=$rows['id'];
                        $title=$rows['title'];
                        $description=$rows['details'];
                        $feature=$rows['featured'];
                        $active=$rows['active'];
                        $price=$rows['price'];
                        $category=$rows['category_id'];
                        $image_name=$rows['image_name'];
                        ?>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $title;?></td>
                <td><?php echo $description;?></td>
                <td><?php echo $feature;?></td>
                <td><?php echo $active;?></td>
                <td><?php echo $price;?></td>
                <td><?php echo $category;?></td>
                <td><img src=<?php echo SITEURL.'images/'. $image_name?> width="40"></td>
                <td>
                    <a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id;?>"
                        class="btn-secondary">Update Food</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id;?>" class="btn-danger">Delete
                        Food</a>

                </td>

            </tr>
            <?php
                    
        }
                }
            


            else{
                ?>


            <tr>
                <td colspan="6">
                    <div class="error">No Food Added.</div>
                </td>
            </tr>
            <?php
            

            }
        }
        ?>






        </table>


    </div>
</div>



<?php 
include("partials/footer.php")

?>
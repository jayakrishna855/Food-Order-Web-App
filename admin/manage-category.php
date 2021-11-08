<?php include("partials/menu.php");?>
<div class="main_content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <?php 
        if(isset($_SESSION['add-cat'])){
            echo $_SESSION['add-cat'];
            unset($_SESSION['add-cat']);
        }
        
        if(isset($_SESSION["delete"])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if(isset($_SESSION['failed-remove'])){
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }
        
        
       
        
        ?>
        <br> <br>
        <a href="add-category.php" class="btn-primary">Add Category</a>
        <br> <br>
        <table class="tbl-full">
            <tr>
                <th>Id</th>
                <th>Description</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>

            </tr>
            <?php

              $sql="SELECT * FROM tbl_category";

              $res=mysqli_query($conn,$sql);

              $count=mysqli_num_rows($res);

              if($count>0)
              {
                
                  while($rows=mysqli_fetch_assoc($res))
                  {
                      $id=$rows['id'];
                      $title=$rows['title'];
                      $image_name=$rows['image_name'];
                      $feature=$rows['featured'];
                      $active=$rows['active'];
                      ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $title; ?></td>
                <td><img src=<?php echo SITEURL.'images/'. $image_name?> width="40"></td>

                <td><?php echo $feature; ?></td>
                <td><?php echo $active; ?></td>
                <td>
                    <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id;?>"
                        class="btn-secondary">Update Category</a>
                    <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>"
                        class="btn-danger">Delete Category</a>
                </td>


            </tr>
            <?php

            }

            }
           
            else
            {
            

                
              ?>

            <tr>
                <td colspan="6">
                    <div class="error">No Category Added.</div>
                </td>
            </tr>
            <?php
            
            



            }
            ?>





        </table>


    </div>
</div>

<?php include("partials/footer.php");?>
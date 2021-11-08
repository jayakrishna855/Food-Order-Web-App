<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">Update Category
        <br>
        <?php
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION);
        }
        
        ?>

        <br>
        <?php 
        $id=$_GET['id'];
        $sql ="SELECT * FROM tbl_category WHERE id=$id";
        $res=mysqli_query($conn,$sql);

        if($res==true){
            $count=mysqli_num_rows($res);
            if($count==1){
                $row=mysqli_fetch_assoc($res);
                $title=$row['title'];
                $current_image=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];

            }
            else{
                header('location:'.SITEURL.'admin/manage-category.php');
            }

        }
            
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>
                        Title:
                    </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                        Current Image:
                    </td>
                    <?php
                    if(empty($current_image)){
                        echo "<div class='error'>Image Not Available</div>";
                        
                    }
                    else{
                        ?>
                    <td>
                        <img width="70px" src="<?php ECHO SITEURL; ?>images/<?php echo $current_image;?>">
                    </td>
                    <?php

                    }
                    
                    
                    
                    ?>


                </tr>
                <tr>
                    <td>
                        Select Image:
                    </td>
                    <td>
                        <input type="file" name="img">
                    </td>

                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=='Yes') echo "checked";?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if($featured=='No') echo "checked";?> type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=='Yes') echo "checked";?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=='No') echo "checked";?> type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name='current_image' value="<?php echo $current_image;?>">
                        <input type="hidden" name='id' value="<?php echo $id;?>">

                        <input type="submit" name="submit" value="Upadate Category" class="btn-secondary">
                    </td>
                </tr>
            </table>


        </form>
    </div>
</div>
<?php 

   if(isset($_POST['submit'])){
       $id=$_POST['id'];
      
       $title=$_POST['title'];
       $active=$_POST['active'];
       $featured=$_POST['featured'];
       $current_image=$_POST['current_image'];

       if(isset($_FILES['img']['name'])){
           $image_name=$_FILES['image']['name'];
           if($image_name!=""){
            
            $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../images".$image_name;

            $upload=move_uploaded_file($source_path,$destination_path);
            if($upload==false){
                $_SESSION['upload']="<div class='error'>Failed to Upload Image</div>";
                header('loaction'.SITEURL.'admin/manage-category.php');
                die();
            }
            if($current_image!=""){
                $remove_path="../images".$current_image;
                $remove=unlink($remove_path);

                if($remove==false){
                    $_SESSION['failed-remove']="<div class='error'>Failed to remove current Image</div>";
                    header('location'.SITEURL.'admin/manage-category.php');
                    die();


                }
            }

            }
           

           }
           else{
               $image_name=$current_image;
           }

       
      
       $sql2="UPDATE tbl_admin SET
       title='$title',
       featured='$featured',
       active='$active',
       image_name='$image_name'
       WHERE id='$id'";
       
       $res2=mysqli_query($conn,$sql2);

       if($res2==true){
           $_SESSION['update']="<div class='success'>Category Updated Successfully.</div>";
           header('location:'.SITEURL.'admin/manage-category.php');
          
       }
       else{
        $_SESSION['update']="<div class='error'>Category Updation Failed.</div>";
        header('location:'.SITEURL.'admin/update-category.php');
       }
    }


   
?>
<?php include('partials/footer.php');
?>
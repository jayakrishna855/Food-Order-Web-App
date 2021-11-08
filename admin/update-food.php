<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">Update Food
        <br> <br>
        <?php 
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql ="SELECT * FROM tbl_food WHERE id=$id";
        
        $res=mysqli_query($conn,$sql);

        if($res==true){
            $count=mysqli_num_rows($res);
            if($count==1){
                $row=mysqli_fetch_assoc($res);
                $title=$row['title'];
                $description=$row['details'];
                $price=$row['price'];
                $category=$row['category_id'];
                $image_name=$row['image_name'];
                
                $featured=$row['featured'];
                $active=$row['active'];
                
                

            }
            else{
                header('location:'.SITEURL.'admin/manage-food.php');
            }

        

        }
    }
    else{
        header('location:'.SITEURL.'admin/manage-food.php');
        
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
                        Description:
                    </td>
                    <td>
                        <textarea cols="30" rows="5" name="description"><?php echo $description; ?></textarea>
                    </td>

                </tr>
                <tr>
                    <td>
                        Price:
                    </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                        CategoryId:
                    </td>
                    <td>
                        <select name="category">
                            <?php 
                            $sql2="SELECT * FROM tbl_category WHERE active='Yes'";
                            $res2=mysqli_query($conn,$sql2);
                            $count=mysqli_num_rows($res2);
                            if($count>0){

                                while($row=mysqli_fetch_assoc($res2)){
                                    $category_title=$row['title'];
                                    $category_id=$row['id'];
                                    ?>
                            <option <?php if($category==$category_id) echo "selected";?>
                                value="<?php echo $category_id;?>">
                                <?php echo $category_title;?>
                            </option>
                            <?php


                            }


                            }
                            else{
                            echo "<option value='0'>Category Not available</option>";
                            }

                            ?>



                        </select>
                    </td>

                </tr>
                <tr>
                    <td>
                        Current Image:
                    </td>
                    <td>
                        <?php
                        if(empty($image_name)){

                            echo "<div class='error'>Image Not Available</div>";

                        }
                        else{
                            ?>
                        <img width="70px" src="<?php echo SITEURL?>images/<?php echo $image_name;?> ">
                        <?php

                        }

                        ?>

                    </td>

                </tr>
                <tr>
                    <td>
                        Select New Image:
                    </td>
                    <td>
                        <input type="file" name="image_name">
                    </td>

                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="Yes") echo "checked"; ?> type="radio" name="featured">Yes
                        <input <?php if($featured=="No") echo "checked"; ?> type="radio" name="featured">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=="Yes") echo "checked"; ?> type="radio" name="active">Yes
                        <input <?php if($active=="No") echo "checked"; ?> type="radio" name="active">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <!--<input type="hidden" name="id" value=""> -->
                        <input type="submit" name="submit" value="Upadate Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>


        </form>
    </div>
</div>

<?php 
   /*
   if(isset($_POST['submit'])){
       $id=$_POST['id'];
      
       $full_name=$_POST['full_name'];
       $username=$_POST['username'];
       $sql="UPDATE tbl_admin SET
       Full_Name='$full_name',
       username='$username',
       WHERE id='$id'
       ";
       
       $res=mysqli_query($conn,$sql);

       if($res==true){
           $_SESSION['update']="<div class='success'>Admin Updated Successfully.</div>";
           header('location:'.SITEURL.'admin/manage-admin.php');
          
       }
       else{
        $_SESSION['update']="<div class='error'>Admin Updation Failed.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
       }


   }
   */

?>
<?php include('partials/footer.php');
?>
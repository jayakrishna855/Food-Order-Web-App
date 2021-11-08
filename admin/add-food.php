<?php 
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br>
        <?php 
                
                if(isset($_SESSION['add-food'])){
                    
                    echo $_SESSION['add-food'];
                    unset($_SESSION['add-food']);
                }
                ?>


        <?php 
                
                if(isset($_SESSION['price'])){
                    
                    echo $_SESSION['price'];
                    unset($_SESSION['price']);
                }
                ?>
        <?php
                if(isset($_SESSION['cat'])){
                    
                    echo $_SESSION['cat'];
                    unset($_SESSION['cat']);
                }

                ?>

        <form method="POST" action="" enctype='multipart/form-data'>

            <table class='tbl-30'>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Enter the title"></td>



                </tr>

                <tr>
                    <td>Description</td>
                    <td><textarea name="description" placeholder="Enter the description"></textarea></td>




                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" placeholder="Enter the price"></td>




                </tr>
                <tr>
                    <td>Category</td>
                    <td><input type="number" name="cat_id" placeholder="Enter the Category Id"></td>




                </tr>
                <tr>
                    <td>Select Image</td>
                    <td><input type="file" name="img"></td>




                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>

                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>

                </tr>

            </table>
        </form>
    </div>
</div>

<?php 
if(isset($_POST['submit'])){
    
     
         $title=$_POST['title'];
         $description=$_POST['description'];
         
         if(!empty($_POST['price']))
         {
            
           
             $price=$_POST['price'];

         }
         else{
             $_SESSION['price']="<div class='error'>Enter the price</div>";
             header('location:'.SITEURL.'admin/add-food.php');

         }
         if(!empty($_POST['cat_id']))
         {
            
            
             $category=$_POST['cat_id'];

         }
         else{
             $_SESSION['cat']="<div class='error'>Enter the Category Id</div>";
             header('location:'.SITEURL.'admin/add-food.php');

         }
            if(isset($_POST['featured'])){
                $feature=$_POST['featured'];

            }
            else{
                $feature="No";
            }
            if(isset($_POST['active'])){
                $active=$_POST['active'];

            }
            else{
                $active="No";
            }
           
            if(isset($_FILES['img']['name'])){
               $image_name=$_FILES['img']['name'];
               //$ext=end(explode('.',$image_name));
               //$image_name="Food_Category_".date("Y/m/d").'.'.$ext;
               $source_path=$_FILES['img']['tmp_name'];
               $destination_path="../images/".$image_name;
               //echo("<script>console.log('PHP: " . $destination_path . "');</script>");
               $upload=move_uploaded_file($source_path,$destination_path);
            }
            if(isset($upload)==false){
                $_SESSION['upload']="<div class='error'>Failed to Upload Image<div>";
                header('loaction:'.SITEURL.'admin/add-category.php');
                die();
            }
            
            $sql="INSERT INTO tbl_food SET 
             title='$title',
             details='$description',
             featured='$feature',
             image_name='$image_name',
             active='$active',
             price='$price',
             category_id='$category'
             ";
              
             $res=mysqli_query($conn,$sql)  or die(mysqli_error($conn));;
             if($res==true){
                 $_SESSION['add-food']="<div class='success'>Added Successfully</div";
                 header('location:'.SITEURL.'admin/manage-food.php');
             }
             else{
                
                $_SESSION['add-food']="<div class='error'>Failed in Adding Food</div";
                header('location:'.SITEURL.'admin/add-food.php');
             }
            
        }
        

?>

<?php 
include('partials/footer.php');
?>
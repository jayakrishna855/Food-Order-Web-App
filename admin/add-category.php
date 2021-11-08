<?php 
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br>
        <?php 
        if(isset($_SESSION['add-cat'])){
            echo $_SESSION['add-cat'];
            unset($_SESSION['add-cat']);

        }
        ?>
        <?php
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);

        }
        echo "<br>"
        ?>

        <form method="POST" action="" enctype='multipart/form-data'>
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Add Category">
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Upload Image:</td>
                    <td>
                        <input type="file" name="img">
                    </td>
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
                        <input type="submit" name="submit" value="Add Cat" class="btn-secondary">

                </tr>
            </table>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $title=$_POST['title'];
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
               if(empty($image_name)){
                   $image_name="";
               }
               else{
                $source_path=$_FILES['img']['tmp_name'];
                $destination_path="../images/".$image_name;
                //echo("<script>console.log('PHP: " . $destination_path . "');</script>");
                $upload=move_uploaded_file($source_path,$destination_path);

               }
              
            }
            if(isset($upload)==false){
                $_SESSION['upload']="<div class='error'>Failed to Upload Image<div>";
                header('loaction:'.SITEURL.'admin/add-category.php');
                die();
            }
            $sql="INSERT INTO tbl_category SET 
             title='$title',
             featured='$feature',
             image_name='$image_name',
             active='$active'
             ";
             $res=mysqli_query($conn,$sql)  or die(mysqli_error($conn));;
             if($res==true){
                 $_SESSION['add-cat']="<div class='success'>Added Successfully</div";
                 header('location:'.SITEURL.'admin/manage-category.php');
             }
             else{
                $_SESSION['add-cat']="<div class='error'>Failed in Adding Category</div";
                header('location:'.SITEURL.'admin/add-category.php');
             }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php');
?>
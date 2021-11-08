<?php include("../config/constants.php");
?>
<?php
 $id=$_GET['id'];
 
    $sql="DELETE  FROM tbl_food WHERE id=$id";
    $res=mysqli_query($conn,$sql);
    //$count=mysqli_num_rows($res);
    
    if($res==true){
        $_SESSION['delete']="<div class='success'>Deleted Sucessfully</div>";
        header('location:'.SITEURL.'admin/manage-food.php');

    }
    else{
        $_SESSION['delete']="<div class='error'>Failed to Delete try again later</div>";
        header('location:'.SITEURL.'admin/add-food.php');

    }
    

 
 

?>
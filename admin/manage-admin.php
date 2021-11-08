<?php include("partials/menu.php") ?>

<div class="main_content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <?php if(isset($_SESSION["add"])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
        <?php if(isset($_SESSION["delete"])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        ?>
        <?php if(isset($_SESSION["update"])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>

        <br>
        <br>
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br>
        <br>
        <table class="tbl-full spacing">
            <tr>
                <th>Id</th>
                <th>FullName</th>
                <th>UserName</th>
                <th>Actions</th>

            </tr>
            <?php
            $sql ="SELECT * FROM tbl_admin";
            $res=mysqli_query($conn,$sql);
            if($res==TRUE){
                $rows=mysqli_num_rows($res);
                if($rows>0){
                    while($rows=mysqli_fetch_assoc($res)){
                        $id=$rows['id'];
                        $full_name=$rows['Full_Name'];
                        $username=$rows['username'];
                        ?>
            <tr style="border-spacing:0px 10px">
                <td><?php echo $id;?></td>
                <td><?php echo $full_name;?></td>
                <td><?php echo $username;?></td>
                <td>
                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>"
                        class="btn-secondary">Update Admin</a>

                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete
                        Admin</a>

                </td>

            </tr>
            <?php
                    

           
                    }
                }
               
                else {}
            } 
            
            ?>




        </table>



    </div>
</div>



<?php 
include("partials/footer.php")

?>
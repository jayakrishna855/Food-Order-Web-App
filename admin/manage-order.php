<?php include("partials/menu.php") ?>

<div class="main_content">
    <div class="wrapper">
        <h1>Manage Order</h1>
        <br><br>
        <a href='add-order.php' class="btn-primary"> Add Order</a>
        <br>
        <br>



        <table class="tbl-full">
            <tr>
                <th>Id</th>
                <th>Food</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Order_date</th>
                <th>Status</th>
                <th>Customer_name</th>
                <th>Customer_contact</th>
                <th>Action</th>

            </tr>
        </table>


    </div>
</div>



<?php 
include("partials/footer.php")

?>
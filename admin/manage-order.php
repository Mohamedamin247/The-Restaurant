<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>

        <br /> <br /> <br />

        <?php 
        

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];       // Displaying the Session
            unset($_SESSION['update']);     // Removing the Session
        }
        
        
        ?>

        <br><br>

        <table class="tbl-full">
            <tr>
                <th>Serial Number</th>
                <th>Food</th>
                <th>Price</th>
                <th>Quantity.</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>

            </tr>

            <?php

            $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
            $res = mysqli_query($conn, $sql);
            $serialNum = 1;
            $count = mysqli_num_rows($res);
            if ($count > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $food = $row['food'];
                    $price = $row['price'];
                    $qty   = $row['quantity'];
                    $total = $row['total'];
                    $order_date = $row['order_date'];
                    $status = $row['status'];
                    $customer = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];

            ?>

                    <tr>
                        <td><?php echo $serialNum++ ?></td>
                        <td><?php echo $food ?></td>
                        <td><?php echo $price ?></td>
                        <td><?php echo $qty ?></td>
                        <td><?php echo $total ?></td>
                        <td><?php echo $order_date ?></td>
                        <td>
                            <?php 
                              
                              if($status == "Ordered"){
                                echo "<label>$status</label>";
                              }elseif($status == "On Delivery"){
                                echo "<label style='color: orange;'>$status</label>";
                              }elseif($status == "Delivered"){
                                echo "<label style='color: green;'>$status</label>";
                              }elseif($status == "Cancelled"){
                                echo "<label style='color: red;'>$status</label>";
                              }
                            
                            ?>
                        </td>
                        <td><?php echo $customer ?></td>
                        <td><?php echo $customer_contact ?></td>
                        <td><?php echo $customer_email ?></td>
                        <td><?php echo $customer_address ?></td>
                        <td>
                            <a href="<?php echo SITEURL ?>admin/update-order.php?id=<?php echo $id ?>" class="btn-secondary">Update Order</a>
                        </td>
                    </tr>

            <?php
                }
            } else {
                echo "<tr><td colspan='12' class='error'>Order Not Available</td></tr>";
            }

            ?>
        </table>
    </div>
</div>


<?php include('partials/footer.php') ?>
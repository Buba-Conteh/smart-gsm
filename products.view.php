<?php
session_start();

require('db.php');

require('functions.php');
require('guard.php');

$statement = $pdo->query('SELECT * FROM products, users GROUP BY products.id');

$products = $statement->fetchAll(PDO::FETCH_ASSOC);

// dd($products);
require('header.html');



?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <?php
    if (isset($_SESSION['update_result'])) {
        echo "<div class=\"alert alert-info mt-2\">You have successfully updated Product</div>";
        unset($_SESSION['update_result']);
    }
    if (isset($_SESSION['delete_result'])) {
        $firstName = $_SESSION['first_name'];
        $lastName = $_SESSION['last_name'];
        echo "<div class='alert alert-danger mt-2'>You have successfully deleted $firstName $lastName</div>";

        unset($_SESSION['delete_result']);

        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
    }
    if (isset($_SESSION['confirm_delete'])) {
        $customerId = $_SESSION['customer_id'];
        $firstName = $_SESSION['first_name'];
        $lastName = $_SESSION['last_name'];
        echo "<div class='alert alert-warning mt-2'>Do you really want to delete: $firstName $lastName <a class='btn btn-danger btn-sm mr-2' href='delete.php?id=$customerId&first_name=$firstName&last_name=$lastName'>YES DELETE</a><a href='index.php' class='btn btn-secondary btn-sm ml-2' >CANCEL</a></div>";

        unset($_SESSION['confirm_delete']);

        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
    }
    ?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div> -->
            <a class="btn btn-sm btn-outline-secondary" href="create-product.view.php">
                New Product
            </a>
        </div>
    </div>
    <!-- <h2>All Customers</h2> -->
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Cost</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>sell</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                foreach ($products as $product) {
                    $productId = $product['id'];
                    $name = $product['name'];
                    $type = $product['type'];
                    $cost = $product['cost'];
                    $status = $product['status'];
                    $user = $product['first_name'].' '.$product['last_name'];
                     
                    echo "
               <tr>
                    <td>$index</td>
                    <td> $name</td>
                    <td>$type</td>
                    <td>$cost</td>
                    <td>$user</td>
                    <td class'text-bold'>$status</td>
                    <td><a href='create-sales.php?id=$productId '>sell</a></td>

                <td>
                    <a href='edit-product.view.php?id=$productId'>view</a>";
                    
                    if ($_SESSION['user-type'] =='admin') {
                        # code...
                        echo" <a  href='edit-customer.php?id=$productId'>Edit</a>
                      
                        <a href='confirm_delete.php?id=$productId'>delete</a> ";
                        
                      } 
             echo"   </td>
            </tr>";
                    $index++;
                }
                ?>

            </tbody>
        </table>
        <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-sm btn-outline-secondary mr-2" href="#">
                <span data-feather="chevron-left"></span><span>Previous</span>
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="#">
                <span>Next</span><span data-feather="chevron-right"></span>
            </a>
        </div>

    </div>
</main>

<?php
require('footer.html');
?>
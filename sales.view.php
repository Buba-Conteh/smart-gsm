<?php
session_start();

require('db.php');

require('functions.php');
require('guard.php');

$statement = $pdo->query('SELECT sales.id, amount, sales.created_at, sales.updated_at, products.name, products.type,products.cost, customers.first_name, customers.last_name FROM `sales`,`customers`,`users`,`products` WHERE sales.c_id=1 AND sales.u_id=1 AND sales.p_id=1 GROUP BY sales.id ORDER BY sales.created_at DESC
');

$sales = $statement->fetchAll(PDO::FETCH_ASSOC);

// dd($sales);
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
        <h1 class="h2">Sales</h1>
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
                    <th>Customer</th>
                    <th>product</th>
                    <th>Cost</th>
                    <th>Sale Amount</th>
                    <th>profit/Loss</th>
                    <th>created_at</th>
                    <!-- <th>Actions</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                foreach ($sales as $sale) {
                    $saleId = $sale['id'];
                    $name = $sale['name'];
                    $type = $sale['type'];
                    $cost = $sale['cost'];
                    $amount = $sale['amount'];
                    $updated_at = $sale['updated_at'];
                    $customer= $sale['first_name'].' '.$sale['last_name'];
                    $gains=$amount-$cost;
                     if ($amount<$cost) {
                        $color='danger';
                     }else{
                         $color="success";
                     };
                    echo "
               <tr>
                    <td>$index</td>
                    <td>$customer</td>
                    <td>$name $type</td>
                    <td>$cost</td>
                    <td>$amount</td>
                    <td class='text-$color text-bold'>$gains</td>
                    <td>$updated_at</td>

               
            </tr>";
                    $index++;
                }
                ?>
 <!-- <td>
                    <a href='edit-product.view.php?id=$saleId'>view</a>
                    
                    <a  href='edit-sale.view.php?id=$saleId'>Edit</a>
                    
                    <a href='confirm_delete.php?id=$saleId'>delete</a>
                </td> -->
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
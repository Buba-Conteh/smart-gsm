<?php
session_start();
require('db.php');
$productId = $_GET['id'];

$statement = $pdo->query("SELECT * FROM products where id = $productId");

$product = $statement->fetch(PDO::FETCH_ASSOC);

$statement = $pdo->query('SELECT * FROM customers');

$customers = $statement->fetchAll(PDO::FETCH_ASSOC);

require('header.html');
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
         <?php
            if(isset($_SESSION['insert_result'])){
                echo "<div class=\"alert alert-success mt-2\">You have successfully created a new produc</div>";

                unset($_SESSION['insert_result']);
              }
         ?>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Products</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
             
            </div>
          </div>
          <!-- <h2>All Customers</h2> -->
         
                <div class="card border-secondary rounded-0">
                    <div class="card-header text-center border-secondary bg-secondary rounded-0 text-white text-bold">
                       Sell
                    </div>
          <div class="card-body rounded-0">
                    <form action="add-sales.php" method="POST">
                  
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"  for="">Customer</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="customer" id="">
                                <?php
                                foreach ($customers as $customer) {
                                    # code...
                                    $name=$customer['first_name'];
                                    $id=$customer['id'];

                                    echo" <option value='$id'> $name</option>
                                   
                                    ";
                                }
                              
                                ?>
                            </select>
                          </div>
                        </div>

                             
                    <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Product</label>
                            <div class="col-sm-8">
                                <input type="text" value="<?=$product['name']?>" class="form-control"  name ="product" disabled>
                                <input type="hidden" value="<?=$product['id']?>" class="form-control"  name ="product" >
                        </div>
                    </div>
                       
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Cost</label>
                            <div class="col-sm-8">
                                <input type="text" value="<?=$product['cost']?>" class="form-control"  name ="cost" disabled>
                        </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Sale Amount</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  name ="amount" >
                        </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control"  value="<?=$_SESSION['user'] ?>" name ="user">
                            </div>
                            

                        </div>
                        
                        <div class="d-flex">
                        <a href="index.php" class="btn btn-outline-secondary mb-2 text-black rounded-0 w-50 mr-2" style="display: block;">cancel</a>
                          <button type="submit" class="btn btn-outline-primary mb-2 text-black rounded-0 w-50">Save</button>

                        </div>
                    </form>
                </div>
            </div>
        </main>
<?php

require('footer.html');

?>
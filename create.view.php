<?php
session_start();
require('header.html');
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
         <?php
            if(isset($_SESSION['insert_result'])){
                echo "<div class=\"alert alert-success mt-2\">You have successfully inserted a new customer</div>";

                unset($_SESSION['insert_result']);
              }
         ?>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Customers</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
             
            </div>
          </div>
          <!-- <h2>All Customers</h2> -->
         
                <div class="card border-secondary rounded-0">
                    <div class="card-header text-center border-secondary bg-secondary rounded-0 text-white text-bold">
                        ADD NEW CUSTOMER
                    </div>
          <div class="card-body rounded-0">
                    <form action="create-customer.php" method="POST">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name ="first_name" >
                            </div>
                           
                                <!-- <input type="hidden" name ="customer_id" > -->
                            
                            

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  name ="last_name" >
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Phone Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  name ="phone" >
                            </div>             
                            
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Email Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  name ="email" >
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Location</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  name ="town">
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Country</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  name ="country" >
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
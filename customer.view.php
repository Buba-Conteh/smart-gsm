<?php


require('db.php');

require('functions.php');

$customerId = $_GET['id'];

// dd($customerId);

$customer = getCustomer($pdo, $customerId);

    


require('header.html');
    
    
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Customer: <span class="text-info"><?= "$customer[first_name] $customer[last_name]"  ?></span></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <!-- <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button> -->
            </div>
          </div>
          <!-- <h2>All Customers</h2> -->
         
                <div class="card border-secondary rounded-0">
                    <div class="card-header text-center border-secondary bg-secondary rounded-0 text-white text-bold">
                        CUSTOMER INFO
                    </div>
          <div class="card-body rounded-0">
          <table class="table table-condensed table-bordered">
                                <tbody>
                                    <tr>
                                        <th>
                                            
                                            First Name

                                        </th>
                                        <td>
                                            <?= $customer['first_name'] ?>
                                        </td>
                                    </tr>
                                    
                                    
                                   
                                    <tr>
                                        <th>
                                           
                                            Last Name

                                        </th>
                                        <td>
                                            <?= $customer['last_name'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            
                                            Phone Number

                                        </th>
                                        <td>
                                            <?= $customer['phone'] ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th>
                                          
                                            Email

                                        </th>
                                        <td>
                                            <?= $customer['email'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                           
                                            Location

                                        </th>
                                        <td>
                                            <?= $customer['location'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            
                                            Country

                                        </th>
                                        <td>
                                            <?= $customer['country'] ?>
                                        </td>
                                    </tr>
                                    

                                    
                                </tbody>
                            </table>
                </div>
            </div>
        </main>
      
        <?php
        require('footer.html');

        ?>
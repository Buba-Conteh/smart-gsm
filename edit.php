<?php
    function dd($data){

        die(var_dump($data));
    
    }
    $customerId = $_GET['id'];
    $customerName = $_GET['first_name'];

    // die(var_dump($customerName));
    
     

    $user = 'dev';
    $password = 'Dev@123j';

    // MySQL expects parameters in the string
    $pdo = new PDO('mysql:host=localhost;dbname=cms_app', $user, $password);

    $statement = $pdo->query("SELECT * FROM customers where id = $customerId");
    
    $customer = $statement->fetch(PDO::FETCH_ASSOC);

    // dd($customer);
   
    
    
?>
<!doctype html>
<html lang="en">

<head>
    <title>Currency Converter APP PHP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card border-primary rounded-0">
                    <div class="card-header text-center border-primary bg-primary rounded-0 text-white text-bold">
                        EDIT CUSTOMER : <?= $customerId; ?>
                    </div>
                <div class="card-body rounded-0">
                    <form action="">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?= $customer['first_name']; ?>">
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?= $customer['last_name']; ?>">
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Phone Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?= $customer['phone']; ?>">
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Email Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?= $customer['email']; ?>">
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Location</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?= $customer['location']; ?>">
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Country</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?= $customer['country']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-sm-6 my-1">
                                <a href="index.php" class="btn btn-secondary btn-sm mr-5">cancel</a>
                                <!-- <button type="submit" class="btn btn-primary btn-sm">Update</button> -->
                            </div>
                            <div class="col-sm-6 my-1">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </div>
                            
                            
                        </div>
                       
                    </form>
                </div>
            </div> 
                
            </div>
            
        </div>

    </div>
  
</body>

</html>
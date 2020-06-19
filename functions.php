<?php

    function dd($data)
    {

        var_dump($data);
        die;
    }

    function getAllCustomers($pdo)
    {

        $statement = $pdo->query('SELECT * FROM customers');

        $customers = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $customers;
    }
    function getCustomer($pdo, $customerId)
    {

        $statement = $pdo->query("SELECT * FROM customers where id = $customerId");

        $customer = $statement->fetch(PDO::FETCH_ASSOC);


        return $customer;
    }

    function createCustomer($pdo, $customer)
    {

        $statement = $pdo->prepare("INSERT INTO customers (`first_name`, `last_name`, `phone`, `email`, `location`, `country`) values (:first_name, :last_name,:phone,:email, :town, :country )");


        return $statement->execute($customer);
    }

    function deleteCustomer($conn, $customer)
    {

        $st = $conn->exec("delete from customers where id = $customer");

        return $st;
    }

    // users query functions;
    function getAllUsers($pdo)
    {

        $statement = $pdo->query('SELECT * FROM users');

        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    function createUser($pdo, $user)
    {

        $password = 'user';
        $user['password'] = md5($password); // adding password key with the value password in our $user array;

        $statement = $pdo->prepare("INSERT INTO users (`first_name`, `middle_name`, `last_name`, `password`, `email`, `phone`) values (:first_name, :middle_name, :last_name,:password, :email, :phone)");

        return $statement->execute($user);
    }

    function updateCustomers($pdo)
    {

        $customerId = $_POST['customer_id'];
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $country = $_POST['country'];



        $statement = $pdo->prepare("update customers set first_name = :first_name, last_name = :last_name, phone = :phone, email = :email, location = :location, country = :country WHERE id = :customer_id ");

        $customerData = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'customer_id' => $customerId,
            'phone' => $phone,
            'email' => $email,
            'location' => $location,
            'country' => $country
        ];

        // dd($_POST);
        $statement = $statement->execute($customerData);
        return $statement;
    }

    function redirect($page)
    {
        header('location:' . $page);
        die;
    }

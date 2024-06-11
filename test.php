<?php

require_once 'vendor/autoload.php';

require 'db/connect.php';

// print_r($conn);

$faker = Faker\Factory::create();

for ($i=0; $i < 10; $i++) { 
    $name = $faker->name();
    $email = $faker->email();
    $phone = $faker->phoneNumber();
    $age = $faker->numberBetween(10, 100);
    $password = $faker->numberBetween(1000, 10000);

    $user_type = ['vendor', 'user'];

    $index = rand(0, 1);

    $user = $user_type[$index];

    $sql = "INSERT INTO users (fullname, email, phone, age, password, user_type) VALUES ('$name', '$email', '$phone', '$age', '$password', '$user')";


    $result = $conn->query($sql);
    if ($result) {
        echo "<h1>User created successfully!";
    }else{
        echo "<h1>Something went wrong!";
    }
}




<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';


    if (isset($_POST['name']) && isset($_POST['description'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];

        $addCategory = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";
        $result = mysqli_query($con, $addCategory);
        if ($result) { 
            echo json_encode(
                [
                    'success' => true,
                    'message' => 'Category added'
                ]
            );
        } else {
            echo json_encode(
                [
                    'success' => false,
                    'message' => 'Error adding category'
                ]
            );
        }
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'Please fill all the fields.'
            ]
        );
    }

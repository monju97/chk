<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $name = $_POST['name'];
    $emp_id=$_POST['emp_id'];
    $pcmodel=$_POST['pcmodel'];
    $phone=$_POST['phone'];

    // Get gender value (radio button)
        // $gender = isset($_POST['gender']) ? $_POST['gender'] : null;

    // // Convert gender value to 0 or 1
    // $genderValue = $gender === "1" ? 1 : 0;
        
    // Connect to the database (Replace 'username', 'password', and 'database_name' with your database credentials)
    $conn = new mysqli('localhost', 'root', '', 'check');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to insert data into the database
    $sql = "INSERT INTO check_t (name,Emp_ID,phone) VALUES ('$name','$emp_id', '$phone')";

    // Prepare the statement
    $stmt1 = $conn->prepare($sql);

  //$query=mysqli_query($conn,)


    // Bind the parameters
   // $stmt->bind_param("S", $name );

    //Execute the statement
    if ($stmt1->execute()) {
        echo "Data stored successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the statement and connection
    $stmt1->close();
    $conn->close();
}
?>
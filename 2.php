<!DOCTYPE html>
<html>
<head>
    <title>Data Entry and Preview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: left;
            align-items: flex-start;
        }

        .form-container {
            margin-right: 20px;
        }

        .preview-container {
            border: 1px solid #ccc;
            padding: 10px;
            flex-grow: 1;
        }

        .preview-data {
            font-size: 14px;
        }
        .table-format {
            width: 100px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
   
    <div class="container">
        <div class="form-container">
            <h2>Data Entry Form</h2>
            <form id="dataForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <!-- <form id="dataForm" action="insert.php" method= "POST"> -->
                <label class=table-format for="name">Name:</label>
                <input class=table-format type="text" id="name" name="name" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required><br>

                <p>
                <input type="radio" name="device" value="desktop"> Desktop
                <input type="radio" name="device" value="laptop"> Laptop
                <br>

                <button type="submit">Submit</button>
            </form>
        </div>
<div class="preview-container">
            <h2>Preview</h2>
            <div class="preview-data" id="previewData">
                <!-- Preview data will be shown here -->
            </div>
    </div>
    


    <!-- <script>
        // Access the form and preview container elements
        const form = document.getElementById('dataForm');
        const preview = document.getElementById('previewData');

        // Event listener for form submission
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Get form values
            const name = form.elements.name.value;
            const email = form.elements.email.value;
            const phone = form.elements.phone.value;
            const d_type = form.elements.device.value;


            // Update the preview container with entered data
            preview.innerHTML = `
                <p><strong>Name:</strong> ${name}</p>
                <p><strong>Email:</strong> ${email}</p>
                <p><strong>Phone:</strong> ${phone}</p>
                <p><strong>Device Type:</strong> ${d_type}</p>
            `;

            // Reset the form after submitting
            form.reset();
        });
        //
        function setDeviceValues(deviceType) {
        const desktopRadio = document.querySelector('input[value="0"][name="device"]');
        const laptopRadio = document.querySelector('input[value="0"][name="device"]');

        if (deviceType === 'desktop') {
            desktopRadio.value = "1";
            laptopRadio.value = "0";
        } else if (deviceType === 'laptop') {
            desktopRadio.value = "0";
            laptopRadio.value = "1";
        }
    }
    </script> -->
</body>
</html>

<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get the form data
        $name = $_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $device=$_POST['device'];
        $laptop=0;
        $desktop=0;

        if ($device == "desktop") {
            $desktop = 1;
        } elseif ($device == "laptop") {
            $laptop = 1;
        }

        // Connect to the database (Replace 'username', 'password', and 'database_name' with your database credentials)
        $conn = new mysqli('localhost', 'root', '', 'check');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement to insert data into the database
        $sql = "INSERT INTO user (name,email,phone,desktop,laptop) VALUES ('$name','$email', '$phone', '$desktop', '$laptop')";

        // Prepare the statement
        $stmt1 = $conn->prepare($sql);

    //$query=mysqli_query($conn,)


        // Bind the parameters
    // $stmt->bind_param("S", $name );

        //Execute the statement
        if ($stmt1->execute()) {
            echo  '<script>alert("Data inserted successfully!");</script>';
        } else {
            echo "Error: " . $conn->error;
        }

        // Close the statement and connection
        $stmt1->close();
        $conn->close();
    }
        ?>

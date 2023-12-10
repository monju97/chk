<?php
// // Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] === "entry") {
//     // Get the form data
//     $name = $_POST['name'];
//     $emp_id=$_POST['emp_id'];
    
    // Connect to the database (Replace 'username', 'password', and 'database_name' with your database credentials)
    $conn = new mysqli('localhost', 'root', '', 'check');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to insert data into the database
    // $sql = "INSERT INTO check_t (name,Emp_ID) VALUES ('$name','$emp_id')";

    // Prepare the statement
    // $stmt1 = $conn->prepare($sql);

    // Prepare the SQL statement to select all data from the database
    $sqls = "SELECT * FROM check_t order by id desc limit 5";

    // Execute the query
    $result = $conn->query($sqls);   

  //$query=mysqli_query($conn,)


    // Bind the parameters
   // $stmt->bind_param("S", $name );

    //Execute the statement
    // if ($stmt1->execute()) {
    //     echo "Data stored successfully!";
    // } else {
    //     echo "Error: " . $conn->error;
    // }

    // Close the statement and connection
    // $stmt1->close();
    $conn->close();
// }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Local Network Information Form</title>
</head>
<body>
<div class=WordSection1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 style='margin-left:-12.65pt;border-collapse:collapse'>
 <tr style='height:25.5pt'>
  <td width=1786 colspan=2 valign=top style='width:1339.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:25.5pt'>
  <p class=MsoNormal><h1>MAF IT ASSET Information Form</h1></p>
  </td>
 </tr>
 <tr style='height:279.75pt'>
  <td width=436 rowspan=2 valign=top style='width:327.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:279.75pt'>
  <form id="assetInfoForm"  method="post" action="chk_insert.php">

<table>
    <tr>                               
        <td><label for="name">User Name:</label></td>
        <td><input type="text" id="name" name="name" required><br></td>
    </tr> 
    <tr>
        <td><label >Employee ID :</label></td>
        <td><input type="text" name="emp_id" required><br></td>
    </tr> 
   
    <tr>
            </tr>
    <tr>
        <td><label for="pcModel">PC Model:</label></td>
        <td><input type="text" id="pcModel" name="pcmodel" required><br></td>
    </tr>
    
             
<tr>
    
    <td></td>
    <td><input type="submit" value="Submit"></td>
    
</tr> 
</table>
</form>
</td>

  <td width=1350 valign=top style='width:1012.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:279.75pt'>
  <p class=MsoNormal>
  
  <?php
     // Check if there are any rows in the result
     if ($result->num_rows > 0) {
        // Output the data in a table
        echo "<table border='1'>
            <tr>
                <th>    Name </th>
                <th>	Emp_ID 	</th>
                <th>    PC Model</th>             
                              
            </tr>";
    
        // Loop through the rows and display the data
        while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['name'] . "</td>
                <td>" . $row['emp_id'] . "</td>
                <td>" . $row['pc_model'] . "</td>             
                
            </tr>";
        }
    
        echo "</table>";
    } else {
        echo "No data found.";
    }
     
?>

</p>
  </td>
 </tr>
 <tr style='height:210.75pt'>
  <td width=1350 valign=top style='width:1012.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:210.75pt'>
  <p class=MsoNormal>4</p>
  </td>
 </tr>
 <tr style='height:20.25pt'>
  <td width=1786 colspan=2 valign=top style='width:1339.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:20.25pt'>
  <p class=MsoNormal>5</p>
  </td>
 </tr>
</table>

<p class=MsoNormal>&nbsp;</p>

</div>
</body>
</html>

<script>

fetch('chk_insert.php', {
            method: 'POST',
            body: new FormData(this)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Show a success popup
                alert(data.message);
            } else {
                // Show an error popup
                alert(data.message);
            }
        })
        .catch(error => {
            // Show an error popup in case of a network error
            alert('An error occurred while submitting the form.');
        });
    
</script>




    <!-- <h1>Local Network Information Form</h1>

    <form id="networkInfoForm"  method="post" action="test.php">

        <table>
            <tr>                               
                <td><label for="name">User Name:</label></td>
                <td><input type="text" id="name" name="name" required><br></td>
            </tr>  
            <tr>
               <td>Employee ID:</td>
                <td><input type="text"  name="eid" required><br></td>
            </tr> 

 <tr>
            
            <td></td>
            <td><input type="submit" value="Submit"></td>
            
        </tr> 
               

        
    </table>
        
    </form>
 -->

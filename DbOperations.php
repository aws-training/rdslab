<?php 
      	/*create table mysqldbinstance.address
        (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(100),
        address VARCHAR(100),
        PRIMARY KEY(id) 
        );*/
        
       	session_start();
$conn = new mysqli('mysqldbinstance.cclsb8bfrbwf.ap-south-1.rds.amazonaws.com', 'mysqldbinstance', 'mysqldbinstance', 'mysqldbinstance');
// Check connection
if ($conn->connect_error) {
$_SESSION['message'] = "<font color='red'>". "Address NOT Saved "."<br>"."Error: <br>" . $conn->connect_error."</font>";
}

        // initialize variables
        $name = "";
        $address = "";
        $id = 1;
        $update = false;

        if (isset($_POST['save'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $sql ="INSERT INTO address (name, address) VALUES ('$name', '$address')";
if ($conn->query($sql) === TRUE) {
$_SESSION['message'] = "Address Saved Successfully";
  echo "New records created successfully";
} else {
$_SESSION['message'] = "<font color='red'> Address NOT Saved "."<br>"."Error: " . $sql . "<br>" . $conn->error."</font>";
}
header('location: index.php');
        }


<?php
$servername = "ecs-pd-proj-db.ecs.csus.edu";
$username = "CSC174052";
$password = "Csc134_267165097";
$db = "CSC174052";
$CustomerID = $_POST['CustomerID'];


// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Prepared Statements
$stmt = $conn->prepare("INSERT INTO CUSTOMER (cid) VALUES (?)");
$stmt->bind_param("i", $CustomerID);
$stmt->execute();

//Print out the table!
$result = mysqli_query($conn, "SELECT * FROM CUSTOMER");

print "<table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
 <tr>
  <td width=100>CID:</td>
  <td width=100>First Name</td>
  <td width=100>Last Name</td>
  <td width=100>Phone Number</td>
  <td width=100>Email Address </td>
 </tr>";

while($row = mysqli_fetch_array($result)){
        print "<tr>";
        print "<td>" . $row['cid'] . "</td>";
        print "<td>" . $row['fname'] . "</td>";
        print "<td>" . $row['lname'] . "</td>";
        print "<td>" . $row['phone'] . "</td>";
        print "<td>" . $row['email'] . "</td>";
        print "</tr>";
}

print "</table>";

$stmt->close();
$conn->close();

?>

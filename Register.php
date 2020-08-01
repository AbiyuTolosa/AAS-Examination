<?php 
	$FirstName = filter_input(INPUT_POST, 'firstname'); 
	$LastName = filter_input(INPUT_POST, 'lastname');
	$Grade = filter_input(INPUT_POST, 'grade');
	$Section = filter_input(INPUT_POST, 'section');
	$Examroom = filter_input(INPUT_POST, 'roomnum');
	if (!empty($FirstName) && !empty($LastName) && !empty($Grade) && !empty($Section) && !empty($Examroom)) {
						$host = "localhost";
						$dbuser = "root";
						$dbpassword = "";
						$dbname = "examdata";

						$conn = new mysqli ($host, $dbuser, $dbpassword, $dbname);
						if (mysqli_connect_error()) {
							die('Connection Error ('. mysqli_connect_errno().')' .mysqli_connect_error());
						}
						else{
							$sql = "INSERT INTO userdata(FNAME, LNAME, GRADE, SECTION, ROOMNUM)  values ('$FirstName', '$LastName', '$Grade', '$Section', '$Examroom')";
							if ($conn->query($sql)) {
								echo "New record is inserted successfully ";
							}
							else{
								echo "Error: ". $sql ."br". $conn->error;
							}
							$conn->close();
							echo "Data has been inserted successfully";
						}

					}
 ?>
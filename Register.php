<?php 
	$FirstName = filter_input(INPUT_POST, 'firstname'); 
	$LastName = filter_input(INPUT_POST, 'lastname');
	$Grade = filter_input(INPUT_POST, 'grade');
	$Section = filter_input(INPUT_POST, 'section');
	$Examroom = filter_input(INPUT_POST, 'roomnum');
	if (!empty($FirstName)) {
		if (!empty($LastName)) {
			if (!empty($Grade)) {
				if(!empty($Section)){
					if (!empty($Examroom)) {
						$host = "localhost";
						$dbuser = "root";
						$dbpassword = "";
						$dbname = "userdata";

						$conn = new mysqli ($host, $dbuser, $dbpassword, $dbname);
						if (mysqli_connect_error()) {
							die('Connection Error ('. mysqli_connect_errno().')' .mysqli_connect_error());
						}
						else{
							$sql = "INSERT INTO userdata(FNAME, LN, GRADE, SECTION, ROOMNUM)  values ('$FirstName', '$LastName', '$Grade', '$Section', '$Examroom')";
							if ($conn->query($sql)) {
								echo "New record is inserted successfully ";
							}
							else{
								echo "Error: ". $sql ."br". $conn->error;
							}
							$conn->close();
						}
					}
					else{
						echo "Examroom must not be empty";
					}
				}
				else{
					echo "Section should not be empty";
					die();
				}
			}
			else{
				echo "Grade should not be empty";
				die();
			}
			
		}
		else{
			echo "Last Name should not be empty";
			die();
		}
	}
	else{
		echo "First Name should not be empty";
		die();
	}
 ?>
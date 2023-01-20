<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee List View</title>

	<style>
		table tr:hover{
			cursor:pointer;
		}
		table thead{
			background: #008ECC;
		}
		table thead tr th{
			color: #fff;
		}		
	</style>

	<script>
		$(document).ready(function(){
			var id = $(this).attr('row_id');
			window.open("http://localhost:8080/web_development/php_programs/employee_registration_update_new.php?id=" + id);
		});
	</script>
</head>

<body>
<div class="container">
	<h2 style="margin-top: 30px; margin-bottom: 20px;"> Employee List</h2>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th> Employee Number</th>
				<th> Employee Name</th>
				<th> Gender</th>
				<th> Date of Birth</th>
				<th> Nationality</th>
				<th> Civil Status </th>
				<th> Department</th>
				<th> Employee Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include 'db_connection';
				$conn = OpenCon();

				$sql = "SELECT emp_id_no, employee_no, fname, mname, lname, suffix, gender, birth_date, nationality , 
				civil_status, department, designation, employee_status FROM personal_infotbl";
				$result - $conn->query($sql);
				if ($result-> num_rows > 0) {
					while($row - $result -> fetch_assoc()) {
						echo "<tr row_id= '" . $row['emp_id_no'] . "'><td>" . $row["employee_no"] . "</td></td>" 
							. "<td>" . $row["fname"] . " " . $row["mname"] . " " . $row["lname"]. " " .$row[suffix]. " " 
								. "</td>" . $row["gender"]. "</td>" ."<td>" . $row["birth_date"] ."</td>" . "<td>" .$row["nationality"]. "</td>"
								."<td>" . $row["civil_status"]. "</td>" . "<td>" . $row["department"]. "</td>" ."<td>" . $row["designation"] . "</td>" 
								."<td>" . $row["employee_status"]. "</td>" ;								 
					}
					echo "</table>";
				} else {
					echo "0 results" ;
				}
				$conn->close();
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
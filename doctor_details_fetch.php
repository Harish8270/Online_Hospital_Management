<html>
<head>
<title>
	Doctors Records
</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body styles="margin:50px;">
	<h3>LIST OF DOCTORS</h3><br>
	<table class="table">
	    <th>doctor_id</th>
		<th>first_name</th>
		<th>last_name</th>
		<th>department_id</th>
		<th>specialist</th>
		<th>date_of_join</th>
		<th>date_of_retriement</th>
		<th>dob</th>
		<th>age</th>
		<th>address</th>
		<th>city</th>
		<th>state</th>
		<th>phone</th>


		<?php
		$servername="localhost";
		$username="root";
		$password="";
		$database="mini_project";

		//create connection
		$connection=new mysqli($servername,$username,$password,$database);
		//check connection
		if($connection->connect_error)
		{
			die("Connection failed:".$connection->connect_error);
		}

		//read data
		$sql="SELECT * FROM doctors_details";
		$result=$connection->query($sql);

		if(!$result)
		{
			dei("Invalid query: ". $connection->error);
		}

		//read data
		while($row=$result->fetch_assoc()){
		    echo "<tr>
			<td>".$row["doctor_id"]."</td>
			<td>".$row["first_name"]."</td>
			<td>".$row["last_name"]."</td>
			<td>".$row["department_id"]."</td>
			<td>".$row["specialist"]."</td>
			<td>".$row["date_of_join"]."</td>
			<td>".$row["date_of_retriement"]."</td>
			<td>".$row["dob"]."</td>
			<td>".$row["age"]."</td>
			<td>".$row["address"]."</td>
			<td>".$row["city"]."</td>
			<td>".$row["state"]."</td>
			<td>".$row["phone"]."</td>

			<td>  
			      <a class='btn btn-primary btn-sm' href='update' >update</a>
				   <a class='btn btn-danger btn-sm' href='delete' >delete</a>
			</td>


		</tr> ";

		}

		
		?>
	</table>
</body>
</html>
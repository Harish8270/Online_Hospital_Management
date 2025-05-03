<html>
<head>
<title>
	Registration Records
</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body styles="margin:50px;">
	<h3>LIST OF REGISTRATION</h3><br>
	<table class="table">
		<th>username</th>
		<th>email</th>
		<th>password</th>
		<th>confirm_password</th>
                                 
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
		$sql="SELECT * FROM register";
		$result=$connection->query($sql);

		if(!$result)
		{
			dei("Invalid query: ". $connection->error);
		}

		//read data
		while($row=$result->fetch_assoc()){
		    echo "<tr>
			<td>".$row["username"]."</td>
			<td>".$row["email"]."</td>
			<td>".$row["password"]."</td>
			<td>".$row["confirm_password"]."</td>
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
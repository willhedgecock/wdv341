<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Events</title>

	<style>
		table, th, td {
			border: 1px solid black;
			padding: 5px;
		}

		th {
			background-color: skyblue;
		}

		td {
			background-color: #EDED98;
		}

		table {
			background-color: #eeeeee;
		}
	</style>
</head>

<body>

    <h1>WDV341 Intro PHP</h1>
    <h3>Create selectEvents page - demonstrate SQL Select using HTML Table to display database information</h3>

	<?php try {
	  
	  require "dbConnect.php";	//CONNECT to the database

	  $sql = "SELECT * FROM wdv341_events"; //get all rows from the events table
	  
	  //PREPARE the SQL statement
	  $stmt = $conn->prepare($sql);
	  
	  //EXECUTE the prepared statement
	  $stmt->execute();		
	  
	  //Prepared statement result will deliver an associative array
	  $stmt->setFetchMode(PDO::FETCH_ASSOC);


  }  
  catch(PDOException $e)  {

	  $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

	  error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
	  error_log($e->getLine());
	  error_log(var_dump(debug_backtrace()));
  
	  //Clean up any variables or connections that have been left hanging by this error.		
	
		//header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
  }

  ?>

	<table>

  		<tr>
		  <th>Event Name</th>
		  <th>Event Description</th>
		  <th>Event Presenter</th>
		  <th>Event Date</th>
		  <th>Event Time</th>
		</tr>

		<?php
			while( $row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		?>

		<?php
			echo "<tr><td>". $row['event_name'] . "</td><td>". $row['event_description']."</td><td>"
			. $row['event_presenter'] . "</td><td>" . $row['event_date']. "</td><td>". $row['event_time'];
		?>

	<?php
			}
			?>

<?php echo "</table>"; ?>
	

	
	
    
</body>

</html>
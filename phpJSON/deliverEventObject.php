<?php try {
	  
	  require "dbConnect.php";	//CONNECT to the database

	  $sql = "SELECT * FROM wdv341_events WHERE event_id = 1"; //get first row from the events table
	  
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

  <?php

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  $outputObj = new stdClass();

    $outputObj->eventName = $row['event_name'];
    $outputObj->eventDescription = $row['event_description'];
    $outputObj->eventPresenter = $row['event_presenter'];
    $outputObj->eventDate = $row['event_date'];
    $outputObj->eventTime = $row['event_time'];

    $newOutputObj = json_encode($outputObj);

    echo $newOutputObj;

    ?>

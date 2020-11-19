<?php
 //FORM FIELD VARIABLES
 $event_name = "";
 $event_description = "";
 $event_presenter = "";
 $event_date = "";
 $event_time = "";

 //FORM FIELD ERRORS
 $event_name_err = "";
 $event_description_err = "";
 $event_presenter_err = "";
 $event_date_err = "";
 $event_time_err = "";

 $validForm = true;

 if( isset($_POST['event_submit']) ) {

     if( (empty($_POST['event_name'])) ) {
         $validForm = false;
         $event_name_err = " *Event name is required";
     } else {
         $validForm = true;
         $event_name = $_POST['event_name'];
     }

     if( (empty($_POST['event_description'])) ) {
         $validForm = false;
         $event_description_err = " *Event description is required";
     } else {
         $validForm = true;
         $event_description = $_POST['event_description'];
     }

     if( (empty($_POST['event_presenter'])) ) {
         $validForm = false;
         $event_presenter_err = " *Event presenter is required";
     } else {
         $validForm = true;
         $event_presenter = $_POST['event_presenter'];
     }

     if( (empty($_POST['event_date'])) ) {
         $validForm = false;
         $event_date_err = " *Please select a date";
     } else {
         $validForm = true;
         $event_date = $_POST['event_date'];
     }

     if( (empty($_POST['event_time'])) ) {
         $validForm = false;
         $event_time_err = " *Please select a time";
     } else {
         $validForm = true;
         $event_time = $_POST['event_time'];
     }

     if($validForm) {

        try {

        require "dbConnect.php";	//CONNECT to the database


        $stmt = $conn->prepare("INSERT INTO wdv341_events (event_name, event_description, event_presenter, event_date, event_time)
        VALUES (:eventName, :eventDescription, :eventPresenter, :eventDate, :eventTime)");

        $stmt->bindParam(':eventName', $event_name);
        $stmt->bindParam(':eventDescription', $event_description);
        $stmt->bindParam(':eventPresenter', $event_presenter);
        $stmt->bindParam(':eventDate', $event_date);
        $stmt->bindParam(':eventTime', $event_time);

        $stmt->execute();
     }

     catch(PDOException $e)  {

        $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
  
        error_log($e->getMessage());
        error_log($e->getLine());
        error_log(var_dump(debug_backtrace()));
      
          //header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
    }

    $event_name = "";
    $event_description = "";
    $event_presenter = "";
    $event_date = "";
    $event_time = "";
    
    echo "<h2>-- New record created successfully --</h2>";

}

};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Input Form</title>

    <style>

        html {
            height: 100%;
        }

        body {
            background: linear-gradient(300deg, rgba(213,55,121,0.77) 29%, rgba(240,19,19,0.7703016241299304) 86%);
            background-repeat: no-repeat; 
        }

        form {
            margin: 20px auto;
            border: 2px solid black;
            max-width: 60%;
            padding: 20px;
            background-color: #f7f7f7;
        }

        form h2 {
            text-align: center;
            margin: 5px auto 25px auto;
        }

        form label {
            font-weight: bold;
        }

        .errorMsg {
            color: red;
        }



    </style>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

    <div class="heading">

        <h1>Input a New Event</h1>
        <h2>WDV341 Intro PHP</h2>
        <h3>Create form that will accept input and store information into wdv341 events database</h3>
    
    </div>

    <form action="eventsForm.php" method="POST" id="inputEvent">

        <h2>Create a new event</h2>

        <p>
            <label for="event_name">Event Name: </label>
            <input type="text" id="event_name" name="event_name" value="<?php echo $event_name?>"><span class="errorMsg"><?php echo $event_name_err?></span>
        </p>

        <p>
            <label for="event_description">Event Description: </label>
            <input type="text" id="event-description" name="event_description" value="<?php echo $event_description?>"><span class="errorMsg"><?php echo $event_description_err?></span>
        </p>

        <p>
            <label for="event-presenter">Event Presenter: </label>
            <input type="text" id="event_presenter" name="event_presenter" value="<?php echo $event_presenter?>"><span class="errorMsg"><?php echo $event_presenter_err?></span>
        </p>

        <p>
            <label for="event_date">Event Date: </label>
            <input type="date" id="event_date" name="event_date" value="<?php echo $event_date?>"><span class="errorMsg"><?php echo $event_date_err?></span>
        </p>

        <p>
            <label for="event_time">Event Time: </label>
            <input type="time" id="event_time" name="event_time" value="<?php echo $event_time?>"><span class="errorMsg"><?php echo $event_time_err?></span> 
        </p>

        <div class="g-recaptcha" data-sitekey="6LdzKuIZAAAAAFWMxTyrdy8ZZ8tubUHFHU0GPJ12"></div>
        <br>        

        <input type="submit" value="Submit Event" name="event_submit" id="event_submit">
        <input type="reset" value="Reset Form" name="Reset">



    </form>


    
</body>
</html>
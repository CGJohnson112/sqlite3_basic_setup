<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('itinerary.db');
      }
   }
   $db = new MyDB();
?>

<center>
 
   <form  action="insert.php" method="POST" enctype="multipart/form-data"> 
    <input type="hidden" name="action" value="submit"> 
   
    Name of event:<br> 
    <input name="event" type="text" size="30"/><br> 

    Type of Event:<br> 
    <input name="type" type="text" size="30"/><br> 
   
    Date:<br> 
    <input name="datepicker" type="text" size="30"/><br> 

    Time Start:<br> 
    <input name="timeStart" type="text" size="30"/><br>

    Time End:<br> 
    <input name="timeEnd" type="text" size="30"/><br>

      
    Comments:<br> 
    <textarea name="message" rows="7" cols="30"></textarea><br><br> 
   
    <input type="submit" value="Submit"/> 
    </form> 
   
</center>

 <?php 

    $event=$_REQUEST['event'];
    $type=$_REQUEST['type'];  
    $datepicker=$_REQUEST['datepicker'];
    $timeStart=$_REQUEST['timeStart']; 
    $timeEnd=$_REQUEST['timeEnd'];   
    $message=$_REQUEST['message']; 


   $db->exec("INSERT INTO schedule (event, type, datepicker, timeStart, timeEnd, message)
      VALUES ('$event', '$type', '$datepicker', '$timeStart', '$timeEnd', '$message');") or die(print_r($db->errorInfo(), true));

   $db->close();
   

?>
<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('itinerary.db');
      }
   }
   $db = new MyDB();

   

   $sql =<<<EOF
      SELECT * from schedule;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      
      echo "<br>";

      // add the BR tag to print the values in a new line    
      

      echo "event: ". $row['event'] ."<br />";
      echo "type: ". $row['type'] ."<br />";
      echo "date:  ".$row['datepicker'] ."<br />";
      echo "start:  ".$row['timeStart'] ."<br />";
      echo "end:  ".$row['timeEnd'] ."<br />";
      echo "message:  ".$row['message'] ."<br />";
      echo "<hr />";
   }
  
   $db->close();
?>
<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('itinerary.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      CREATE TABLE schedule
      (event          VARCHAR(255),
      type            VARCHAR(255),
      datepicker       DATE,
      timeStart        VARCHAR(7),
      timeEnd           VARCHAR(7),
      message          TEXT);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }
   $db->close();
?>
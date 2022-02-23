<?php

class Student{

    function __construct($abc,$abd){

        echo date("Y-m-d H:i:s");
        echo "welcome".$abc;
        echo "india".$abd;
    }

  function test(){
       echo "hello.<br>";
       for($i=1; $i<100000;$i++){
           echo $i;
           echo "<br>";
       }
   }
   function abcd(){
       echo "world";
   }

   function __destruct()
   {
       echo "call destruct";
       echo date("Y-m-d H:i:s");
   }

    
}

$abc = new Student(1,2);
$abc->test();

//$abc2 = new Student;
//$abc->abcd();



?>
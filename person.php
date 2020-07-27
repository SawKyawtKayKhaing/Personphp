<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
    
        
    if (isset($_POST['submit']))
    {
        
          $name =$_POST["name"];
          $address = $_POST["address"];
          $program = $_POST["program"];
          $year = $_POST["year"];
          $fee = $_POST["fee"];

          

          $student=new Student($program,$year,$fee);
          $student->set_name($name);
          $student->set_address($address);
          $student->List();

          $arr=array("Name"=>$student->get_name(),"Address"=>$student->get_address(),"Program"=>$student->program,"Year"=>$student->year,"Fee"=>$student->fee);
          $add=json_encode($arr);
          
          $myfile = fopen("std.txt", "a") or die("Unable to open file!");
          fwrite($myfile, $add."\n");
          fclose($myfile);
    }

    
  ?>

<?php   
    if (isset($_POST['submit1']))
    {
        
          $name =$_POST["name"];
          $address = $_POST["address"];
          $school = $_POST["school"];
          $pay = $_POST["pay"];
          
          
        
          $staff=new Staff($school,$pay);
          $staff->set_name($name);
          $staff->set_address($address);
          $staff->Text();

          $arr=array("Name"=>$staff->name,"Address"=>$staff->address,"School"=>$staff->school,"Pay"=>$staff->pay);
          $add=json_encode($arr);
              
          $myfile = fopen("staff.txt", "a") or die("Unable to open file!");
          fwrite($myfile, $add."\n");
          fclose($myfile);

    }
?>
    <?php
    class Person{
      public $name;
      public $address;
      public function __construct($name,$address)
      {
        $this->name=$name;
        $this->address=$address;
      }
      function set_name($name)
      {
        $this->name=$name;
      }
      function set_address($address)
      {
        $this->address=$address;
      }
      function get_name()
      {
        return $this->name;
      }
      function get_address(){
        return $this->address;
      }
      public function Info(){
        echo "Name is {$this->name} and Address is{$this->address};";
      }
    }
    class Student extends Person{
      public $program;
      public $year;
      public $fee;
      public function __construct($program,$year,$fee){
        $this->program=$program;
        $this->year=$year;
        $this->fee=$fee;
      }
      public function List(){
        echo "Name is {$this->name}, and Address is {$this->address}, Program is {$this->program}, Year is {$this->year}, and Fee is {$this->fee};";
      }
    }

    class Staff extends Person{
    public $school;
    public $pay;
    
    public function __construct($school,$pay)
    {
      $this->school=$school;
      $this->pay=$pay;
      
    }
    public function Text(){
      echo "Name = {$this->name} <br> Address = {$this->address} <br> School = {$this->school} <br> Payment amount = {$this->pay}";
      
    }
    }
    
?>


    <h2>Student</h2>
    <form method="post" action="<?php $_SERVER["PHP_SELF"];?>">  
    Name:<input type="text" name="name" ><br><br>
    Address: <input type="text" name="address" ><br><br>
    Program: <input type="text" name="program" ><br><br>
    
    
    Year: 
    <input type="radio" name="year"  value="First Year">First Year
    <input type="radio" name="year"  value="Second Year">Second Year
    <input type="radio" name="year"  value="Third Year">Third Year
    <input type="radio" name="year"  value="Final Year">Final Year<br><br>

    Fee: <input type="text" name="fee" ><br><br>
    <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Staff</h2>
    <form method="post" action="<?php $_SERVER["PHP_SELF"];?>">  
    Name:<input type="text" name="name" ><br><br>
    Address: <input type="text" name="address" ><br><br>
    School:<input type="text" name="school" ><br><br>
    Pay: <input type="text" name="pay" ><br><br>
    <input type="submit" name="submit1" value="Submit">
    </form>





</body>
</html>
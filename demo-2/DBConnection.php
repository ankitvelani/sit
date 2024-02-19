<?php
class Connection {
   // Member Area
    private $host ,$database,$user,$password;
    private $stmt;
    public $conObj;
            
    
    //constructor
    function __construct()
    {
     $this->host="localhost";
        $this->database="demo";
        $this->user="root";
        $this->password="";
        $this->stmt=NULL;

        try{
        	
        	$this->conObj=new PDO("mysql:host=".$this->host.";dbname=".$this->database.";", $this->user, $this->password);
            //echo "DB Connected!";
        }
        catch (PDOException $e)
        {
        	print "Error at Connection !: " . $e->getMessage() . "</br>";
        }

    }
    //end of the constructor
    function updateData($qry)
    {

      try{
        	
            $this->stmt=  $this->conObj->prepare($qry);   
            $this->stmt->execute();
             
            return 1;
            
        }
        catch (PDOExecption $e){
            $this->conObj->rollback();
            return 0;
        }
    }
    
    
    function deleteData($qry)
    {

      
        try{
        	
            $this->stmt=  $this->conObj->prepare($qry);
            $this->stmt->execute();
              
            return 1;
            
        }
        catch (PDOExecption $e){
            $this->conObj->rollback();
            return 0;
        }
    }
    
    //insert data function
    function putData($table, $values)
    {

        $qry = "INSERT INTO $table VALUES ($values)";
      try{
            $this->stmt=  $this->conObj->prepare($qry);
            $this->stmt->execute();
            return $this->conObj->lastInsertId();
            
        }
        catch (PDOExecption $e){
            $this->conObj->rollback();
            return 0;
        }
    }
    //end of the data insert function 
    
    
    //retrive data function
    public function getData($table, $cols, $where=" 1=1 ")
    {

        $qry =" SELECT  $cols FROM $table WHERE $where ";

        $this->stmt= $this->conObj->prepare($qry);
        $this->stmt->execute();
        
        $row=$this->stmt->fetchAll();
        return $row;
 
    }
    // retruve data function end        
    
    
    function __destruct() {
       // echo "Desctructed ..";
       $this->conObj=NULL;
    }
}

?>
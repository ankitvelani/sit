<?php
class Connection {
   // Member Area
    private $host ,$database,$user,$password;
    private $stmt;
    public $conObj;
            
    
    //constructor
    function __construct()
    {
     $this->host="mydb.cjurhzg5qavd.us-east-2.rds.amazonaws.com";
        $this->database="students";
        $this->user="root";
        $this->password="mypassword";
        $this->stmt=NULL;

        try{
        	
        	$this->conObj=new PDO("mysql:host=".$this->host.";dbname=".$this->database.";", $this->user, $this->password);
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
    function putData($qry)
    {
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
    public function getData($qry)
    {
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

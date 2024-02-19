<?php
include "./header.php";
?>


<h4>Add User </h4>

<pre>

    <form method="post">
            Name  : <input type="text" name="username" required/>

            <input type="submit" name="insert_btn" value="Add" />
    </form>
</pre>

<?php
include "./footer.php";
?>


<?php
    include "./DBConnection.php";


    $obj = new Connection();
    

    if(isset($_POST['insert_btn'])){
        
        $username = $_POST['username'];
        
        $values= "NULL, '$username'";
        $obj->putData("users", $values);

    }

<?php
include "./header.php";

include "./DBConnection.php";
$obj = new Connection();



$res = $obj->getData("users", " * ");

?>


<h4>Add User </h4>

<pre>

    <form method="post">
            Name  : <input type="text" name="name" required/>
            Mobile  : <input type="text" name="mobile" required/>
            Address  : <input type="text" name="address" required/>

            <input type="submit" name="insert_btn" value="Add" />
    </form>


</pre>

<table border="1">
    <tr>
        <th>ID</th>
        <th>NAME</th>
    </tr>

        <?php
        foreach($res as $data){

            echo " <tr>
                        <td>$data[0]</td>
                        <td>$data[1]</td>
                </tr>";

        }

        ?>
</table>




<?php
include "./footer.php";
?>


<?php
   
    

    if(isset($_POST['insert_btn'])){
        
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];

        $values= " NULL, '$name', '$mobile', '$address'  ";
        $last_insert_id = $obj->putData("demo_123", $values);

        if($last_insert_id)
        {
            echo "Data Inserted!";
        }

    }

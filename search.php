<?php

//conection database with pdo 
$connect = new PDO("mysql:host=localhost;dbname=cadastro_equipamentos", "root", "");

//checking the data 
if(isset($_POST["nome"])){
    $buscar = $_POST['nome'];
    //assigning  the filter 
    $query = "SELECT * FROM cadastro_func WHERE name LIKE '%".$buscar."%' ORDER BY name";
}else{
 $query = "SELECT * FROM cadastro_func ORDER BY name";
}


//executing the query with more secure to show i work with pdo too
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$rowCount = $statement->rowCount();


//getting all registers of table 
if($rowCount > 0){
    
    //concatenate the data variable with the assembly of a table to show the data
    $data = '<div class = "table-responsive">
    <table class = "table bordered table-striped table-hover largura-tabela">
    <tr class = "table-active">

    <th>Id</th>
    <th>Name</th>
    <th>Last Name</th>
    <th>E-mail</th>
    <th>City</th>
    <th>State</th>
    <th>Register</th> 

    </tr>
    ';

    //foreach to receive the data
    foreach($result as $row){
        $data .='

        <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["name"].'</td>
            <td>'.$row["last_name"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["cidade"].'</td>
            <td>'.$row["estado"].'</td>
            <td>'.$row["registro"].'</td>
        
            </tr>
        ';
    }

    $data .= '</table></div>';

}

else{
    $data = "Nobary registers";
}

//show the data
print($data);



?>
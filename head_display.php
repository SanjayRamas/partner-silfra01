<?php
require_once 'db_config.php';
?>

<html>
    <head>
     <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
       
    </head>
    <body>
    <iframe name="hiddenFrame" class="hide"></iframe>
    <form class="form-inline" action="validity.php" method="POST" target="hiddenFrame">
    <table class="table table-bordered">
    <thead>
        <tr>
            
            <th>Partner Head</th>
            <th>Training Excellence</th>
            <th>Delivery Head</th>
        </tr>
    </thead>
    <tbody>
          <?php 
                
                //$servername = "mysql://udigl5hvxqgfk9sq:hS6WRIRctjsMdBGTLqx@bqo4nnrsr-mysql.services.clever-cloud.com:3306/bqo4nnrsr";
                //$username = "udigl5hvxqgfk9sq";
                //$password = "hS6WRIRctjsMdBGTLqx";
                //$dbname = "bqo4nnrsr";
               // $conn = new mysqli($servername, $username, $password, $dbname);
                
                //$sql = "SELECT legal_name,partner_type,valid FROM cluster_ngo_partner WHERE valid='no'";
                $result = $DBcon->query("SELECT id,email FROM core_committee WHERE id='1'");
                if ($result->rowCount() > 0) {
    
                while($row = $result->fetch( PDO::FETCH_ASSOC )) 
                {
                   
                ?>
        <tr> 
            <td>
 <?php echo $row["email"]; ?>                         
 </td>       
          
            
            
        </tr><?php } }?>
        
    </tbody>

         
    <thead>
        
    </thead>
    <tbody>
          <?php 
                
                //$servername = "localhost";
                //$username = "root";
                //$password = "";
                //$dbname = "partner";
                //$conn = new mysqli($servername, $username, $password, $dbname);
                
                //$sql = "SELECT corporate_legal_name,partner_type,valid FROM corporate_implementation_partner WHERE valid='no'";
                $result = $DBcon->query("SELECT id,email FROM core_committee WHERE id='2'");
                if ($result->rowCount() > 0) {
    
                while($row = $result->fetch( PDO::FETCH_ASSOC )) 
                {
                   
                ?>
         
                  
            <td>
 <?php echo $row["email"]; ?>
                           
 </td>
           
            
        <?php } }?>
        
    </tbody>

    <thead>
        
    </thead>
    <tbody>
          <?php 
                
               // $servername = "localhost";
               // $username = "root";
                //$password = "";
                //$dbname = "partner";
               // $conn = new mysqli($servername, $username, $password, $dbname);
                
               // $sql = "SELECT `p_legal_name`, `partner_type`, `valid` FROM `participative_partner_with_self-sustenance` WHERE valid = 'no'";
                $result = $DBcon->query("SELECT id,email FROM core_committee WHERE id='3'");
               
                if ($result->rowCount() > 0) {
    
                while($row = $result->fetch( PDO::FETCH_ASSOC )) 
                {
                   
                ?>
       
            <td>
 <?php echo $row["email"]; ?>                         
 </td>       
            
           
            
       <?php } }?>
        
    </tbody>

    <thead>
       
    </thead>
 
</table>
        
       
           
  
        </form>
    </body>
</html>

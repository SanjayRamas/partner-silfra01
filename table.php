<?php
require_once 'db_config.php';
?>

<html>
    <head>
     <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <style>
        .btn span.glyphicon 
		{    			
	   opacity: 0;				
         }
        .btn.active span.glyphicon 
		{				
	   opacity: 1;				
      }
            
            .checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
}

.radio .cr {
    border-radius: 50%;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}

.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}

.hide { position:absolute; top:-1px; left:-1px; width:1px; height:1px; }
        </style>
    </head>
    <body>
    <iframe name="hiddenFrame" class="hide"></iframe>
    <form class="form-inline" action="validity.php" method="POST" target="hiddenFrame">
    <table class="table table-bordered">
    <thead>
        <tr>
            
            <th>Partner Legal Name</th>
            <th>Partner Type</th>
            <th>Validity</th>
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
                $result = $DBcon->query("SELECT legal_name,partner_type,valid FROM cluster_ngo_partner WHERE valid='no'");

                if ($result->rowCount() > 0) {
    
                while($row = $result->fetch( PDO::FETCH_ASSOC )) 
                {
                   
                ?>
        <tr> 
            <td>
 <?php echo $row["legal_name"]; ?>                         
 </td>       
            <td>
 <?php echo $row["partner_type"]; ?>
                           
 </td>
            <td><div class="checkbox">
            <label style="font-size: 1.0em">
                <input type="checkbox" name="legal_name[]" value="<?php echo $row["legal_name"]; ?>">
                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
            
            </label>
                </div></td>
            
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
                $result = $DBcon->query("SELECT corporate_legal_name,partner_type,valid FROM corporate_implementation_partner WHERE valid='no'");

                if ($result->rowCount() > 0) {
    
                while($row = $result->fetch( PDO::FETCH_ASSOC )) 
                {
                   
                ?>
        <tr> 
            <td>
 <?php echo $row["corporate_legal_name"]; ?>                         
 </td>       
            <td>
 <?php echo $row["partner_type"]; ?>
                           
 </td>
            <td><div class="checkbox">
            <label style="font-size: 1.0em">
                <input type="checkbox" name="corporate_legal_name[]" value="<?php echo $row["corporate_legal_name"]; ?>">
                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
            
            </label>
                </div></td>
            
        </tr><?php } }?>
        
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
                $result = $DBcon->query("SELECT `p_legal_name`, `partner_type`, `valid` FROM `participative_partner_with_self-sustenance` WHERE valid = 'no'");
               
                if ($result->rowCount() > 0) {
    
                while($row = $result->fetch( PDO::FETCH_ASSOC )) 
                {
                   
                ?>
        <tr> 
            <td>
 <?php echo $row["p_legal_name"]; ?>                         
 </td>       
            <td>
 <?php echo $row["partner_type"]; ?>
                           
 </td>
            <td><div class="checkbox">
            <label style="font-size: 1.0em">
                <input type="checkbox" name="p_legal_name[]" value="<?php echo $row["p_legal_name"]; ?>">
                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
            
            </label>
                </div></td>
            
        </tr><?php } }?>
        
    </tbody>

    <thead>
       
    </thead>
    <tbody>
          <?php 
                
              //  $servername = "localhost";
              //  $username = "root";
               // $password = "";
               // $dbname = "partner";

               // $conn = new mysqli($servername, $username, $password, $dbname);
                
               // $sql = "SELECT f_legal_name,partner_type,valid FROM fully_funded_project_implementation_partner WHERE valid='no'";
                $result = $DBcon->query("SELECT f_legal_name,partner_type,valid FROM fully_funded_project_implementation_partner WHERE valid='no'");

                if ($result->rowCount() > 0) {
    
                while($row = $result->fetch( PDO::FETCH_ASSOC )) 
                {
                   
                ?>
        <tr> 
            <td>
 <?php echo $row["f_legal_name"]; ?>                         
 </td>       
            <td>
 <?php echo $row["partner_type"]; ?>
                           
 </td>
            <td><div class="checkbox">
            <label style="font-size: 1.0em">
                <input type="checkbox" name="f_legal_name[]" value="<?php echo $row["f_legal_name"]; ?>">
                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
            
            </label>
                </div></td>
            
        </tr><?php } }?>
        
    </tbody>
</table>
        
       
           
   <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </body>
</html>

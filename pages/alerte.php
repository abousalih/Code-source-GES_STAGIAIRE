<?php
    require_once('identifier.php');
    
    $message=isset($_GET['message'])?$_GET['message']:"Erreur";
    
    $url=isset($_GET['url'])?$_GET['url']:"index.php";
    
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Alerte</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        
        <div class="container margetop60">
           
                <div class="alert alert-danger">
                
                    <h4><?php echo $message ?></h4> 
                                      
                </div>
                
                <br><br>
                
                <div class="alert alert-info">
                
                    <h4>Vous serez redireger dans 3 secondes</h4>
                    
                   	<?php  header("refresh:5;url=$url"); ?>
                   	
                </div>
        
        </div>  
            
    </body>
</HTML>
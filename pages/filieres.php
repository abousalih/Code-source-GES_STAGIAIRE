<?php
    require_once('identifier.php');
    require_once("connexiondb.php");
    
    /*
    if(isset($_GET['nomF']))
        $nomf=$_GET['nomF'];
    else
        $nomf="";
    */
  
    $nomf=isset($_GET['nomF'])?$_GET['nomF']:"";
    $niveau=isset($_GET['niveau'])?$_GET['niveau']:"all";
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    if($niveau=="all"){
        $requete="select * from filiere
                where nomFiliere like '%$nomf%'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from filiere
                where nomFiliere like '%$nomf%'";
    }else{
         $requete="select * from filiere
                where nomFiliere like '%$nomf%'
                and niveau='$niveau'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countF from filiere
                where nomFiliere like '%$nomf%'
                and niveau='$niveau'";
    }

    $resultatF=$pdo->query($requete);

    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrFiliere=$tabCount['countF'];
    $reste=$nbrFiliere % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbrFiliere/$size;   
    else
        $nbrPage=floor($nbrFiliere/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des filières</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success margetop60">
          
				<div class="panel-heading">Rechercher des filières</div>
				<div class="panel-body">
					
					<form method="get" action="filieres.php" class="form-inline">
					
						<div class="form-group">
                            
                            <input type="text" name="nomF" 
                                   placeholder="Nom de la filière"
                                   class="form-control"
                                   value="<?php echo $nomf ?>"/>
                                   
                        </div>
                        
                        <label for="niveau">Niveau:</label>
			            <select name="niveau" class="form-control" id="niveau"
                                onchange="this.form.submit()">
                            <option value="all" <?php if($niveau==="all") echo "selected" ?>>Tous les niveaux</option>
                            <option value="q"   <?php if($niveau==="q")   echo "selected" ?>>Qualification</option>
                            <option value="t"   <?php if($niveau==="t")   echo "selected" ?>>Technicien</option>
                            <option value="ts"  <?php if($niveau==="ts")  echo "selected" ?>>Technicien Spécialisé</option>
                            <option value="l"   <?php if($niveau==="l")   echo "selected" ?>>Licence</option>
                            <option value="m"   <?php if($niveau==="m")   echo "selected" ?>>Master</option> 
			            </select>
			            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                        
                       	<?php if ($_SESSION['user']['role']=='ADMIN') {?>
                       	
                            <a href="nouvelleFiliere.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                
                                Nouvelle filière
                                
                            </a>
                            
                        <?php } ?>                 
                         
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des filières (<?php echo $nbrFiliere ?> Filières)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id filière</th><th>Nom filière</th><th>Niveau</th>
                                <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($filiere=$resultatF->fetch()){ ?>
                                <tr>
                                    <td><?php echo $filiere['idFiliere'] ?> </td>
                                    <td><?php echo $filiere['nomFiliere'] ?> </td>
                                    <td><?php echo $filiere['niveau'] ?> </td> 
                                    
                                     <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                        <td>
                                            <a href="editerFiliere.php?idF=<?php echo $filiere['idFiliere'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer la filière')"
                                                href="supprimerFiliere.php?idF=<?php echo $filiere['idFiliere'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    <?php }?>
                                    
                                </tr>
                            <?PHP } ?>
                       </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="filieres.php?page=<?php echo $i;?>&nomF=<?php echo $nomf ?>&niveau=<?php echo $niveau ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </body>
</HTML>
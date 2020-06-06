<?php
    //require_once('identifier.php');
?>

<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	
		<div class="navbar-header">
		
			<a href="../index.php" class="navbar-brand">Gestion des stagiaires</a>
			
		</div>
		
		<ul class="nav navbar-nav">
					
			<li><a href="stagiaires.php">
                    <i class="fa fa-vcard"></i>
                    &nbsp Les Stagiaires
                </a>
            </li>
			
			<li><a href="filieres.php">
                    <i class="fa fa-tags"></i>
                    &nbsp Les Filières
                </a>
            </li>
			
			<?php if ($_SESSION['user']['role']=='ADMIN') {?>
					
				<li><a href="Utilisateurs.php">
                        <i class="fa fa-users"></i>
                        &nbsp Les utilisteurs
                    </a>
                </li>
				
			<?php }?>
			
		</ul>
		
		
		<ul class="nav navbar-nav navbar-right">
					
			<li>
				<a href="editerUtilisateur.php?id=<?php echo $_SESSION['user']['iduser'] ?>">
                    <i class="fa fa-user-circle-o"></i>
					<?php echo  ' '.$_SESSION['user']['login']?>
				</a> 
			</li>
			
			<li>
				<a href="seDeconnecter.php">
                    <i class="fa fa-sign-out"></i>
					&nbsp Se déconnecter
				</a>
			</li>
							
		</ul>
		
	</div>
</nav>

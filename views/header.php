<!doctype html>
<html lang="fr"  >
<head>
    <meta charset="utf-8">
	<title><?php if (isset ($this->title)){echo $this->title; }else {echo MVC ;}?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="icon" type="image/png" href="<?PHP echo URL; ?>public/images/gs.jpg" />
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/tooltip.css" />
	
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/table.css" />
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/calendar.css" />
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery-ui.css" />

	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/tooltip.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/function.js"></script>
	
	<script type="text/javascript" src="<?php echo URL; ?>public/js/calendar_db.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/webcam/dnr/webcam.js"></script>
	
	<?php 
    if (isset($this->js)) 
    {
        foreach ($this->js as $js)
        {
            echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
        }
    }
    ?>	
</head>
<body>

<?php 
Session::init();
function getmicrotime(){list($usec, $sec) = explode(" ",microtime());return ((float)$usec + (float)$sec);}
$temps = getmicrotime();

if(Session::get('loggedIn') == false)
{
echo '<div id="cssmenu">';
	echo '<ul>';
		echo '<li><a href="'.URL.'"><span><img src="'.URL.'public/images/icons/gs.jpg'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></span></a></li>';
		
	   
		echo '<li class="active has-sub"><a href="#"><img src="'.URL.'public/images/icons/b_home.png'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a>';
			echo '<ul>';
				echo ' <li class="has-sub"><a href="'.URL.'dnr/"><span>Vision & Mission</span></a>';
					echo '<ul>';
						echo '<li><a href="'.URL.'dnr/"><span>Sub Product</span></a></li>';
						echo ' <li class="last"><a href="#"><span>Sub Product</span></a></li>';
					echo '</ul>';
				echo '</li>';
				echo '<li class="has-sub"><a href="'.URL.'qua/"><span>People Behind</span></a>';
					echo '<ul>';
						echo '<li><a href="'.URL.'qua/"><span>Sub Product</span></a></li>';
						echo '<li class="last"><a href="#"><span>Sub Product</span></a></li>';
					echo '</ul>';
				echo '</li>';
				echo '<li class="has-sub"><a href="'.URL.'pre/"><span>Blood Donation Facts</span></a>';
					echo '<ul>';
						echo '<li><a href="'.URL.'pre/"><span>Sub Product</span></a></li>';
						echo '<li class="last"><a href="#"><span>Sub Product</span></a></li>';
					echo '</ul>';
				echo '</li>';
				echo '<li class="has-sub"><a href="'.URL.'rec/"><span>Who can Donate</span></a>';
					echo '<ul>';
						echo '<li><a href="'.URL.'rec/"><span>Sub Product</span></a></li>';
						echo '<li class="last"><a href="#"><span>Sub Product</span></a></li>';
					echo '</ul>';
				echo '</li>';
				
			echo '</ul>';
		echo '</li>';
		echo '<li class="last"><a href="'.URL.'"><img src="'.URL.'public/images/icons/email.png'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>'; 
	    echo '<li class="last"><a href="'.URL.'setup"><img src="'.URL.'public/images/icons/options.PNG'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>'; 
	    echo '<li class="last"><a href="'.URL.'Authentification/Login"><img src="'.URL.'public/images/icons/login.png'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>';    
	echo '</ul>';
echo '</div>';

}
else
{
echo '<div id="cssmenu">';
	echo '<ul>';
		echo '<li><a href="'.URL.'cour/"><span><img src="'.URL.'public/images/icons/gs.jpg'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></span></a></li>';
		
		echo '<li class="active has-sub"><a href="'.URL.'cour/"><span>DSP</span></a>';
			echo '<ul>';
//**********************************************************************************************************************************************//
		echo '<li class="active has-sub"><a href="'.URL.'"><span>Directeur</span></a>';
					  echo '<ul>';
							   
							   echo '<li class="active has-sub"><a href="'.URL.'"><span>Bureau d\'order</span></a>';
										echo '<ul>'; 
												echo '<li><a href="'.URL.'cour/"><span>Courier</span></a></li>';
												//echo '<li><a href="'.URL.'tcpdf/inspection/odm.php?uc="><span>Ordre de mission</span></a></li>'; 	
										echo '</ul>';
								echo '</li>';
								
							   echo '<li class="active has-sub"><a href="'.URL.'"><span>Inspection sante P </span></a>';
										echo '<ul>'; 
												 echo '<li><a href="'.URL.'inspection/"><span>Structures PUB/PRIV</span></a></li>';
													
										echo '</ul>';
								echo '</li>';
								
								
								
							
					  echo '</ul>';
		echo '</li>'; 
//**********************************************************************************************************************************************//			

		echo '<li class="active has-sub"><a href="'.URL.'"><span>PREV</span></a>';
			  echo '<ul>';
					   echo '<li class="active has-sub"><a href="'.URL.'"><span>PROGRAMMES</span></a>';
								echo '<ul>';       
										 echo '<li><a href="'.URL.'pointdeau/"><span>Point D eau</span></a></li>';
										 echo '<li><a href="'.URL.'deces"><span>Deces Hospitalier</span></a></li>';
										 echo '<li><a href="'.URL.'Bordereau/"><span>Bordereau NM</span></a></li>';
										 echo '<li><a href="'.URL.'mnpe"><span>MNPE</span></a></li>';	
								echo '</ul>';
						echo '</li>';
						echo '<li class="active has-sub"><a href="'.URL.'"><span>MT-MNTC</span></a>';
								echo '<ul>'; 
										   echo '<li><a href="'.URL.'maldecobl/nmaldecobl"><span>MDO</span></a></li>';
										   echo '<li><a href="'.URL.'mors/nmors"><span>MORS</span></a></li>';
								echo '</ul>';
						echo '</li>';
						echo '<li class="active has-sub"><a href="'.URL.'"><span>PSMS</span></a>';
								echo '<ul>'; 
										   echo '<li><a href="'.URL.'scolaire/"><span>Sante Scolaire</span></a></li>';
								
								echo '</ul>';
						echo '</li>';
			  echo '</ul>';
		echo '</li>';    
//**********************************************************************************************************************************************//		
		echo '<li class="active has-sub"><a href="'.URL.'"><span>SAS</span></a>';
			  echo '<ul>';
					   echo '<li class="active has-sub"><a href="'.URL.'"><span>Régu Prod Phar</span></a>';
								echo '<ul>'; 
										 echo '<li><a href="'.URL.'rds/"><span>Rup Des Prod</span></a></li>';
									   
								echo '</ul>';
						echo '</li>';
						echo '<li class="active has-sub"><a href="'.URL.'"><span>SDB/URG/PSY</span></a>';
								echo '<ul>'; 
										   echo '<li><a href="'.URL.'/"><span>soins de base</span></a></li>';
										   echo '<li><a href="'.URL.'/"><span>urgences</span></a></li>';
										   echo '<li><a href="'.URL.'/"><span>psychiatrie</span></a></li>';
								echo '</ul>';
						echo '</li>';
						echo '<li class="active has-sub"><a href="'.URL.'"><span>str/pub et priv</span></a>';
								echo '<ul>'; 
										  
										echo '<li><a href="'.URL.'hemod/"><span>Hemodialyse</span></a></li>';
										
										echo '<li class="has-sub"><a href="'.URL.'pat"><span>PATIENT</span></a>';
											echo '<ul>';
												
												echo '<li class="has-sub"><a href="'.URL.'pat"><span>PATIENT</span></a></a>';
												echo '<ul>';
													echo '<li><a href="'.URL.'pat"><span>PATIENT</span></a></li>';	
												echo '</ul>';
												echo '</li>';
											   
												echo '<li class="has-sub"><a href="'.URL.'don/"><span>Don</span></a>';
												echo '<ul>';
													echo '<li><a href="'.URL.'don/"><span>Search don</span></a></li>';
													echo '<li><a href="'.URL.'don/"><span>New&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;don</span></a></li>';
													echo '<li><a href="'.URL.'don/impdon"><span>Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;don</span></a></li>';
													
												echo '</ul>';
												echo '</li>';
											
											echo '</ul>';
										echo '</li>';
										
										echo '<li class="active has-sub"><a href="'.URL.'dnr/"><span>PTS</span></a>';
													echo '<ul>';
														echo '<li class="has-sub"><a href="'.URL.'dnr/"><span>Doneur</span></a>';
															echo '<ul>';
																
																echo '<li class="has-sub"><a href="'.URL.'dnr/"><span>Doneur</span></a>';
																echo '<ul>';
																	echo '<li><a href="'.URL.'dnr/searchajax"><span>Search donor</span></a></li>';
																	echo '<li><a href="'.URL.'dnr/"><span>Search donor</span></a></li>';
																	echo '<li><a href="'.URL.'dnr/newdnr/"><span>New&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;donor</span></a></li>';
																	echo '<li><a href="'.URL.'dnr/imp"><span>Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;donor</span></a></li>';
																	
																echo '</ul>';
																echo '</li>';
															   
																echo '<li class="has-sub"><a href="'.URL.'don/"><span>Don</span></a>';
																echo '<ul>';
																	echo '<li><a href="'.URL.'don/"><span>Search don</span></a></li>';
																	echo '<li><a href="'.URL.'don/"><span>New&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;don</span></a></li>';
																	echo '<li><a href="'.URL.'don/impdon"><span>Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;don</span></a></li>';
																	
																echo '</ul>';
																echo '</li>';
															
															echo '</ul>';
														echo '</li>';
														echo '<li class="has-sub"><a href="'.URL.'qua/"><span>Qualification</span></a>';
															echo '<ul>';
															
																echo '<li class="has-sub"><a href="'.URL.'dnr/"><span>Doneur</span></a>';
																echo '<ul>';
																	echo '<li><a href="'.URL.'qua/"><span>Search don</span></a></li>';
																	echo '<li><a href="'.URL.'qua/"><span>New&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;don</span></a></li>';
																	echo '<li><a href="'.URL.'qua/imp/"><span>Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;don</span></a></li>';
																	
																echo '</ul>';
																echo '</li>';
																
																echo '<li class="has-sub"><a href="'.URL.'mal/"><span>Malade</span></a>';
																echo '<ul>';
																	echo '<li><a href="'.URL.'mal/"><span>Search malade</span></a></li>';
																	echo '<li><a href="'.URL.'mal/newmal/"><span>New&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;malade</span></a></li>';
																	echo '<li><a href="'.URL.'mal/impmal"><span>Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;malade</span></a></li>';
																	
																echo '</ul>';
																echo '</li>';
															
																
															echo '</ul>';
														echo '</li>';
														echo '<li class="has-sub"><a href="'.URL.'pre/"><span>Preparation</span></a>';
															echo '<ul>';
																echo '<li><a href="'.URL.'pre/"><span>Sub Product</span></a></li>';
																echo '<li class="last"><a href="#"><span>Sub Product</span></a></li>';
															echo '</ul>';
														echo '</li>';
														echo '<li class="has-sub"><a href="'.URL.'rec/"><span>Distribution</span></a>';
															echo '<ul>';
																echo '<li><a href="'.URL.'rec/"><span>Sub Product</span></a></li>';
																echo '<li class="last"><a href="#"><span>Sub Product</span></a></li>';
															echo '</ul>';
														echo '</li>';
														echo '<li class="has-sub"><a href="'.URL.'eva/"><span>Evaluation</span></a>';
															echo '<ul>';
																echo '<li><a href="'.URL.'eva/"><span>Evaluation</span></a></li>';
																echo '<li class="last"><a href="#"><span>Sub Product</span></a></li>';
															echo '</ul>';
														echo '</li>';
													echo '</ul>';
												echo '</li>';
																					
												
								
								echo '</ul>';
						echo '</li>';
			  echo '</ul>';
		echo '</li>'; 
//**********************************************************************************************************************************************//			
		echo '<li class="active has-sub"><a href="'.URL.'"><span>DRH</span></a>';
			  echo '<ul>';
					   echo '<li class="active has-sub"><a href="'.URL.'"><span>GRH</span></a>';
								echo '<ul>';       
										 echo '<li><a href="'.URL.'GRH/"><span>GRH</span></a></li>';
										 echo '<li><a href="'.URL.'GRH"><span>GRH</span></a></li>';
										 echo '<li><a href="'.URL.'GRH/"><span>GRH</span></a></li>';
										 echo '<li><a href="'.URL.'GRH"><span>GRH</span></a></li>';	
								echo '</ul>';
						echo '</li>';
						echo '<li class="active has-sub"><a href="'.URL.'"><span>Formation</span></a>';
								echo '<ul>'; 
										   // echo '<li><a href="'.URL.'maldecobl/nmaldecobl"><span>MDO</span></a></li>';
										   // echo '<li><a href="'.URL.'mors/nmors"><span>MORS</span></a></li>';
								echo '</ul>';
						echo '</li>';
						echo '<li class="active has-sub"><a href="'.URL.'"><span>***</span></a>';
								echo '<ul>'; 
										   // echo '<li><a href="'.URL.'scolaire/"><span>Sante Scolaire</span></a></li>';
								
								echo '</ul>';
						echo '</li>';
			  echo '</ul>';
		echo '</li>';
//**********************************************************************************************************************************************//				  
		echo '<li class="active has-sub"><a href="'.URL.'"><span>Planification</span></a>';
			  echo '<ul>';
					   echo '<li class="active has-sub"><a href="'.URL.'"><span>***</span></a>';
								echo '<ul>';       
										 // echo '<li><a href="'.URL.'pointdeau/"><span>Point D eau</span></a></li>';
										 // echo '<li><a href="'.URL.'deces"><span>Deces Hospitalier</span></a></li>';
										 // echo '<li><a href="'.URL.'Bordereau/"><span>Bordereau NM</span></a></li>';
										 // echo '<li><a href="'.URL.'mnpe"><span>MNPE</span></a></li>';	
								echo '</ul>';
						echo '</li>';
						echo '<li class="active has-sub"><a href="'.URL.'"><span>***</span></a>';
								echo '<ul>'; 
										   // echo '<li><a href="'.URL.'maldecobl/nmaldecobl"><span>MDO</span></a></li>';
										   // echo '<li><a href="'.URL.'mors/nmors"><span>MORS</span></a></li>';
								echo '</ul>';
						echo '</li>';
						echo '<li class="active has-sub"><a href="'.URL.'"><span>***</span></a>';
								echo '<ul>'; 
										   // echo '<li><a href="'.URL.'scolaire/"><span>Sante Scolaire</span></a></li>';
								
								echo '</ul>';
						echo '</li>';
			  echo '</ul>';
		echo '</li>';    
//**********************************************************************************************************************************************//			
			
			
			echo '</ul>';
		echo '</li>';
		echo '<li class="last"><a href="'.URL.'inspection/"><img src="'.URL.'public/images/icons/SS.png'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>'; 
	    echo '<li class="last"><a href="https://www.facebook.com/"><img src="'.URL.'public/images/icons/fb.png'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>'; 
	    
		echo '<li class="last"><a href="https://twitter.com/"><img src="'.URL.'public/images/icons/tw.png'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>'; 
	    echo '<li class="last"><a href="https://www.youtube.com/"><img src="'.URL.'public/images/icons/yt.png'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>'; 
		echo '<li class="last"><a href="https://www.facebook.com/"><img src="'.URL.'public/images/icons/rss.png'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>'; 
		echo '<li class="last"><a href="https://www.facebook.com/"><img src="'.URL.'public/images/icons/linkedin.png'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>'; 
		echo '<li class="last"><a href="https://www.facebook.com/"><img src="'.URL.'public/images/icons/sk.png'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>'; 
	    if(Session::get('role') == 'owner')
        {
		echo '<li class="last"><a href="http://localhost/"><img src="'.URL.'public/images/icons/b_engine.png'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>'; 
	    echo '<li class="last"><a href="http://localhost/phpmyadmin/"><img src="'.URL.'public/images/icons/archive.PNG'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>'; 
	    }
		echo '<li class="last"><a href="'.URL.'dashboard/Logout/"><img src="'.URL.'public/images/icons/s_loggoff.png'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/></a></li>';     
	    echo '<li class="last"><a href="'.URL.'Authentification/Registerupdate/'.Session::get('id').'"><span> welcome :  '.Session::get('login').' </span></a></li>';
	echo '</ul>';
echo '</div>';
} 
?>	
<div id="content">	
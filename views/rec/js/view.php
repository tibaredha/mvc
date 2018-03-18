<?php 
verifsession();
buttondis1($this->user[0]['id']);
?>
<h2>Receveur : view</h2>
<br /><br />
<hr /><br />
<div class="tabbed_area">  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Personal Information</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">List Des transfusions</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Tools</a></li> 	
        </ul>    
		<div id="content_1" class="content">  
		<h2>Personal Information</h2>
		<form method="post" action="<?php echo URL;?>dnr/DONATEOK">
		<label>First Name</label><input type="text" name="NOM"     value="<?php echo $this->user[0]['NOM'];    ?>"  /><br />
		<label>Last  Name</label><input type="text" name="PRENOM"  value="<?php echo $this->user[0]['PRENOM']; ?>"  /><br />
		<label>ABO</label><input type="text" name="GRABO"  value="<?php echo $this->user[0]['GRABO']; ?>"  /><br />
		<label>D ou RH1</label><input type="text" name="GRRH"  value="<?php echo $this->user[0]['GRRH']; ?>"  /><br />
		<label>C ou RH2</label><input type="text" name="CRH2"  value="<?php echo $this->user[0]['CRH2']; ?>"  /><br />
		<label>E ou RH3</label><input type="text" name="ERH3"  value="<?php echo $this->user[0]['ERH3']; ?>"  /><br />
		<label>c ou RH4</label><input type="text" name="CRH4"  value="<?php echo $this->user[0]['CRH4']; ?>"  /><br />
		<label>e ou RH5</label><input type="text" name="ERH5"  value="<?php echo $this->user[0]['ERH5']; ?>"  /><br />
		<label>Kell ou KELL1</label><input type="text" name="KELL1"  value="<?php echo $this->user[0]['KELL1']; ?>"  /><br />
		<label>Cellano ou KELL2</label><input type="text" name="KELL2"  value="<?php echo $this->user[0]['KELL2']; ?>"  /><br />
		<label>WILAYA </label><input type="text" name="WILAYA"          value="<?php echo nbrtostring('wil','IDWIL', $this->user[0]['WILAYA'],'WILAYAS');    ?>"  /><br />
		<label>WILAYAR </label><input type="text" name="WILAYAR"        value="<?php echo nbrtostring('wil','IDWIL', $this->user[0]['WILAYAR'],'WILAYAS');   ?>"  /><br />
		<label>COMMUNE </label><input type="text" name="COMMUNE"        value="<?php echo nbrtostring('com','IDCOM', $this->user[0]['COMMUNE'],'COMMUNE');   ?>"  /><br />
		<label>COMMUNER </label><input type="text" name="COMMUNER"      value="<?php echo nbrtostring('com','IDCOM', $this->user[0]['COMMUNER'],'COMMUNE');   ?>"  /><br />
		<label>ADRESSE </label><input type="text" name="ADRESSE"        value="<?php echo $this->user[0]['ADRESSE'];    ?>"  /><br />
		<label>TELEPHONE </label><input type="text" name="TELEPHONE"    value="<?php echo $this->user[0]['TELEPHONE'];    ?>"  /><br />
		<input type="hidden" name="id"     value="<?php echo $this->user[0]['id'];    ?>"  /><br />
		<p><?php  //photos(1050,390,'');?></p><br /><br /><br /><br />
		<p><?php // photosurl(400,435,URL.'public/webcam/'.$this->user[0]['id'].'.jpg');?></p><br /><br /><br /><br />
		</div>	
		 <div id="content_2" class="content"> 
		<h2>List Des transfusions au nombre de : <?php echo $this->user1;?> </h2>
		<br/><br/>
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th style="width:50px;">F.S.T</th> 
		<th style="width:50px;">F.I.T</th>
		<th style="width:50px;">DATEDIS</th> 
		<th style="width:50px;">HEUREDIS</th>
		<th style="width:50px;">AGE</th>
		<th style="width:50px;">PSL</th>
		<th style="width:50px;">IDP</th>
		<th style="width:100px;">SERVICE</th>
		<th style="width:100px;">MED</th>
		<th style="width:50px;">I.T</th>
		<th style="width:50px;">Update </th>
		<th style="width:50px;">Delete</th>
		</tr>
		<?php
		if (isset($this->userListview)) 
		{		
				foreach($this->userListview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="fiche de surveillance transfusionnelle" href="<?php echo URL.'pdf/fst.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="fiche d’incident transfusionnel" href="<?php echo URL.'pdf/inc.php?id='.$value['id'].'&IDDNR='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/lab1.jpg';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center"><?php echo $value['DATEDIS']; ?></td>
						<td align="center"><?php echo $value['HEUREDIS'];?></td>
						<td align="center"><?php echo $value['AGE'];    ?></td>
						<td align="center"><?php echo $value['PSL'];    ?></td>
						<td align="center"><?php echo $value['IDP'];    ?></td>
						<td align="center"><?php echo nbrtostring('ser','id',$value['SERVICE'],'service');?></td>
						<td align="center"><?php echo nbrtostring('med','id',$value['MED'],'medecin');?></td>
						<td align="center"><a title="incident" href="<?php echo URL.'dis/incident/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/cancel.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a title="editer" href="<?php echo URL.'dis/editdon/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dis/deletedis/'.$value['id'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						</tr>
				<?php 
				}
				$total_count=count($this->userListview);
				if ($total_count <= 0 )
				{
				echo '<tr><td align="center" colspan="12" ><span> No record found for receveur </span></td> </tr>';
				echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="12" ><span>' .$total_count.'/'.$total_count.' Record(s) found.</span></td></tr>';					
				}
				else
				{		
				//echo '<tr bgcolor=""  ><td align="center" colspan="12" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb).'</td></tr>';	
			    echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="12" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
				}		
		}
		else 
		{
		echo '<tr><td align="center" colspan="12" ><span> Click search button to start searching a donor.</span></td></tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="12" ><span>&nbsp;</span></td></tr>';					      
		} 
		echo "</table>";
		?>
		<br/><br/>
		</div>
		<div id="content_3" class="content">  
		<h2>Tools</h2>
		
		
		
		
         <!--
		       <p><a href="admin.php" class="dashboard-module">
                	<img src="<?php //echo URL.'public/images/s.png';?>" width="75" height="75" alt="edit" />
                	<span>Dashboard</span>
                </a></p>
                <p><a href="admin_pharmacist.php" class="dashboard-module">
                	<img src="<?php //echo URL.'public/images/s.png';?>"  width="75" height="75" alt="edit" />
                	<span>Pharmacist</span>
                </a></p>
                
               <p> <a href="admin_manager.php" class="dashboard-module">
                	<img src="<?php //echo URL.'public/images/s.png';?>"  width="75" height="75" alt="edit" />
                	<span>Manager</span>
                </a></p>
                  
               <p> <a href="admin_cashier.php" class="dashboard-module">
                	<img src="<?php //echo URL.'public/images/s.png';?>" width="75" height="75" alt="edit" />
                	<span>Cashier</span>
                </a></p> -->
		<table>
		<tr>
		<td valign=top>		
		
	    <!-- First, include the JPEGCam JavaScript Library 
	    <script type="text/javascript" src="<?php echo URL; ?>public/webcam/webcam.js"></script
		-->
		<script language="JavaScript">
		webcam.set_api_url( "<?php echo URL; ?>public/webcam/test.php?uc=<?php echo $this->user[0]['id'];?>" );
		webcam.set_quality( 90 );                                                       // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true,'<?php echo URL; ?>public/webcam/shutter.mp3' ); // play shutter click sound
	    webcam.set_swf_url( '<?php echo URL; ?>public/webcam/webcam.swf' );
		</script>
		
		<!-- Next, write the movie to the page at 320x240 -->
		<script language="JavaScript">
			document.write( webcam.get_html(320,240) );   //320x240 and 640x480
		</script>
		<!-- Some buttons for controlling things -->
	   <br/>
	   <br/>
	   <form>
	   &nbsp;&nbsp;
		<input type=button value="Configure..." onClick="webcam.configure()">
		&nbsp;&nbsp;
		<input type=button value="Take Snapshot" onClick="take_snapshot()">
	   </form>
			<!-- Code to handle the server response (see test.php) -->
	<script language="JavaScript">
		webcam.set_hook( 'onComplete', 'my_completion_handler' );   //2 option my_completion_handler  my_callback_function
		
		function take_snapshot() {
			// take snapshot and upload to server
			document.getElementById('upload_results').innerHTML = '<h1>Uploading...</h1>';
			webcam.snap();// webcam.snap(); 
			/*
			    This instructs the Flash movie to take a snapshot and upload the JPEG to the server.
				Make sure you set the URL to your API script using webcam.set_api_url(), 
				and have a callback function ready to receive the results from the server, using webcam.set_hook().	
			*/	
		}
		
		
		// fonction  a la fin du trt 
		function my_callback_function(response) {
                alert("Success! PHP returned: " + response);
        }
		function my_completion_handler(msg) {
			// extract URL out of PHP output
			if (msg.match(/(http\:\/\/\S+)/)) {
				var image_url = RegExp.$1;
				// show JPEG image in page
				document.getElementById('upload_results').innerHTML = 
					'<img src="' + image_url + '">'+
					'<h1>Upload Successful!ok</h1>'+
				    '<h1>JPEG URL: ' + image_url + '</h1>';
				// reset camera for another shot
				webcam.reset();
			}
			else alert("PHP Error: " + msg);
		}
	</script>
		
</td>
	<td width=50>&nbsp;</td>
	<td valign=top>
		<div id="upload_results" style="background-color:#eee;"></div>
	</td>
	</tr>
	</table>		
            		  
		</div>
</div> 


       
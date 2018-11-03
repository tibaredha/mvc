<?php 
verifsession();
view::button('hemow',$this->user[0]['id']);
// View::h('2',25,290,'Donor :  [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]");
?>
<h2><?php echo 'hemod :  [ '.$this->user[0]['NOM']."_".$this->user[0]['PRENOM']." ]"     ; ?> </h2>
<hr /><br />
<div class="tabbed_area">  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Personal Information</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">list des seances</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Tools</a></li> 	
        </ul>    
		<div id="content_1" class="content">  
<h2>Personal Information : <A HREF="<?php echo URL;?>views/doc/cpcpost don.pdf"> REF : CPC_post_don</A></h2>
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
		
		<p><?php photosurl(600,335,URL.'public/webcam/hemo/'.$this->user[0]['id'].'.jpg');?></p><br /><br /><br /><br />
		</div>
		
		<div id="content_2" class="content"> 
<h2>List Des Seance</h2>
		<br/><br/>
		<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
		<th style="width:50px;">Fiche</th>
		<th style="width:80px;">Date seance</th>
		<th style="width:100px;">Heure seance</th>
		<th style="width:100px;">Type  seance</th>
		<th style="width:50px;">Generateur</th>
		<th style="width:100px;">Acc   Sang</th>
		<th style="width:50px;">Update </th>
		<th style="width:50px;">Delete</th>
		</tr>
		<?php
		if (isset($this->userListview)) 
		{		
				foreach($this->userListview as $key => $value){ ?>
						<tr bgcolor='WHITE' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='WHITE';" >
						<td align="center" class="bg-gray" style="padding: 5px 5px;"><a title="Fiche Seance" href="<?php echo URL.'tcpdf/hemod/ficheseance.php?ids='.$value['ids'].'&idm='.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/md_records.PNG';?>' width='30' height='30' border='0' alt=''/></a></td>       
						<td align="center"><?php echo $value['dateseance'];?></td>
						<td align="center"><?php echo $value['heures'];?></td>
						<td align="center"><?php echo $value['TYPEDIA'];?></td>
						<td align="center"><?php echo $value['NAPP'];?></td>
						<td align="center"><?php echo $value['ACCSANG'];?></td>
						<td align="center"><a title="editer" href="<?php echo URL.'hemod/editseance/'.$value['ids'].'/'.$this->user[0]['id'];;?>"><img src='<?php echo URL.'public/images/icons/edit.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>
						<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'hemod/deleteseance/'.$value['ids'].'/'.$this->user[0]['id'];?>"><img src='<?php echo URL.'public/images/icons/delete.PNG';?>' width='16' height='16' border='0' alt=''/></a></td>	
						</tr>
				<?php 
				}
				$total_count=count($this->userListview);
				if ($total_count <= 0 )
				{
				echo '<tr><td align="center" colspan="16" ><span> No record found for donor </span></td> </tr>';
				echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="16" ><span>' .$total_count.'/'.$total_count.' Record(s) found.</span></td></tr>';					
				}
				else
				{		
				//echo '<tr bgcolor=""  ><td align="center" colspan="16" >'. barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb).'</td></tr>';	
			    echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="16" ><span>' .$total_count.' Record(s) found.</span></td></tr>';					
				}		
		}
		else 
		{
		echo '<tr><td align="center" colspan="16" ><span> Click search button to start searching a donor.</span></td></tr>';
		echo '<tr bgcolor="#00CED1"  ><td align="center"  colspan="16" ><span>&nbsp;</span></td></tr>';					      
		} 
		echo "</table>";
		?>
		<br/><br/>
		</div>
		<div id="content_3" class="content">  
<h2>Tools</h2>
		<table>
		<tr>
		<td valign=top>		
		
	    
	    <script type="text/javascript" src="<?php echo URL; ?>public/webcam/webcam.js"></script>
		<!-- First, include the JPEGCam JavaScript Library -->
		<script language="JavaScript">
		webcam.set_api_url( "<?php echo URL; ?>public/webcam/hemo/test.php?uc=<?php echo $this->user[0]['id'];?>" );
		webcam.set_quality( 90 );                                                       // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true,'<?php echo URL; ?>public/webcam/hemo/shutter.mp3' ); // play shutter click sound
	    webcam.set_swf_url( '<?php echo URL; ?>public/webcam/hemo/webcam.swf' );
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


       
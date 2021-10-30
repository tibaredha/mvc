<?php 
verifsession();
view::button('drh','');
lang(Session::get('lang'));
$url1 = explode('/',$_GET['url']);
$fichier = photosmfy('drh',$url1[2].'.jpg',"1");
$data = array(
"Date"       => date('Y-m-j'), 
"btn"        => 'drh', 
"id"         => '', 
"butun"      => 'Inser New congé', 
"photos"     => 'public/webcam/drh/'.$fichier
);
View::photosurl(1170,230,URL.$data['photos']);	
?>

<h1>Changer : photos</h1>
<br /><br />
<hr /><br />
<form method="post" action="<?php echo URL;?>drh/upl1/<?php  echo $url1[2];?>"  name="fileForm" id="fileForm" enctype="multipart/form-data" > 
<table align="center" border="2">
          <tr>
			<td align="center">
				<input type="file"   name="upfile"  size="100">&nbsp;&nbsp;<br/><br/>
			</td>
		  </tr>
          <tr>
			<td align="center">
				<input class="text" type="submit" name="submitBtn" value="Upload"><br/><br/>
			</td>
		  </tr>
        </table>
      </form>	
</form>
<hr /><br /><br /><br /><br /><br />

<?php 
if (isset($this->msg)) 
{
echo $this->msg;
}
else 
{
echo '*upload_max_filesize=10M </br>';
echo '*jpg size = 320*240 mm';
}
?>
<br /><br />

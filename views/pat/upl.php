<?php 
verifsession();
lang(Session::get('lang'));
$url1 = explode('/',$_GET['url']);
view::button('cons',$url1[2]);	
?>

<h1>Changer : photos</h1>
<br /><br />
<hr /><br />
<form method="post" action="<?php echo URL;?>pat/upl1/<?php  echo $url1[2];?>"  name="fileForm" id="fileForm" enctype="multipart/form-data" > 
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
<hr />

<?php 
if (isset($this->msg)) 
{
echo $this->msg;
}
else 
{
echo '*upload_max_filesize=10M';
}
?>


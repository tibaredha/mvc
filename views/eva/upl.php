<?php 
verifsession();
view::button('eva','');
$url1 = explode('/',$_GET['url']);	
?>
<h2>Upload : fichiers</h2>
<hr /><br />
<form method="post" action="<?php echo URL;?>eva/upl1/"  name="fileForm" id="fileForm" enctype="multipart/form-data" > 
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
<svg xmlns="http://www.w3.org/2000/svg"xmlns:xlink="http://www.w3.org/1999/xlink">
<polygon 
points="
50,5   
100,5  
125,30  
125,80 
100,105
50,105  
25,80  
25, 30
"
style="stroke:green; fill:green; stroke-width: 3;"/>
</svg>

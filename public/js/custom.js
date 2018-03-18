$(document).ready(function() {
	

	
});


function validateForm()
{
    //for alphabet characters only
    var str=document.form1.login.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("First Name Cannot Contain Numerical Values");
	document.form1.login.value="";
	document.form1.login.focus();
	return false;
	}}
	
	if(document.form1.login.value=="")
	{
	alert("Name Field is Empty");
	return false;
	}
}

$(function() {    
    $('.delete').click(function(e) {
        var c = confirm("Are you sure you want to delete?");
        if (c == false) return false;   
    });   
});
/*  validation form  for search donnor */
function validateForm1()
{
    //for alphabet characters only
    var str=document.form1.q.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("Search Keyword Cannot Contain Numerical Values");
	document.form1.q.value="";
	document.form1.q.focus();
	return false;
	}}
	
	if(document.form1.q.value=="")
	{
	alert("Search Keyword is Empty");
	return false;
	}
}







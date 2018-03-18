<?php verifsession();?>

<h1>Women: Current Pregnancy</h1>
<hr />
<br /><br />

<div class="tabbed_area">  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Personal Information</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Medical Information</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Medical History</a></li> 	
        </ul>   
        
		<div id="content_1" class="content">  
		<h2>Personal Information</h2><br/><br/>
		<form  name="form"   method="post" action="<?php echo URL;?>dnr/create/; ?>">
		<label>fname</label><input type="text" name="NOM" value="" /><br />
		<label>lname</label><input type="text" name="PRENOM" value="" /><br />
		<br />
		FIRST NAME – LAST NAME
		ADDRESS – DISTRICT
		TELEPHONE (PHONE)
        DATE OF BIRTH
		AGE (years)
		ETHNIC GROUP
		LITERACY
		SCHOOLING
		YEARS COMPLETED IN THE HIGHEST LEVEL:
		CIVIL STATUS
		PLACE OF PRENATAL CONTROL
		DELIVERY/ABORTION SITE
		IDENTITY NUMBER (Identity #)
		
		
		FAMILY HISTORY
		PERSONAL HISTORY
		OBSTETRIC HISTORY
		PREVIOUS PREGNANCIES
		
		DELIVERIES / VAGINAL – CESAREAN SECTIONS
		ABORTIONS
		LIVE BIRTHS
		ECTOPIC PREGNANCY
		STILLBIRTHS
		
		ALIVE
		DEAD AT FIRST WEEK
		DEAD AFTER THE FIRST WEEK
		
		
		END OF PREVIOUS PREGNANCY
		PLANNED PREGNANCY
		FAILURE OF THE CONTRACEPTIVE METHOD BEFORE CURRENT PREGNANCY (Failure of the Contraceptive Method.)
		
		
		
        </div> 
        <div id="content_2" class="content"> 
		<h2>Medical Information</h2>
		<br/><br/>
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
		<tr>
            <td><label>PREVIOUS WEIGHT (Kg)</label></td>
            <td><input type="text" class="input" name="WEIGHT" value="1" onblur="BMI() ;  "      /></td>  
		</tr>
        <tr>
            <td ><label>HEIGHT (M) </label></td>
            <td><input type="text" class="input" name="HEIGHT" value="1" onblur="BMI() ;  "   /></td>   
	   </tr>
	   <tr>
            <td><label>BMI (Kg/M2)</label></td>
            <td><input type="text" class="input" name="bmi" value="1"/></td>
        </tr>    
		</table>
		<br/><br/>	
         </div> 

		 <div id="content_3" class="content">  
		
		<h2>Medical History</h2>
		<br/><br/>
		<table  width='90%' border='1' cellpadding='5' cellspacing='1' align='center'>
    
        <tr class="header">
            <th>Questions</th>
            <th style="width:30px">Yes</th>
            <th style="width:30px">No</th>
        </tr>
<?php		
		ques1 ('a','A. Any Serious Illness for the Past Three Months?','','checked');
		ques1 ('b','B. Malaria?','checked','');
		ques1 ('c','C. A Persistent Cough?','checked','');
		ques1 ('d','D. Cough Out Blood Recently (PTB)?','checked','');
		ques1 ('e','E. Shortness of Breath?','checked','');
		ques1 ('f','F. Asthma?','checked','');
		ques1 ('g','G. Diabetes?','checked','');
		ques1 ('h','H. Jaundice (Hepatitis)?','checked','');
		ques1 ('i','I. Any Abortion?','checked','');
		ques1 ('j','J. Shortness of Breath?','checked','');
		ques1 ('k','K. Pregnant?','checked','');
		ques1 ('l','L. Delivery within 4 Months?','checked','');
		ques1 ('m','M. VD and Yaws?','checked','');
		ques1 ('n','N. Having Colds at Present?','checked','');
		ques1 ('o','O. Losing Weight?','checked','');
		ques1 ('p','p. Time of Last Meal?','checked','');		
?>
         
    </table>
	
<br/>	
<label>&nbsp;</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" />
	
	</form> 
<br/><br/>
        </div>		 
 </div> 

 








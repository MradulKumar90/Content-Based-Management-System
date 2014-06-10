// JavaScript Document

<!-- Dummy comment to hide code from non-JavaScript browsers

if (document.images) {
buttonUp = new Image(); buttonUp.src = "Images/top_strp_bg.jpg"; // Never use bitmaps for the web.
buttonDown = new Image(); buttonDown.src = "Images/new_bg.jpg";
}

function turn_off(cell) {
if (document.images != null) {
cell.style.backgroundImage = "url('" + buttonUp.src + "')";
cell.style.color = "#3C3B39";
}
}

function turn_on(cell) {
if (document.images != null) {
cell.style.backgroundImage = "url('" + buttonDown.src + "')";
cell.style.color = "#FFFFFF";
}
}

// End of top image change -->

function news_popup_more(url) 
{
	var a = url;
	newwindow=location.href="http://www.rkssoft.com/"+ a +"";
}

var strCity = "sel";
function checklength()
{
	var len = document.contact.fdtext.value.split(/[\s]+/);
	var wordLen = 1000; // Maximum word length
	if(len.length > wordLen)
	{
		alert("You cannot put more than "+wordLen+" words in this text area.");
		return false;
	}
	return true;
}

function check(val1,numVar)
{
	if (vall.value !="")
	{
		if(numVar == 1)
		{
			 valid="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ . " ;
		}
		var ok = "yes";
		var temp;
		for (var i=0; i<val1.value.length; i++)
		{
			temp = "" + val1.value.substring(i, i+1);
			if (valid.indexOf(temp) == "-1")
		   ok = "no";	
		}
		
		if (ok == "no") 
		{
			if (val1.value.length==1)
			{ 
				val1.value=""
			}
		
			alert('Only Alphabets Please');
			val1.focus();
			val1.select();
		}
	} 
}

function emailvalidation(field, msg)
{
	with (field)
	{
		apos=value.indexOf("@"); 
		dotpos=value.lastIndexOf(".");
		if (apos<1 || dotpos-apos<2 ) 
		{
			alert(msg); 
			field.focus(); 
			return false;
		}
		else
			return true;
	}
}

function isValid(value, type)
{
 	switch(type)
 	{
  		case 'alpha':
   		return /^[A-Za-z]*$/.test(value);
  		case 'numeric':
   		return /^[0-9a-zA-Z]*$/.test(value);
  		case 'email':
   		return /^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/.test(value);
 	}
}

// Script for Search not found page 

function isValid2(value, type)
{
 		switch(type)
 		{
			case 'name':
			return/^[a-zA-Z]+([.]{0,1}[ ]{0,1}[a-zA-Z]+)*$/.test(value);
			case 'alpha':
			return /^[A-Za-z]*$/.test(value);
			case 'numeric':
			return /^[0-9]*$/.test(value);
			case 'email':
			return /^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/.test(value);
	 	}
}


function validatefrm()
{
	if(document.contact.name.value =="")
	{
		alert("Please enter your name first.");
		document.contact.name.focus();
		return false
	} 
//Checking the Name for Numeric	
   if (isValid(document.contact.name.value, 'numeric'))
   { 
		alert("Please enter characters only.");
		document.contact.name.focus();
		return false;
  	}
	if(document.contact.country.value == "selected")
	{
		alert("Please select a Country.");
		document.contact.country.focus();
		return false;
	}
	if(document.contact.city.value == "")
	{	
			alert("Please enter city name.");
			document.contact.city.focus();
			return false;
	}
	if(document.contact.state.value == "")
	{
		alert("Please enter your state.");
		document.contact.info.focus();
		return false;
	}
	if(document.contact.pin.value == "")
	{
		alert("Please enter your zip code.");
		document.contact.pin.focus();
		return false;
	}
	if(document.contact.email.value =="")
	{
		alert("Please enter eMail id.");
		document.contact.email.focus();
		return false
	}
	if(!isValid(document.contact.email.value,'email'))
	{
		alert("Please enter valid eMail id.");
		document.contact.email.focus();
		return false;
	}
	if(document.contact.phone.value =="")
	{
		alert("Please enter phone.");
		document.contact.phone.focus();
		return false
	}
	if (!isValid(document.contact.phone.value, 'numeric'))
   { 
		alert("Please enter valid contact number.");
		document.contact.phone.focus();
		return false;
  	}

	if(document.contact.info.value == "")
	{
		alert("Please enter your question.");
		document.contact.verifycode.focus();
		return false;
	}
	document.contact.action = "controller/contact.controller.php";
	document.contact.submit();	
}
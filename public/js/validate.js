var RADIO_NAME = new Array();
function validate(frm)
{          
	var n = frm.elements.length;
	RADIO_NAME = new Array();
	for(var i=0;i<n;i++)
	{
		alt = frm.elements[i].alt;
		if(!alt)		
			alt = frm.elements[i].lang;
		var val = frm.elements[i].value;
		var type = frm.elements[i].type;
		if(val)
			val = Trim(val);
		var title = frm.elements[i].title;
		var name = frm.elements[i].name;
		var has_val = true;
		if(type!=undefined && (type.substr(0 , 6)=='select'))
		{
			var gen_message = "Please select ";
		}else if(type=='radio')
		{
			if(title=='')
				var gen_message = "Please select one option";
			else
				var gen_message = "Please select ";
		}else if(type=='checkbox'){
			if(title=='')
				var gen_message = "Please select at least one check box";
			else
				var gen_message = title;
		}else{
			var gen_message = "Please enter ";
		}
		var valid_car_type='';
		if(alt && alt != "")
		{
			var comp = alt.charAt(0);
			
			rtn1=alt.indexOf('{');
			rtn2=alt.lastIndexOf('}');
			
			if(comp=="*" || comp=="_")
			{
				if(comp=="*")
				{
					if(type=='radio' || type=='checkbox')
					{
						if(RADIO_NAME.toString().indexOf(name)==-1)
						{
							has_val = checkSelectedRadio(name);
						}
					}
					
					if(val=="")
					{
						has_val=false;
					}
					if(!has_val)
					{
						if(type=='checkbox')
							alert(gen_message);
						else
							alert(gen_message+title);
						frm.elements[i].focus();
						return false;
					}
				}
				var valid_char = '';
				var valid_email = 'No';
				for(var j=rtn1+1; j<rtn2; j++)
				{
					//alert(alt.charAt(j));
					if(alt.charAt(j)=="N")
						valid_char += '0123456789.';
					else if(alt.charAt(j)=="A")
						valid_char += 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					else if(alt.charAt(j)=="C")
						valid_char += '0123456789.+-';
					else if(alt.charAt(j)=="T")
						valid_char += '0123456789.+-()ext ';
					else if(alt.charAt(j)=="D")
						valid_char += '0123456789-/: ';
					else if(alt.charAt(j)=="E")
					{
						valid_email = "Yes";
						valid_char += 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789._-@';
					}
					else if(alt.charAt(j)=="P")
					{
                              valid_car_type = 'P';
                              valid_char += 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.+-()!#@~`\'"\\_-=*?.,&^$:;}{[]|/';
          }
          				
					else if(alt.charAt(j)=="X")
						valid_char = '';
					else if(alt.charAt(j)=="[")
					{
						irtn1=alt.indexOf('[');
						irtn2=alt.lastIndexOf(']');
						//alert(alt.substring(irtn1+1,irtn2));
						valid_char += alt.substring(irtn1+1,irtn2);
						j = rtn2;
					}
				}
				if(valid_email == 'Yes')
				{
					valid_msg = isValidEmail(frm.elements[i].value);
					if(valid_msg != 0)
					{
						alert(valid_msg);
						frm.elements[i].focus();
						return false;
					}
				}
				
				
				for(k=0;k<val.length && valid_char!='';k++)
				{
					ch=val.charAt(k);					
					rtn=valid_char.indexOf(ch);
					
					if(rtn==-1 || (ch==' ' && valid_car_type=='P'))
					{
						alert("Please Enter Valid "+ title);
						frm.elements[i].focus();
						return false;
					}
				}
				
				// Format Validation Here

                    f_str = alt.substring(rtn2+1,alt.length);				
				if(f_str != "" && comp=="*")
				{
					arr = f_str.split(':');
					if(parseInt(arr[0]) > 0)
					{
						if(val.length < parseInt(arr[0]))
						{
							alert(title + " must be atleast of "+parseInt(arr[0])+" characters");
							return false;
						} 
					}
					if(parseInt(arr[1]) > 0)
					{
						if(val.length > parseInt(arr[1]))
						{
							alert(title + " must be less than or equal of "+parseInt(arr[1])+" characters");
							return false;
						} 
					}
				}
			}
		}
	}
	return true;
}
function creditcardcheck()
{
		var vCardType = 'vCardType';
		var vCardNumber = 'vCardNumber';
		var vCVVCode = 'vCVVCode';
		var Month = 'dExpirationMonth';
		var Year = 'dExpirationYear';
		var CartHolder = 'vCardHolder';
		
		
		
		var card_hodler = document.getElementById(CartHolder).value;
		var cc_number = document.getElementById(vCardNumber).value;
		var cc_type = document.getElementById(vCardType).value;
		var cc_year = document.getElementById(Year).value;
		var cc_month = document.getElementById(Month).value;
		var cc_ccv = document.getElementById(vCVVCode).value;

		var mm = (new Date()).getMonth()+1;
		var yy = (new Date()).getYear();
		var error = 0;
		var error_message = "Errors have occured while processing your form.\n\nPlease make the following corrections:\n\n";
		if(card_hodler== "")
		{
			error_message = error_message + "* Please enter the credit card holder's name.\n";
		 	error = 1;
		}
		if (cc_number == "" || cc_number.length < 10) {
		  error_message = error_message + "* The credit card number must be at least 10 characters.\n";
		  error = 1;
		}
		if (!isValidCreditCard(cc_type, cc_number)) {
		  error_message = error_message + "* Invalid credit card number.\n";
		  error = 1;
		}//alert(cc_number); return false;
		
		if (cc_month == '') {
		  error_message = error_message + "* Enter the credit card's expiration month.\n";
		  error = 1;
		}
		
		if (cc_year == "") {
		  error_message = error_message + "* Enter credit card's expiration year.\n";
		  error = 1;
		}

		if (cc_year<yy || (cc_year==yy && cc_month<mm)) {
		  error_message = error_message + "* This credit card has expired. Please check the expiration date or use a different card.\n";
		  error = 1;
		}
		if (cc_ccv == "") {
		  error_message = error_message + "* Enter your credit card verification code.\n";
		  error = 1;
		}
		if (cc_ccv.length < 3 || cc_ccv.length > 4) {
		  error_message = error_message + "* Invalid credit card verification code.\n";
		  error = 1;
		}
		if (error == 1) {
			alert(error_message);
			return false;
		} 	
	return true;
}
function isValidCreditCard(type, ccnum) {
  	if (type == "V") {
	  // Visa: length 16, prefix 4, dashes optional.
//	  var re = /^4\d{3}-?\d{4}-?\d{4}-?\d{4}$/;
	  var re = /^4[0-9]{12}([0-9]{3})?$/;
   } else if (type == "M") {
	  // Mastercard: length 16, prefix 51-55, dashes optional.
//	  var re = /^5[1-5]\d{2}-?\d{4}-?\d{4}-?\d{4}$/;
	  var re = /^5[1-5][0-9]{14}$/;
   } else if (type == "D") {
	  // Discover: length 16, prefix 6011, dashes optional.
	  var re = /^6011-?\d{4}-?\d{4}-?\d{4}$/;
//	  ^6011[0-9]{12}$
   } else if (type == "A") {
	  // American Express: length 15, prefix 34 or 37.
	  var re = /^3[4,7]\d{13}$/;
   } else if (type == "Diners") {
	  // Diners: length 14, prefix 30, 36, or 38.
	  var re = /^3[0,6,8]\d{12}$/;
   }
   if (!re.test(ccnum)) return false;
   // Checksum ("Mod 10")
   // Add even digits in even length strings or odd digits in odd length strings.
   var checksum = 0;
   for (var i=(2-(ccnum.length % 2)); i<=ccnum.length; i+=2) {
	  checksum += parseInt(ccnum.charAt(i-1));
   }

   // Analyze odd digits in even length strings or even digits in odd length strings.
   for (var i=(ccnum.length % 2) + 1; i<ccnum.length; i+=2) {
	  var digit = parseInt(ccnum.charAt(i-1)) * 2;
	  if (digit < 10) { checksum += digit; } else { checksum += (digit-9); }
   }
   if ((checksum % 10) == 0) return true; else return false;
}
//******************************************************************************************//
//********************* functions  for email-id validation ****************************//
//******************************************************************************************//
function isValidEmailtest(emailStr) {
	var checkTLD=1;
	var knownDomsPat=/^(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum)$/;
	var emailPat=/^(.+)@(.+)$/;
	var specialChars="\\(\\)><@,;:\\\\\\\"\\.\\[\\]";
	var validChars="\[^\\s" + specialChars + "\]";
	var quotedUser="(\"[^\"]*\")";
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
	var atom=validChars + '+';
	var word="(" + atom + "|" + quotedUser + ")";
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");
	var matchArray=emailStr.match(emailPat);      
	if (matchArray==null) {
		return "Email address seems incorrect (check @ and .'s)";
		//alert("Email address seems incorrect (check @ and .'s)");
		//return false;
	}
	var user=matchArray[1];
	var domain=matchArray[2];
	// Start by checking that only basic ASCII characters are in the strings (0-127).
	for (i=0; i<user.length; i++) {
		if (user.charCodeAt(i)>127) {
			return "This username contains invalid characters.";
			//return false;
		}
	}
	for (i=0; i<domain.length; i++) {
		if (domain.charCodeAt(i)>127) {
			return "This domain name contains invalid characters.";
			//return false;
		}
	}
	if (user.match(userPat)==null) {
		return "Your username in invalid.";
		//return false;
	}
	var IPArray=domain.match(ipDomainPat);
	if (IPArray!=null) {
		for (var i=1;i<=4;i++) {
			if (IPArray[i]>255) {
				return "Destination IP address is invalid!";
				//return false;
	   		}
		}
		return 0;
	}
	var atomPat=new RegExp("^" + atom + "$");
	var domArr=domain.split(".");
	var len=domArr.length;
	for (i=0;i<len;i++) {
		if (domArr[i].search(atomPat)==-1) {
			return "The domain name is invalid.";
			//return false;
	   }	
	}
	if (checkTLD && domArr[domArr.length-1].length!=2 && 
		domArr[domArr.length-1].search(knownDomsPat)==-1) {
		return "The address must end in a well-known domain or two letter " + "country.";
		//return false;
	}

// Make sure there's a host name preceding the domain.

	if (len<2) {
		return "This email address is missing a hostname!";
		//return false;
	}	
	return 0;
}
function Trim(s) 
{
	return s.replace(/^\s+/g, '').replace(/\s+$/g, '');
}
 function isValidURL(name)
       { 
          url=name.value;
          //alert(url);
          //return false;
              var RegExp = /^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/; 
           if(RegExp.test(url)){ 
                                   return true;
                                    
                              }
                              else
                              {    alert("plese enter valid url");
                                   name.focus();
                                   return false; 
                              } 
     } 
function checkSelectedRadio(name)
{
	var len_arr = RADIO_NAME.length;
	RADIO_NAME[len_arr]=name;
	var len_radio = document.getElementsByName(name).length;
	var radio_checked = false;
	for(r=0;r<len_radio;r++)
	{
		if(document.getElementsByName(name)[r].checked)
		{
			radio_checked = true;
			break;
		}
	}
	return radio_checked;
}

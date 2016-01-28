/*function CallDelete(str)
{
	//alert(str);
	document.getElementById('del').value=str;
	alert(str);

	//var id=document.getElementById('iNewsId').value;
	//alert(id);
	//var mode=document.getElementById('mode').value;
	//alert(mode);
	document.getElementById('b1').style.display='none';
	//document.getElementById('view').style.display='none';
	document.frmadd.submit();
	window.location= "http://192.168.32.154/suryakant/cpanel/admin/index.php?file=imagesadd;

}*/
        
function changepage(url,val1,val2,condn,e)
{
	var val=e.keyCode? e.keyCode : e.charCode
	if(val==13 || condn=="button")
	{
		if(document.frmlist.keyword.value.length < 1)
		{
			alert("Please Enter keyword for Search.");
			document.frmlist.keyword.focus();
			return false;
		}
		url=url+'&option='+val1+'&keyword='+val2;

		window.location=url;
		return false;
	}
}
function valid(actPath)
{
	if(document.frmlist.keyword.value.length < 1)
	{
		alert("Please Enter keyword for Search.");
		document.frmlist.keyword.focus();
		return false;
	}
	else
	{
		chk1="~`%!@#$%^&*()-+=|\{}[]:;'<>?/, ";
		for(i=0;i<document.frmlist.keyword.value.length;i++)
		{
			ch1=document.frmlist.keyword.value.charAt(i);
			rtn1=chk1.indexOf(ch1);
			if(rtn1!=-1)
			{
				alert("Please Enter Proper keyword for Search.");
				document.frmlist.keyword.value='';
				document.frmlist.keyword.focus();
				return false;
			}
			else
			{
				document.frmlist.mode.value="Search";
				//window.location=actPath +"&option="+document.frmlist.option.value+"&keyword="+document.frmlist.keyword.value;
				//return false;
				AjaxSearchListing("&option="+document.frmlist.option.value+"&keyword="+document.frmlist.keyword.value);
				return false;
			}
		}
	}
}

function checkAll()
{
	var rs = (document.frmlist.abc.checked)?true:false;

	for(i=0;i<document.frmlist.elements.length;i++)
	{
	  	if(document.frmlist.elements[i].id == 'iId')
  		{
			document.frmlist.elements[i].checked = rs;
		}

	}
}

function sendpassword()
{
	var y=0; var ans;
	y = getCheckCount();

	if(y>0)
	{	ans = confirm("Confirm Send Password of Selected Member(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value="sendpassword";
		    document.frmlist.submit();}
		else
		{return false;}
	}
	else
	{	alert("Please Select a Member(s) to Send Password.");	return false;	}
}


function showAll()
{
  document.frmlist.mode.value="showAll";
  document.frmlist.submit();
}
function symbol(value,length)
{

	chk1="~`!@#$%^&*()_-+=|\{}[]:;'<>?/,";
	for(i=0;i<length;i++)
	{
		ch1=value.charAt(i);
		rtn1=chk1.indexOf(ch1);
		if(rtn1==-1)
			return false;
	}
	return true;
}

function checkPending()
{
	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}

	var y=0; var ans;
	y = getCheckCount();

	if(y>0)
	{	ans = confirm("Confirm Pending of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value="Pending";
		    document.frmlist.submit();}
		else
		{return false;}
	}
	else
	{	alert("Please Select a Record(s) to Pending.");	return false;	}
}

function DB_query_change_status(Status)
{
	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}

	var y=0; var ans;
	y = getCheckCount();
	if(y>0)
	{
//		alert(Status); return false;
		ans = confirm("Confirm "+Status+" of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value=Status;
		    document.frmlist.submit();}
		else
		{return false;}
	}
	else
	{	alert("Please Select a Record(s) to "+Status+".");	return false;	}

}

function checkDelete()
{
	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}

	var y=0; var ans;
	y = getCheckCount();
	if(y>0)
	{	ans = confirm("Confirm Deletion of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value="Delete";
		    document.frmlist.submit();}
		else
		{return false;}
	}
	else
	{	alert("Please Select a Record(s) to Delete.");	return false;	}
}

function getCheckCount()
{
	var x=0;
	for(i=0;i < document.frmlist.elements.length;i++)
	{	if (document.frmlist.elements[i].id == 'iId' && document.frmlist.elements[i].checked == true)
			{x++;}
	}
	return x;
}



function checkActive()
{
	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}
	var y=0; var ans;
	y = getCheckCount();

	if(y>0)
	{	ans = confirm("Confirm Active Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value="Active";
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to Activate.");	return false;	}
}
function checkFeatured()
{
	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}

	var y=0; var ans;
	y = getCheckCount();

	if(y>0)
	{	ans = confirm("Confirm Featured Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value="Featured";
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to Make Featured.");	return false;	}
}
function checkInActive()
{
	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}
	var y=0; var ans;
	y = getCheckCount();

	if(y>0)
	{	ans = confirm("Confirm Inactive Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value="Inactive";
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to Deactivate.");	return false;	}
}
function checkFeature()
{
	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}

	var y=0; var ans;
	y = getCheckCount();

	if(y>0){
		ans = confirm("Confirm Alter Status of Selected Record(s) ?");
		if(ans == true){
			document.frmlist.mode.value="Feature";
		}
		else{
			return false;
		}
	}
	else{
		alert("Please Select a Record(s) For Alter the Status of Feature.");
		return false;
	}
}

 function galleryimage()
 {
 	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}

   ans = confirm("Confirm To Make a Gallery Image?");
   if(ans == true)
	 {
	    document.frmlist.mode.value="GMain";
		document.frmlist.submit();
	 }
   else
	 {
		document.frmlist.reset();
		return false;
	 }
 }

 function checkFeatured()
{
	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}

	var y=0; var ans;
	y = getCheckCount();

	if(y>0)
	{	ans = confirm("Confirm to Make Featured of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value="Featured";
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to Make Featured.");	return false;	}
}

function checkPending()
{
	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}

	var y=0; var ans;
	y = getCheckCount();

	if(y>0)
	{	ans = confirm("Confirm Pending Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value="Pending";
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to Make Pending.");	return false;	}
}
function checkSolved()
{
	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}

	var y=0; var ans;
	y = getCheckCount();

	if(y>0)
	{	ans = confirm("Confirm Solved Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value="Solved";
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to Make Solved.");	return false;	}
}
function checkDiscard()
{
	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}

	var y=0; var ans;
	y = getCheckCount();

	if(y>0)
	{	ans = confirm("Confirm Discard Status of Selected Record(s) ?");
		if(ans == true)
		{	document.frmlist.mode.value="Discard";
			document.frmlist.submit();		}
		else
		{	return false;	}
	}
	else
	{	alert("Please Select a Record(s) to Make Discard.");	return false;	}
}
function valid_search(actPath)
{
	var val;
	if (navigator.appName == "Microsoft Internet Explorer")
      val = window.event.keyCode;
   	else if (navigator.appName == "Navigator")
		   val = event.which;
   	else if (navigator.appName == "Mozilla")
       val = event.keyCode;
   	//else if (navigator.appName == "Netscape")
      // val = event.which;

	if(val==13)
	{
		if(Trim(document.frmlist.keyword.value)=="")
		{
			alert("Please Enter keyword for Search.");
			document.frmlist.keyword.value="";
			document.frmlist.keyword.focus();
			return false;
		}
		document.frmlist.keyword.value = Trim(document.frmlist.keyword.value);
		document.frmlist.mode.value="Search";
		if(actPath)
		{
			AjaxSearchListing("&option="+document.frmlist.option.value+"&keyword="+document.frmlist.keyword.value);
			//window.location=actPath +"&option="+document.frmlist.option.value+"&keyword="+document.frmlist.keyword.value;
			return false;
		}
	}
}
function valid_search_admin(actPath,button)
{
	var val;
	if (navigator.appName == "Microsoft Internet Explorer")
      val = window.event.keyCode;
   	else if (navigator.appName == "Navigator")
		val = event.which;
   	else if (navigator.appName == "Mozilla")
       val = event.keyCode;
   	else if (navigator.appName == "Netscape")
       val = event.which;

	if(val==13 || button =="Yes")
	{
		if(Trim(document.getElementById('keyword').value)=="")
		{
			alert("Please Enter keyword for Search.");
			document.getElementById('keyword').value="";
			document.getElementById('keyword').focus();
			return false;
		}
		document.getElementById('keyword').value = Trim(document.getElementById('keyword').value);
		if(actPath)
		{
			window.location=actPath +"&option="+document.getElementById('option').value+"&keyword="+document.getElementById('keyword').value+"&Type="+document.getElementById('eConfigType').value;
			return false;
		}
	}
}

/* Ajax functions */

function getCheckValue()
{
	var x=0;
	var str = '';
	for(i=0;i < document.frmlist.elements.length;i++)
	{
		if (document.frmlist.elements[i].id == 'iId' && document.frmlist.elements[i].checked == true)
		{
			var chname = document.frmlist.elements[i].name;
			str += "&"+chname+"="+document.frmlist.elements[i].value;
		}
	}
	return str;
}

function changeAjaxStatus(Status)
{
	if(eDemo == 'Yes')
	{
		alert('You are not allow to change any record');
		return false;
	}

	var y=0; var ans;
	y = getCheckCount();
	if(y>0)
	{
            if(ModuleName=='Company') {
	               if(Status=='Delete'){
                         ans = confirm("All related groups will be deleted if you delete this company.");
                        }else if(Status=='Active'){
                           ans = confirm("All related groups will be active if you active this company.");
                        }else if(Status=='Inactive'){
                           ans = confirm("All related groups will be inactive if you inactive this company.");
						}else{
                                ans = confirm("Confirm "+Status+" of Selected Record(s) ?");
                            }
                }else if(ModuleName=='Courses') {
	               if(Status=='Delete'){
                         ans = confirm("All related classes will be deleted if you delete this course.");
                        }else if(Status=='Active'){
                           ans = confirm("All related classes will be active if you active this course.");
                        }else if(Status=='Inactive'){
                           ans = confirm("All related classes will be inactive if you inactive this course.");
						}else{
                                ans = confirm("Confirm "+Status+" of Selected Record(s) ?");
                            }
                }else if(ModuleName=='Library'){
	               if(Status=='Delete'){
                         ans = confirm("All related documents will be deleted if you delete this library.");
                        }else if(Status=='Active'){
                           ans = confirm("All related documents will be active if you active this library.");
                        }else if(Status=='Inactive'){
                           ans = confirm("All related documents will be inactive if you inactive this library.");
						}else{
                                ans = confirm("Confirm "+Status+" of Selected Record(s)?");
                            }
                }else if(ModuleName=='VideoCategory'){
	               if(Status=='Delete'){
                         ans = confirm("All related videos will be deleted if you delete this video category.");
                        }else if(Status=='Active'){
                           ans = confirm("All related videos will be active if you active this video category.");
                        }else if(Status=='Inactive'){
                           ans = confirm("All related videos will be inactive if you inactive this video category.");
						}else{
                                ans = confirm("Confirm "+Status+" of Selected Record(s)?");
                            }
                }else if(ModuleName=='AudioCategory'){
	               if(Status=='Delete'){
                         ans = confirm("All related audio will be deleted if you delete this audio category.");
                        }else if(Status=='Active'){
                           ans = confirm("All related audio will be active if you active this audio category.");
                        }else if(Status=='Inactive'){
                           ans = confirm("All related audio will be inactive if you inactive this audio category.");
						}else{
                                ans = confirm("Confirm "+Status+" of Selected Record(s)?");
                            }
                }else{
					ans = confirm("Confirm "+Status+" of Selected Record(s) ?");
                }
//		alert(Status); return false;
		
		if(ans == true)
		{
			document.frmlist.mode.value=Status;
			AjaxPerfomAction();
		    //document.frmlist.submit();
		}else{
			return false;
		}
	}
	else
	{	alert("Please Select a Record(s) to "+Status+".");	return false;	}

}

function AjaxListing(extParam, listtype) {

	//$("#altInline").val().length > 0

	var extParameter = '';
	var listAjaxtype  = 'normal';
	if(!extParam || extParam=='undefined') extParam = '';
	if(!listtype || listtype=='undefined') listtype = '';

	if(extParam!='' && extParam!='undefined')
		extParameter = extParam;

	if(listtype!='' && listtype!='undefined')
		listAjaxtype = listtype;


    var extParameter = extParameter + $("input#extraReqParam").val();
    
	if(listAjaxtype=='normal')
	{
		if(document.getElementById("var_pgs"))
		{
			if($("textarea#var_pgs").val().length > 0){
				extParameter = extParameter+"&"+$("textarea#var_pgs").val();
			}
		}
	}

	var file = $("input#file").val();
       

	Ajax_URL = admin_url+"AjaxListing.php?file="+file+"&"+extParameter;
    //alert(Ajax_URL);
    /*
    $("#ajax-listing").load(Ajax_URL, function(){
        $('#ajax-listing').show('fast');
    });
    */
//debugger;
    setTimeout( function(){
        $.get(Ajax_URL, '', function(response) {
                $("#ajax-listing").html( response );
                $('#ajax-listing').show('fast');
        }  );

    }, 10 )



}
function AjaxAlphaListing(extParam)
{
	$("#keyword").val('') ;
	$("#var_msg").val('') ;
	closeMessage();
	AjaxListing(extParam,'AlphaSearch');


	/*
	var var_msg = $("textarea#var_msg").val();
	if(var_msg!=""){
		setMessage(var_msg);
	}
	*/
}
function AjaxPagingListing(extParam)
{
	AjaxListing(extParam,'Paging');
}
function AjaxRecListing(extParam)
{
	$("#var_msg").val('') ;
	closeMessage();
	AjaxListing(extParam,'RecLimit');
}
function AjaxSearchListing(extParam)
{
	AjaxListing(extParam,'Search');
}
function AjaxShowAllListing(extParam)
{
	$("#keyword").val('') ;
	$("#var_msg").val('') ;
	closeMessage();
	AjaxListing('','ShowAll');
}
function AjaxPerfomAction()
{
   // debugger;
	var file = $("input#file").val();
	var mode = $("input#mode").val();
	var no = $("input#no").val();
	var extParameter = '';

	/*
	var iId=$("#iId").val();
	var id_obj=$("#iId");
	id_obj.each( function(i){ alert(i) } );
	*/

	checked_str = getCheckValue();
	extParameter = checked_str;
	//alert(extParameter);
	if(document.getElementById("var_pgs"))
	{
		if($("textarea#var_pgs").val().length > 0){
			extParameter = extParameter+"&"+$("textarea#var_pgs").val();
		}
	}
	Ajax_URL = admin_url+"AjaxListing.php";

	//alert(Ajax_URL+"file="+file+"&mode="+mode+"&no="+no+""+extParameter)
	$.ajax({
		url: Ajax_URL,
		type: 'POST',
		//dataType: 'file="+file+"&"+extParameter',
		data:"file="+file+"&mode="+mode+"&no="+no+""+extParameter,
		error: function(){
			alert('Error loading XML document');
		},
		success: function(xml){
               
			setMessage(xml);
			//AjaxListing('', 'normal');
		//$("#ajax-listing").html(xml);
			//$('#ajax-listing').show('slow');
			// do something with xml
		}
	});
	AjaxListing('', 'normal');
	//setInterval("AjaxListing('', 'normal');",1000);
	//alert("here");
}
function setMessage(msg)
{
    $('#err_msg_cnt').html(msg);
    if($('#var_msg_cnt').css('display')=='none')
      $('#var_msg_cnt').slideDown();
} 
function AjaxListingAction(type , prival, inputid)
{
  //alert(type+" "+prival+" "+inputid);
	var file = $("input#file").val();
	var mode = $("input#mode").val();
	var no = $("input#no").val();
	var extParameter = '';

	if(type=='SetEventFeatured')
	{

	   var radiovalobj = document.frmlist[inputid];
	   var radioval = 'No';
	   for(var i=0; i<radiovalobj.length; i++)
	   {
       if(radiovalobj[i].checked)
      {
        radioval = radiovalobj[i].value;
      }
     }

	   extParameter = '&eFeatured='+radioval;
  }
	Ajax_URL = admin_url+"AjaxListing.php";
	$.ajax({
		url: Ajax_URL,
		type: 'POST',
		data:"file="+file+"&mode="+type+"&prival="+prival+extParameter,
		timeout: 1000,
		error: function(){
			alert('Error loading XML document');
		},
		success: function(xml){
			setMessage(xml);
		}
	});
}

function logintosite(id)
{
  var ans=confirm("Are you sure to login?");
  if(ans)
  {
    document.frmlist.mode.value="LoginToSite";
    document.frmlist.iSiteAdminId.value=id;
    //scripts/user/sitelogin_a.php
    document.frmlist.action='index.php?file=u-sitelogin_a';
    document.frmlist.submit();
  }
}

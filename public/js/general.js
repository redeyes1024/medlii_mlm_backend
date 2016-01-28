//
// getPageSize()
// Returns array with page width, height and window width, height
// Core code from - quirksmode.org
// Edit for Firefox by pHaez
//
function getPageSize(){
	
    var xScroll, yScroll;
	
    if (window.innerHeight && window.scrollMaxY) {	
        xScroll = document.body.scrollWidth;
        yScroll = window.innerHeight + window.scrollMaxY;
    } else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
        xScroll = document.body.scrollWidth;
        yScroll = document.body.scrollHeight;
    } else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
        xScroll = document.body.offsetWidth;
        yScroll = document.body.offsetHeight;
    }
	
    var windowWidth, windowHeight;
    if (self.innerHeight) {	// all except Explorer
        windowWidth = self.innerWidth;
        windowHeight = self.innerHeight;
    } else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
        windowWidth = document.documentElement.clientWidth;
        windowHeight = document.documentElement.clientHeight;
    } else if (document.body) { // other Explorers
        windowWidth = document.body.clientWidth;
        windowHeight = document.body.clientHeight;
    }	
	
    // for small pages with total height less then height of the viewport
    if(yScroll < windowHeight){
        pageHeight = windowHeight;
    } else { 
        pageHeight = yScroll;
    }

    // for small pages with total width less then width of the viewport
    if(xScroll < windowWidth){	
        pageWidth = windowWidth;
    } else {
        pageWidth = xScroll;
    }


    arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight) 
    return arrayPageSize;
}

function showSelectBoxes(){
    selects = document.getElementsByTagName("select");
    for (i = 0; i != selects.length; i++) {
        selects[i].style.visibility = "visible";
    }
}

// ---------------------------------------------------

function checkspace(events)
{
    var unicodes=events.charCode? events.charCode :events.keyCode	
    //alert(unicodes);

    if (unicodes!=8){ //if the key isn't the backspace key (which we should allow)
        if(unicodes == 32)
            return false;
        else
            return true;	 //disable key press
    }
}

function hideSelectBoxes(){
    selects = document.getElementsByTagName("select");
    for (i = 0; i != selects.length; i++) {
        selects[i].style.visibility = "hidden";
    }
}

function setSelectList(list_arr,selval)
{
    for(i=0;i<list_arr.length;i++)
    {
        if(list_arr[i].value == selval)
        {
            list_arr[i].selected=true;
            break;
        }
    }
}
function valid(actPath)
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
        window.location=actPath +"&option="+document.frmlist.option.value+"&keyword="+document.frmlist.keyword.value;
        return false;
    }
}

function RedirectURL(URL,ExtraParam)
{
    if(!ExtraParam)ExtraParam='';
    window.location=URL+ExtraParam;
    return false;
}

function alpha(value,length)
{
    chk1="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ- ";
    for(i=0;i<length;i++)
    {
        ch1=value.charAt(i);
        rtn1=chk1.indexOf(ch1);
        if(rtn1==-1)
            return false;
    }
    return true;
}
function alphanum(value,length)
{
  
    chk1="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_. ";
    for(i=0;i<value.length;i++)
    {
        ch1=value.charAt(i);
        rtn1=chk1.indexOf(ch1);
        if(rtn1==-1)
        {
            return false;
        }
			
    }
    return true;
}

function decimalNumber(value,length){
    chk1="1234567890.";
    for(i=0;i<length;i++)
    {
        ch1=value.charAt(i);
        rtn1=chk1.indexOf(ch1);
        if(rtn1==-1)
            return false;
    }
    return true;
}
function number(value,length){
    chk1="1234567890-";
    for(i=0;i<length;i++)
    {
        ch1=value.charAt(i);
        rtn1=chk1.indexOf(ch1);
        if(rtn1==-1)
            return false;
    }
    return true;
}
function onlynumber(value,length){
    chk1="1234567890";
    for(i=0;i<length;i++)
    {
        ch1=value.charAt(i);
        rtn1=chk1.indexOf(ch1);
        if(rtn1==-1)
            return false;
    }
    return true;
}

function OnlyAlphnumericValue(eve)
{
 	
    val = eve.keyCode;
    if(!val)
        val=eve.which;
		
    if(val > 47 && val < 58 || val > 64 && val < 91 || val > 96 && val < 123)
    {
        return true;
    }
    else if(val==9 || val==8) 
    {
        return true;
    }
    else
    {
        return false;
    }
}
function Trim(s) 
{
    return s.replace(/^\s+/g, '').replace(/\s+$/g, '');
}

function pollwin(url,w, h)
{
    pollwindow=window.open(url,'pollwindow','top=0,left=0,status=no,toolbars=no,scrollbars=no,width='+w+',height='+h+',maximize=no,resizable');
    pollwindow.focus();
}
function pollwin_livechat(url,w, h)
{
    pollwindow=window.open(url,'pollwindow','top=50,left=120,status=no,toolbars=no,scrollbars=Yes,width='+w+',height='+h+',maximize=no,resizable');
    pollwindow.focus();
}






// This code was written by Tyler Akins and has been placed in the
// public domain.  It would be nice if you left this header intact.
// Base64 code from Tyler Akins -- http://rumkin.com

var keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";

function encode64(input) {
    var output = "";
    var chr1, chr2, chr3;
    var enc1, enc2, enc3, enc4;
    var i = 0;

    do {
        chr1 = input.charCodeAt(i++);
        chr2 = input.charCodeAt(i++);
        chr3 = input.charCodeAt(i++);

        enc1 = chr1 >> 2;
        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
        enc4 = chr3 & 63;

        if (isNaN(chr2)) {
            enc3 = enc4 = 64;
        } else if (isNaN(chr3)) {
            enc4 = 64;
        }

        output = output + keyStr.charAt(enc1) + keyStr.charAt(enc2) + 
        keyStr.charAt(enc3) + keyStr.charAt(enc4);
    } while (i < input.length);
   
    return output;
}

function decode64(input) {
    var output = "";
    var chr1, chr2, chr3;
    var enc1, enc2, enc3, enc4;
    var i = 0;

    // remove all characters that are not A-Z, a-z, 0-9, +, /, or =
    input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

    do {
        enc1 = keyStr.indexOf(input.charAt(i++));
        enc2 = keyStr.indexOf(input.charAt(i++));
        enc3 = keyStr.indexOf(input.charAt(i++));
        enc4 = keyStr.indexOf(input.charAt(i++));

        chr1 = (enc1 << 2) | (enc2 >> 4);
        chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
        chr3 = ((enc3 & 3) << 6) | enc4;

        output = output + String.fromCharCode(chr1);

        if (enc3 != 64) {
            output = output + String.fromCharCode(chr2);
        }
        if (enc4 != 64) {
            output = output + String.fromCharCode(chr3);
        }
    } while (i < input.length);

    return output;
}

/* Added By chetan  
Purpose : Checking for obj availabe and Its Not Blank Value*/
function checkValidNull(obj, msg)
{
    if(obj)
    {
        if(Trim(obj.value)=="")
        {
            alert(msg);
            obj.focus();
            return false;
        }
    }
    else
        return false;	
    return true;	
}


function checkValidZero(obj, msg)
{
    if(obj)
    {
        if(Trim(obj.value)=="" || Trim(obj.value)=="0")
        {
            alert(msg);
            obj.focus();
            return false;
        }
    }
    else
        return false;	
    return true;	
}

/* It is compare the condition (equal,greater,less) 
Parameter : Objname,
comparision value
condition pass 'Equal', 'Greater','Less'
Alere Message to Dipslay
*/
function checkValidCompare(obj,comparewithvalue,condition, msg)
{
    if(obj)
    {
        val=obj.value;
        flag=false;
        if(condition=='Equal' && val==comparewithvalue)
            flag=true;
        if(condition=='Greater' && val >= comparewithvalue)
            flag=true;
        if(condition=='Less' && val< comparewithvalue)
            flag=true;
        if(condition=='LessEqual' && val<= comparewithvalue)
            flag=true;
		
        if(flag)
        {
            alert(msg);
            obj.focus();
            return false;
        }
        else
            return true;	
    }
    else
        return false;	
}

function checkValidLength(obj,len, msg)
{
    if(obj)
    {
        val=Trim(obj.value);
        if(val=="" || val.length<len )
        {
            alert(msg);
            obj.focus();
            return false;
        }
    }
    else
        return false;	
    return true;	
}
function checkValidNumber(obj, msg)
{
    chk1="1234567890";
    flag=false;
    if(obj)
    {
        value=obj.value;
        if(Trim(value)!="")
        {
            len=obj.value.length;
            //alert(len);
            for(i=0;i<len;i++)
            {
                ch1=value.charAt(i);
                rtn1=chk1.indexOf(ch1);
                if(rtn1==-1)
                    flag=true;
            }
        }
    }else{
        flag=true;
        msg='Object is not Avaible';
    }
    if(flag)
    {
        alert(msg);
        obj.focus();
        return false;
    }
    return true;
}
function checkValidFloatNumber(obj, msg)
{
    chk1="1234567890.";
    flag=false;
    if(obj)
    {
        value=obj.value;
        if(Trim(value)!="")
        {
            len=obj.value.length;
            //alert(len);
            for(i=0;i<len;i++)
            {
                ch1=value.charAt(i);
                rtn1=chk1.indexOf(ch1);
                if(rtn1==-1)
                    flag=true;
            }
        }else flag=true;
    }else{
        flag=true;
        msg='Object is not Avaible';
    }
    if(flag)
    {
        alert(msg);
        obj.focus();
        return false;
    }
    return true;
}

function checkKeyEventNumber()
{  
    val = event.keyCode;
    if(val==13)	return true;
    if(val<48)	event.keyCode=0;
    if(val>57)	event.keyCode=0;
    return true;
}
function checkKeyEventFloatNumber()
{  
	
	
    //alert(event+" "+navigator.appName);
    var val;
    if (navigator.appName == "Microsoft Internet Explorer")
        val = window.event.keyCode;
    else if (navigator.appName == "Navigator")
        val = event.which;
    else if (navigator.appName == "Mozilla")
        val = event.keyCode;
    else if (navigator.appName == "Netscape")
        val = event.which;

    //alert(val);
    //val = event.keyCode;
   
    if(val==13)		return true;
    if(val<48 && val!=46 && val!=43 && val!=45)
        event.keyCode=0;
    if(val>57)
        event.keyCode=0;
    return true;
}
function checkValidPhoneFormate(obj, msg)
{
    chk1="+.1234567890()- ";
    flag=false;
    if(obj)
    {
        value=obj.value;
        if(Trim(value)!="")
        {
            len=obj.value.length;
            for(i=0;i<len;i++)
            {
                ch1=value.charAt(i);
                rtn1=chk1.indexOf(ch1);
                if(rtn1==-1)
                    flag=true;
            }
        }
    }else{
        flag=true;
        msg='Object is not Avaible';
    }
    if(flag)
    {
        alert(msg);
        obj.focus();
        return false;
    }
    return true;
}
function openLoadingWindow(loadMsg)
{
    if(loadMsg)
        loadMsg += " Loading..." ;
    else
        loadMsg = "Loading...";
    winObj=window.open("",0,"menubar=no,resiable=no,width=320,height=10,top=50,left=50");
    //	winObj.document.write("<style>BODY {FONT-FAMILY: Arial, Helvetica, sans-serif; }</style><body bgcolor='#FDFCD9'><table width=100%><tr><Td align=center><h1>Loading....</h1></TD></tr></table></body>");
    winObj.document.write("<style>BODY {FONT-FAMILY: Arial, Helvetica, sans-serif; }</style><body bgcolor='#FDFCD9'><h1><span id='load_div'></span></h1><script type='text/javascript'>word=new String('"+loadMsg+"');i=0;function showMessage(){if(i>word.length)i=0;document.getElementById('load_div').innerHTML=word.substring(0,i);i++;window.setTimeout('showMessage()', 40);}showMessage();</script>");
    return winObj;
}
function closeLoadingWindow(winObj)
{
    winObj.close();
}
function getHTTPObject()
{
    // code for Mozilla, etc.
    if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest()
    }
    // code for IE
    else if (window.ActiveXObject)
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
    }
    return xmlhttp;
}
function Highlight(e)
{
    if(e.className!="raw_selectedbg")
        e.className="mouseover";
}
function UnHighlight(e,classname)
{
    //	alert(e.className)
    if(e.className!="raw_selectedbg")
        e.className=classname;
}
function openPopupPDFWindow(ImageName,ImagePath)
{
 
    window.location.href = admin_url+'popup_pdf.php?pid=1&amp;h=auto&amp;w=auto&amp;popup=1&vPDF='+ImageName+'&vPDFpath='+ImagePath,'','toolbar=no,resizable=yes,scrollbars=yes,width=150, height=600'; 
    return false;

}
function openPopupVideoWindow(ImageName,ImagePath)
{
    s=window.open(admin_url+'popup.php?pid=1&amp;h=auto&amp;w=auto&amp;popup=1&eType=video/quicktime&vImage='+ImageName+'&vImagepath='+ImagePath,'','toolbar=no,resizable=yes,scrollbars=yes,width=150, height=600'); 
    s.focus();
    return false;
}
function openPopupImageWindow(ImageName,ImagePath,folderpath)
{
    if(folderpath!="" && folderpath!=undefined){   
        s=window.open(folderpath+'popup.php?page=enlarge&pid=1&h=700&w=700&popup=1&vImage='+ImageName+'&vImagepath='+ImagePath,'enlarged_view','toolbar=no,resizable=yes,scrollbars=yes,width=700, height=700'); 
    }
    else
        s=window.open('popup.php?page=enlarge&pid=1&h=700&w=700&popup=1&vImage='+ImageName+'&vImagepath='+ImagePath,'enlarged_view','toolbar=no,resizable=yes,scrollbars=yes,width=700, height=700'); 
    s.focus();
    return false;
}  
function Delete_Image(tablename,fieldname,fieldid,value,Image)
{
    document.frmadd.mode.value='DeleteImage';
    //alert(tablename+" "+fieldname+" "+fieldid+" "+value);
    document.frmadd.TABLENAME.value=tablename;
    document.frmadd.FIELDNAME.value=fieldname;
    document.frmadd.FIELDID.value=fieldid;
    document.frmadd.FIELDVALUE.value=value;
    document.frmadd.IMAGEVALUE.value=Image;
    document.frmadd.submit();
}
/*	added by bhavin	23-jan-2006		*/

function checkObjectNull(obj, msg)
{
    if("undefined" != typeof(obj.type))// If multiple value then return error
    {
        typeVal = obj.type
    }
    else
    {
        typeVal = obj[0].type
    }
    switch(typeVal)
    {
        case "text":
            if(obj.value=="")
            {
                alert(msg);
                obj.focus();
                return false;
            }
            break;
        case "radio":
            var tot = obj.length;
            //				alert(tot);
            flag = 0;
            if(tot>0)// Return undefined if array of object 
            {
                for(i=0; i<tot ; i++)
                {
                    if(obj[i].checked)
                    {
                        flag=1;
                        break;
                    }
                }
            }
            else
            {
                if(obj.checked)
                    flag=1;
            }
            if(flag==0)
            {
                alert(msg);
                if(tot>=0) obj[0].focus();
                else obj.focus();
                return false;
            }
            break;
        case "checkbox":
            var tot = obj.length;
            //				alert(tot);
            flag = 0;
            if(tot>0)// Return undefined if array of object 
            {
                for(i=0; i<tot ; i++)
                {
                    if(obj[i].checked)
                    {
                        flag=1;
                        break;
                    }
                }
            }
            else
            {
                if(obj.checked)
                    flag=1;
            }
            if(flag==0)
            {
                alert(msg);
                if(tot>=0) obj[0].focus();
                else obj.focus();
                return false;
            }
            break;

        case "select-one":			
            if(obj.selectedIndex==0)
            {
                alert(msg);					
                obj.focus();
                return false;
            }
            break;
        case "textarea":
            if(obj.value=="")
            {
                alert(msg);
                obj.focus();
                return false;
            }
            break;
        case "file":
            if(obj.value=="")
            {
                alert(msg);
                obj.focus();
                return false;
            }			
            break;
    }
    return true;
}

function openWindow(destination,height, width) {
    var targetWindow = destination;
    var x = Math.random();
    x = x * 1000;
    x = Math.round(x);
    var wind = "window" + x
    temp = window.open(targetWindow, wind, config='height=' + height + ',width=' + width + ',toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no, directories=no,status=yes,left=50,top=50');
    return false;
}
/*	End Fucntion */	
function submenu(fval,tot,href)
{
    if(href){	
        window.location = href;
        return false;	
    }
    if(typeof(admin_image_url)!='undefined' && admin_image_url!="")
        image_tab_url = admin_image_url;
    else
        image_tab_url = 'images/';
    //alert(image_tab_url)
    if(document.getElementById('TabId'))
        document.getElementById('TabId').value=fval;
    if(document.getElementById('ListTabId1'))
        document.getElementById('ListTabId1').value=fval;
    for(i=1;i<=tot;i++){
        var sample="form"+i;
        //alert(fval + " --> " + i);
        if(parseInt(fval)==parseInt(i)){
            //alert(image_tab_url);
            if(document.getElementById(sample))
                document.getElementById(sample).style.display='inline';
            document.getElementById("form"+i+"td").style.backgroundImage = 'url('+image_tab_url+'tab_enable.gif)'; //image_tab_url + 'tab_enable.gif'
            document.getElementById("form"+i+"font").color = '#FFFFFF'			
            //alert(fval + " -- " + tot);
            if(fval==tot)
            {
                document.getElementById("form"+i+"tdright").style.backgroundImage = 'url('+image_tab_url+'tab_enable-right.gif)';//image_tab_url +  'tab_enable-right.gif' 
            }
            else
            {
                document.getElementById("form"+i+"tdright").style.backgroundImage = 'url('+image_tab_url+'tab_enable-right.gif)'; //image_tab_url +  'tab_enable-right.gif'
            }
        }
        else
        {
            if(document.getElementById("form"+i+"td").background != (image_tab_url + 'tab_disable.gif'))
            {
                //alert(document.getElementById("form"+i+"td"));
                if(document.getElementById(sample))
                    document.getElementById(sample).style.display='none';
                if(document.getElementById("form"+i+"td").background=="")
                    continue;
                document.getElementById("form"+i+"td").style.backgroundImage = 'url('+image_tab_url+'tab_disable.gif)'; //image_tab_url + 'tab_disable.gif';
                document.getElementById("form"+i+"tdright").style.backgroundImage = 'url('+image_tab_url+'tab_disable-right.gif)'; //image_tab_url + 'tab_disable-right.gif';
                document.getElementById("form"+i+"font").color = '#000000'				
            }
        }
    //alert(document.all(sample).style.display + " >> " + i);
    }
}

function DivShowToolTip(idstr,TooltipText)
{

    CTRL = document.getElementById(idstr);
    xval = findPosX(CTRL);
    yval = findPosY(CTRL);
    document.getElementById("tooltip").innerHTML = "<div onmousemove='JS_CALENDAR_FLAG=true;' onmouseout='JS_CALENDAR_FLAG=false;setTimeout(\"DivHideToolTip();\",1000);'><table cellpadding='0' border='0' cellspacing='0' width='100%'><tr><td class='tooltip-top'  >" + TooltipText  + "</td></tr><tr><td class='tooltip-bottom'  height='10px'></td></tr></table></div>";
    document.getElementById("tooltip").style.width = 200;
    document.getElementById("tooltip").style.top = parseInt(yval) + 9;
    document.getElementById("tooltip").style.left = parseInt(xval) + 11;
    document.getElementById("tooltip").style.visibility = "visible";	
}
function DivHideToolTip()
{
    if(!JS_CALENDAR_FLAG)
        document.getElementById("tooltip").style.visibility = "hidden";
}

function findPosX(obj)
{
    var curleft = 0;
    if (obj.offsetParent)
    {
        while (obj.offsetParent)
        {
            curleft += obj.offsetLeft
            obj = obj.offsetParent;
        }
    }
    else if (obj.x)
        curleft += obj.x;
    return curleft;
}
function checkValidFile(valid_ext,valu,validExtension)
{

    if(valid_ext == 'Yes')
    {
        var val1,vx;
        var giveAlert="Yes";
        var no;
        val1=valu.split(".");
        var splitvalu=validExtension;
        vx=splitvalu.split(",");
        no=parseInt((val1.length)-1);
        for(l=0;l<vx.length;l++)
        {
            if(val1[no].toUpperCase()==vx[l].toUpperCase())
            {
                giveAlert="No";
                break;
            }
        }
        if(giveAlert == "Yes")
        {
            alert("Please upload a file with one of the following valid extensions: " + validExtension + ".");
            return false;
        }
    }
    return true;
}

function findPosY(obj)
{
    var curtop = 0;
    if (obj.offsetParent)
    {
        while (obj.offsetParent)
        {
            curtop += obj.offsetTop
            obj = obj.offsetParent;
        }
    }
    else if (obj.y)
        curtop += obj.y;
    return curtop;
}


/*	ADP Front	*/

function MM_swapImgRestore() { //v3.0
    var i,x,a=document.MM_sr;
    for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
    var d=document;
    if(d.images){
        if(!d.MM_p) d.MM_p=new Array();
        var i,j=d.MM_p.length,a=MM_preloadImages.arguments;
        for(i=0; i<a.length; i++)
            if (a[i].indexOf("#")!=0){
                d.MM_p[j]=new Image;
                d.MM_p[j++].src=a[i];
            }
        }
}

function MM_findObj(n, d) { //v4.01
    var p,i,x;
    if(!d) d=document;
    if((p=n.indexOf("?"))>0&&parent.frames.length) {
        d=parent.frames[n.substring(p+1)].document;
        n=n.substring(0,p);
    }
    if(!(x=d[n])&&d.all) x=d.all[n];
    for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
    for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
    if(!x && d.getElementById) x=d.getElementById(n);
    return x;
}

function MM_swapImage() { //v3.0
    var i,j=0,x,a=MM_swapImage.arguments;
    document.MM_sr=new Array;
    for(i=0;i<(a.length-2);i+=3)
        if ((x=MM_findObj(a[i]))!=null){
            document.MM_sr[j++]=x;
            if(!x.oSrc) x.oSrc=x.src;
            x.src=a[i+2];
        }
}

function switchto(plink,val,extpr){
    if(extpr == 'Member')
        window.location=plink+'&iMemberId='+val;
    else if(extpr == 'ProductCollection')
        window.location=plink+'&iCollectionProductId='+val;
    else
        window.location=plink+'&iId='+val;
	
}
function openPopupImageWindow(ImageName,ImagePath)
{
    s=window.open(admin_url+'popup.php?page=enlarge&pid=1&amp;h=700&amp;w=700&amp;popup=1&vImage='+ImageName+'&vImagepath='+ImagePath,'enlarged_view','toolbar=no,resizable=yes,scrollbars=yes,width=700, height=700'); 
    s.focus();
    return false;
} 
function openPopupTextWindow(Text)
{
    var url=admin_url+'popup_text.php?page=enlarge&pid=1&amp;h=700&amp;w=700&amp;popup=1&text='+Text;
    //alert(url);
    s=window.open(url,'enlarged_view','toolbar=no,resizable=yes,scrollbars=yes,width=700, height=400'); 
    //	s.focus();
    return false;
}  
function Gen_OpenthickBox(fileurl,title,Extval,h,w)
{
    var u = fileurl+"&keepThis=true&TB_iframe=true&height="+h+"&width="+w;
    //alert(u);return false;
    var t = title;
    var g = null;
    TB_show(t, u, g);
    return false;
}
//Reset functionality with fck Editor Made By Suryakant
function setreset(frm,previous,current)
{
    frm.reset();
    var fck = FCKeditorAPI.GetInstance(current.name);
    fck.EditorDocument.body.innerHTML = previous.value;
    return false;
}
function WithFCK_Reset(frm,previous,current)
{
    frm.reset();
    var val=decode64(previous.value);
    var fck = FCKeditorAPI.GetInstance(current.name);
    fck.EditorDocument.body.innerHTML = val;
    return false;
}
//////////////////////////////////////////////////////////////////////////
//function to set feature in bma->hbpanel->user->member(module)
function checkfeature($id,$val)
{
    var url = admin_url+"scripts/ajax/ajax.php?id="+$id+"&val="+$val+"&operation=member_feature";
    // alert(url);
    var isWorking = false;
    if (!isWorking)
    {
        isWorking = true;
        if (window.XMLHttpRequest)
        {
            http_innerData=new XMLHttpRequest()
            http_innerData.open("GET",url, true);
            http_innerData.onreadystatechange=handleHttpResponse_Adminapprovefeature
            http_innerData.send(null)
        }
        // code for IE
        else if (window.ActiveXObject)
        {
            http_innerData=new ActiveXObject("Microsoft.XMLHTTP")
            if (http_innerData)
            {
                http_innerData.open("GET",url, true);
                http_innerData.onreadystatechange=handleHttpResponse_Adminapprovefeature
                http_innerData.send()
            }
        }
    }
}
function handleHttpResponse_Adminapprovefeature() 
{ 
    if (http_innerData.readyState == 4) 
    {
        isWorking = false;
        if (http_innerData.responseText.indexOf('invalid') == -1) 
        {
        //document.getElementById('placeholder').innerHTML=http_innerData.responseText;
        //alert(http_innerData.responseText);
        }
    }
}
function htmlspecialchars (string, quote_style, charset, double_encode) {
    // Convert special characters to HTML entities  
    // 
    // version: 1004.2314
    // discuss at: http://phpjs.org/functions/htmlspecialchars    // +   original by: Mirek Slugen
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Nathan
    // +   bugfixed by: Arno
    // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)    // +    bugfixed by: Brett Zamir (http://brett-zamir.me)
    // +      input by: Ratheous
    // +      input by: Mailfaker (http://www.weedem.fr/)
    // +      reimplemented by: Brett Zamir (http://brett-zamir.me)
    // +      input by: felix    // +    bugfixed by: Brett Zamir (http://brett-zamir.me)
    // %        note 1: charset argument not supported
    // *     example 1: htmlspecialchars("<a href='test'>Test</a>", 'ENT_QUOTES');
    // *     returns 1: '&lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;'
    // *     example 2: htmlspecialchars("ab\"c'd", ['ENT_NOQUOTES', 'ENT_QUOTES']);    // *     returns 2: 'ab"c&#039;d'
    // *     example 3: htmlspecialchars("my "&entity;" is still here", null, null, false);
    // *     returns 3: 'my &quot;&entity;&quot; is still here'
    var optTemp = 0, i = 0, noquotes= false;
    if (typeof quote_style === 'undefined' || quote_style === null) {
        quote_style = 2;
    }
    string = string.toString();
    if (double_encode !== false) { // Put this first to avoid double-encoding
        string = string.replace(/&/g, '&amp;');
    }
    string = string.replace(/</g, '&lt;').replace(/>/g, '&gt;');
 
    var OPTS = {
        'ENT_NOQUOTES': 0,        
        'ENT_HTML_QUOTE_SINGLE' : 1,
        'ENT_HTML_QUOTE_DOUBLE' : 2,
        'ENT_COMPAT': 2,
        'ENT_QUOTES': 3,
        'ENT_IGNORE' : 4
    };
    if (quote_style === 0) {
        noquotes = true;
    }
    if (typeof quote_style !== 'number') { // Allow for a single string or an array of string flags        quote_style = [].concat(quote_style);
        for (i=0; i < quote_style.length; i++) {
            // Resolve string input to bitwise e.g. 'PATHINFO_EXTENSION' becomes 4
            if (OPTS[quote_style[i]] === 0) {
                noquotes = true;
            }
            else if (OPTS[quote_style[i]]) {
                optTemp = optTemp | OPTS[quote_style[i]];
            }
        }
        quote_style = optTemp;
    }
    if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
        string = string.replace(/'/g, '&#039;');
    }
    if (!noquotes) {
        string = string.replace(/"/g, '&quot;');
    }
 
    return string;
}
    
function htmlspecialchars_decode (string, quote_style) {
    // Convert special HTML entities back to characters  
    // 
    // version: 1004.2314
    // discuss at: http://phpjs.org/functions/htmlspecialchars_decode    // +   original by: Mirek Slugen
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Mateusz "loonquawl" Zalega
    // +      input by: ReverseSyntax
    // +      input by: Slawomir Kaniecki    // +      input by: Scott Cariss
    // +      input by: Francois
    // +   bugfixed by: Onno Marsman
    // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Brett Zamir (http://brett-zamir.me)    // +      input by: Ratheous
    // +      input by: Mailfaker (http://www.weedem.fr/)
    // +      reimplemented by: Brett Zamir (http://brett-zamir.me)
    // +    bugfixed by: Brett Zamir (http://brett-zamir.me)
    // *     example 1: htmlspecialchars_decode("<p>this -&gt; &quot;</p>", 'ENT_NOQUOTES');    // *     returns 1: '<p>this -> &quot;</p>'
    // *     example 2: htmlspecialchars_decode("&amp;quot;");
    // *     returns 2: '&quot;'
    var optTemp = 0, i = 0, noquotes= false;
    if (typeof quote_style === 'undefined') {
        quote_style = 2;
    }
    string = string.toString().replace(/&lt;/g, '<').replace(/&gt;/g, '>');
    var OPTS = {
        'ENT_NOQUOTES': 0,        
        'ENT_HTML_QUOTE_SINGLE' : 1,
        'ENT_HTML_QUOTE_DOUBLE' : 2,
        'ENT_COMPAT': 2,
        'ENT_QUOTES': 3,
        'ENT_IGNORE' : 4
    };
    if (quote_style === 0) {
        noquotes = true;
    }
    if (typeof quote_style !== 'number') { // Allow for a single string or an array of string flags        quote_style = [].concat(quote_style);
        for (i=0; i < quote_style.length; i++) {
            // Resolve string input to bitwise e.g. 'PATHINFO_EXTENSION' becomes 4
            if (OPTS[quote_style[i]] === 0) {
                noquotes = true;
            }
            else if (OPTS[quote_style[i]]) {
                optTemp = optTemp | OPTS[quote_style[i]];
            }
        }
        quote_style = optTemp;
    }
    if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
        string = string.replace(/&#0*39;/g, "'"); // PHP doesn't currently escape if more than one 0, but it should
    // string = string.replace(/&apos;|&#x0*27;/g, "'"); // This would also be useful here, but not a part of PHP
    }
    if (!noquotes) {
        string = string.replace(/&quot;/g, '"');
    }
    // Put this in last place to avoid escape being double-decoded    string = string.replace(/&amp;/g, '&');
 
    return string;

}
function stripHTML(val){
    var re= /<\S[^><]*>/g
    return str = val.replace(re, "");
}
//////////////function for remove space like(&nbsp;) in ckeditor////////////////
function stripspace(val)
{
    //alert(val);
    var value = stripHTML(jQuery.trim(val));
    return str = value.replace(/^[\s(&nbsp;)]+/g,'').replace(/[\s(&nbsp;)]+$/g,'');
}



//////////////////////////////////////////////////////////////////////////////////////////////////

<?php  
if($_SESSION['sess_auth']['sess_iMemberId'] == "")
{
	if($params['pass']['0']!=$_SESSION['sess_auth']['enc_iMemberId'])
	{
		$msg = "You are not authorised to view this page.";
		$GeneralObj->setError_Message($msg,'logout-msg','login_err_id');
		http_redirects($site_url."content/register/");
	}
	else
	{
		$msg = "You are not authorised to view this page.";
		$GeneralObj->setError_Message($msg,'logout-msg','login_err_id');
		http_redirects($site_url."content/register/");
	}
}
else
{
	if($params['pass']['0']!='')
	{
		if($params['pass']['0']!=$_SESSION['sess_auth']['enc_iMemberId'])
		{
			$msg = "You are not authorised to view this page.";
			$GeneralObj->setError_Message($msg,'logout-msg','login_err_id');
			http_redirects($site_url."content/register/");
		}
	}
}

if($params['module']=="content")
{
	$msg = "You are not authorised to view this page.";
	$GeneralObj->setError_Message($msg,'logout-msg','login_err_id');
	http_redirects($site_url);
}
?>

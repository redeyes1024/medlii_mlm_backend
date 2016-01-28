<?php
/*
 * @package  Paging
* @version  1.0 beta
* @Last changed:   May 03 2008
* PHP 5
* @Created By : Cyrus Dev <cyrus_dev@hotmail.com>
**/

class InnerPaging
{
	var  $page_limit;	//set page limit
	var  $rec_limit;	//set rec limit per page
	var  $totrec;		//tot record for paging
	var  $totpages;		//total pages to display
	var  $start;
	var  $page_string;
	var  $var_limit;
	var  $ajax;
	var  $ajax_func;
	var  $ajax_url;
	var  $ajax_resp;

	/**
	 *@ intiliaze paging class & vars
	 *@ no return values
	 */

	public function __construct($tot_rec, $page_limit='5', $rec_limit='6')
	{
		//intiailaze variables here & methods

		$this->page_limit = $page_limit;
		$this->rec_limit = $rec_limit;	//set rec limit per page
		$this->setStart();				//set start
		$this->setTotalRecord($tot_rec);		//set total record
		//$this->setRecordLimit();				//set record limit
		//$this->setPageLimit();					//set total page limit
		$this->setTotalPages($tot_rec);			//set total pages


	}

	/**
	 *@ private set start from
	 *@ return start value
	 */

	public function setStart()
	{
		$start = $_REQUEST['page'];
		if($start == '')
			return $this->start = 1;
		else
			return $this->start = $start;
	}

	/**
	 *@ private set total record
	 *@ return total record
	 */

	public function setTotalRecord($tot_rec)
	{
		if($tot_rec == "")
			return $this->totRec = 0;
		else
			return $this->totRec = $tot_rec;
	}

	/**
	 *@ private set total record limit per page
	 *@ return total record limit per page
	 */

	public function setRecordLimit()
	{
		global 	$USER_REC_LIMIT;
		if($this->rec_limit=="")
			$this->rec_limit = $USER_REC_LIMIT;
		return $this->rec_limit;
	}

	/**
	 *@ private set totapages of listing
	 *@ return total pages
	 */

	public function setTotalPages($tot_rec){
		return $this->totPages = ceil($this->totRec/$this->rec_limit);

	}

	/**
	 *@ private set pagelimit
	 *@ return page limit
	 */

	public function setPageLimit(){
		global 	$USER_PAGE_LIMIT;
		$USER_PAGE_LIMIT=5;
		if($this->page_limit=="")
			$this->page_limit = $USER_PAGE_LIMIT;
		return $this->page_limit;
	}


	/**
	 *@ public set setvarlimit
	 *@ return var_limit
	 */

	public function setVarlimit()
	{
		if($this->start != 0)
		{
			$num_limit = ($this->start-1)*$this->rec_limit;
			$this->var_limit = " LIMIT $num_limit, ".$this->rec_limit."";
		}
		else
		{
			$this->var_limit = " LIMIT 0, ".$this->rec_limit."";
		}
		return $this->var_limit;
	}

	/**
	 *@ public display paging
	 *@ return paging string
	 */

	public function displayPaging()
	{
		global 	$sitefolder;
		//page string
		$this->page_string = "";
		if($this->totPages!=0)
			$this->page_string = "<strong>PAGE&nbsp;&nbsp;&nbsp;&nbsp;</strong>";
		//page limit;
		$page_limit = $this->page_limit;

		//total pages
		$tot_pages = $this->totPages;

		//loop limit
		$loop_limit = (($page_limit > $tot_pages) ? $tot_pages : $page_limit) ;

		//starting loop
		$start_loop = floor($this->start/$page_limit);

		//calculate start loop
		if($start_loop != ($this->start/$page_limit))
			$start_loop = $start_loop * $page_limit+1;
		else
			$start_loop = ($start_loop-1) * $page_limit+1;


		//pages link to set
		$REQUEST_URI = $_SERVER['REQUEST_URI'];

		$prevlink = $this->replaceUrl($REQUEST_URI,'page',$this->start-1);
		//echo "<hr>";
		$nextlink = $this->replaceUrl($REQUEST_URI,'page',$this->start+1);

		if($start_loop > $page_limit)
		{
			$prev_loop = $start_loop - 1;
			if($this->ajax==true)
				$this->page_string.='<a href="javascript:;" onclick="'.$prevlink.'" class="paginglink" title="Previous"><b>Previous</b></a>';
			else
				$this->page_string.="<a href='".$prevlink."' class='paginglink' title='Previous'><b>Previous</b></a>";
		}

		for($loop=1 ; $loop<=$loop_limit ; $loop++)
		{
			$pagelink = $this->replaceUrl($REQUEST_URI,'page',$start_loop);
			if($start_loop > $tot_pages) break;
			if($start_loop == $this->start)
				$this->page_string.="<span class='paging-active' ><b>".$start_loop."</b></span>";
			else
			{
				if($this->ajax==true)
					$this->page_string.='<a href="javascript:;" onclick="'.$pagelink.'" class="paginglink" title="'.$start_loop.'"><b>'.$start_loop.'</b></a>';
				else
					$this->page_string.="<a href='".$pagelink."' title=\"".$start_loop."\" class='paginglink' ><b>".$start_loop."</b></a>";
			}
			$start_loop++;
		}

		if($start_loop<=$tot_pages)
		{
			if($this->ajax==true)
				$this->page_string.='<a href="javascript:;" onclick="'.$nextlink.'" class="paginglink" title="Next"><b>Next</b></a>';
			else
				$this->page_string.="<a href='".$nextlink."'; class='paginglink' title='Next'><b>Next</b></a>";
		}
		return $this->page_string;
	}


	/**
	 *@ public display paging message
	 *@ return paging message
	 */
	public function setMessage($msg='')
	{
		$rec_limit = $this->rec_limit;
		$num_limit = ($this->start-1)*$rec_limit;
		$startrec = $num_limit;
		$lastrec = $startrec + $rec_limit;
		$startrec = $startrec + 1;
		if($lastrec > $this->totRec)
			$lastrec = $this->totRec;
		if($this->totRec > 0 ){
			return $recmsg = " Showing ".$startrec." - ".$lastrec." ".strtolower($msg)." out of ".$this->totRec;
		}else{
			return $recmsg="No ".strtolower($msg)." found";
		}
	}

	/**
	 *@ public change of variable from url
	 *@ return new url
	 */

	public function replaceUrl($url,$uKey,$uVal)
	{
		global $module,$script,$site_url;
		if($this->ajax==true)
		{
			//echo $url."<hr>".$module;
			$Qurl = explode("?",$url);
			$arr = explode("&",$Qurl[1]);
			$r = ''; $set = 0;

			foreach($_REQUEST as $key => $val)
			{
				if(is_array($val))
				{
					foreach($val as $k => $v)
					{
						$r.="'".$key."[".$k."]':'".$v."',";
					}
				}
				else
				{
					if($key=="PHPSESSID")
						continue;
					if($key == $uKey){
						$val = $uVal;
						$set = 1;
					}
					$r.="'".$key."':'".$val."',";
				}
			}
			if($set == 0){
				$r.= "'".$uKey."':'".$uVal."',";
			} else {
				$r = rtrim($r, ",");
			}
			$r = rtrim($r, ",");
			if($module!="ajax_file")
			{
				$module=="ajax_file";
			}
			//if($script==$this->ajax_url)
			{
				$qurl="'".$site_url."ajax_file/".$this->ajax_url."/'";
			}
			$str_func = "javascript:$.post(".$qurl.",{".$r."}";
			$str_func .=", function(data){ $('#".$this->ajax_resp."').html(data); });";
			return $str_func;
		}
		else
		{
			$Qurl = explode("?",$url);
			$arr = explode("&",$Qurl[1]);
			$r = ''; $set = 0;
			for($i=0;$i<sizeof($arr);$i++)
			{
				$arr2 = explode("=",$arr[$i]);
				if($arr2[0] == $uKey){
					$arr2[1] = $uVal;
					$set = 1;
				}
				$r.=$arr2[0]."=".$arr2[1]."&";
			}
			if($set == 0){
				$r.= $uKey."=".$uVal;
			} else {
				$r = rtrim($r, "&");
			}
			return $Qurl[0].'?'.$r;
		}
	}

}



?>

<?php
class Cache
{
	function __construct()
	{
		$this->_CacheFileUrls = array();
		$this->_PAGE = '';
		$this->_CacheFileName = '';
		$this->_CacheEXT = 'cache';
		$this->_CacheDir = 'cache_script/';
	}
	function setCacheFileURLs($URLs, $Time, $extra)
	{
		$this->_CacheFileUrls[] = array($URLs, $Time, $extra);
	}

	function setCachePage($PAGE)
	{
		$this->_PAGE = $PAGE;
	}

	function setCacheFileName($CacheFileName)
	{
		global $site_path;
		$this->_CacheFileName = $site_path.$this->_CacheDir.$CacheFileName;
	}

	function getCacheFileExt()
	{
		return $this->_CacheEXT;
	}

	function getCachePage()
	{
		return $this->_PAGE;
	}

	function getCacheFileURLs()
	{
		return $this->_CacheFileUrls;
	}

	function ReadCacheFile($file)
	{
		$CacheFileUrls = $this->_CacheFileUrls;
		for ($i = 0; $i < count($CacheFileUrls); $i++)
		{
			if(($CacheFileUrls[$i][2] == '0' && strpos($this->_PAGE, $CacheFileUrls[$i][0]) !== false) || $CacheFileUrls[$i][2] == '1' && $this->_PAGE == $CacheFileUrls[$i][0])
			{
				$this->_CacheFileCreated = (@file_exists($this->_CacheFileName) ) ? @filemtime($this->_CacheFileName) : 0;
				// Show file from cache if still valid
				$this->_CacheTime = $CacheFileUrls[$i][1];
				if (time() - $this->_CacheTime < $this->_CacheFileCreated)
				{
					@readfile($this->_CacheFileName);
					#ob_end_flush();
					exit();
				}
			}
		}
	}


	function WriteCacheFile()
	{
		$CacheFileUrls = $this->_CacheFileUrls;
		for ($i = 0; $i < count($CacheFileUrls); $i++)
		{
			#if(strpos($this->_PAGE, $CacheFileUrls[$i][0]) !== false)
			if(($CacheFileUrls[$i][2] == '0' && strpos($this->_PAGE, $CacheFileUrls[$i][0]) !== false) || $CacheFileUrls[$i][2] == '1' && $this->_PAGE == $CacheFileUrls[$i][0])
			{
				// Now the script has run, generate a new cache file
				$fp = fopen($this->_CacheFileName, 'w');
				// save the contents of output buffer to the file

				fwrite($fp, ob_get_contents());
				@fclose($fp);
				ob_end_flush();
			}
		}
	}

	function DeleteCacheFiles()
	{
		// Directory to cache files in (keep outside web root)
		if ($handle = @opendir($this->_CacheDir)) {
			while (false !== ($file = @readdir($handle))) {
				if ($file != '.' and $file != '..') {
					echo $file . ' deleted.<br>';
					@unlink($this->_CacheDir . '/' . $file);
				}
			}
			@closedir($handle);
		}
	}

}
?>
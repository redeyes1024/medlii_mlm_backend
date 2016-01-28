<?

class Validate
{
	private $value=NULL;
	private $errormsg=array();
	private $errocode=NULL;
	private $vtype=NULL;


	public function __construct()
	{
		$this->errormsg['BLANK_NOT_ALLOWED']='Blank value is not allowed';
		$this->errormsg['ONLY_NUMERIC']='Only intiger number allowed';
		$this->errormsg['ONLY_ALPHA_NUMERIC']='Only alpha numeric allowed';
		$this->errormsg['INVALID_EMAIL']='Email address is invalid';
		$this->errormsg['INVALID_PHONE']='Phone number is invalide';
		$this->errormsg['MIN_CHARS']='Minimum %s charcters required';
		$this->errormsg['MAX_CHARS']='Maximum %s charcters allowed';
		$this->errormsg['EQUAL_TO']='Not matched';

	}
	public function __destruct()
	{
		#echo '<br>Destruct is called';
	}

	public function setErrorCode($val)
	{
		$this->errocode=$val;
	}
	public function setValue($val)
	{
		$this->value=$val;
	}
	public function getValue()
	{
		return $this->value;
	}

	public function getErrorCode()
	{
		return $this->errocode;
	}
	public function getErrorMessage()
	{
		return  $this->errormsg[$this->errocode];
	}

	function checkNull()
	{
		$val=trim($this->value);
		if($val==NULL || $val=='')
			$this->setErrorCode('BLANK_NOT_ALLOWED');
	}

	function checkNumeric()
	{
		$val=$this->getValue();
		$pattern='/^\d{0,}$/';
		$match=preg_match($pattern, $val, $matches );
		if(!$match)
			$this->setErrorCode('ONLY_NUMERIC');
	}
	function checkAlphaNumeric()
	{
		$val=$this->getValue();
		$pattern='/^\w{0,}$/';
		$match=preg_match($pattern, $val, $matches );
		if(!$match)
			$this->setErrorCode('ONLY_ALPHA_NUMERIC');
	}

	function checkMinChars()
	{
		$val=$this->getValue();
		if(strlen($val) < $this->min  ) {
			$this->setErrorCode('MIN_CHARS');
		}
	}

	function checkMaxChars()
	{
		$val=$this->getValue();
		if(strlen($val) > $this->max  ) {
			$this->setErrorCode('MAX_CHARS');
		}
	}

	function checkEmail()
	{
		$val=$this->getValue();
		if(!$this->validEmail($val))
			$this->setErrorCode('INVALID_EMAIL');
	}
	function resetVariables()
	{
		$this->setErrorCode('');
	}

	public function setMin($val) {
		$this->min = $val;
	}

	public function setMax($val) {
		$this->max = $val;
	}

	public function equalTo($val) {
		if($this->getValue() != $val) {
			$this->setErrorCode('EQUAL_TO');
		}
	}
	// argument >> array  must be in array[]=array('value', 'type', 'message')
	// value ='test';
	// type ='A' =>alpha numeric, E=email, N=numeric, B=blanck(Not Null And Not blanck)
	// message =>if not passed than return default messages as defined in $this->errormsg array
	function validateValArray($array)
	{
		$errorMessageArray='';
		for($i=0,$ni=count($array); $i<$ni; $i++)
		{
			$value=trim($array[$i]['value']);
			$type=$array[$i]['type'];
			$message=$array[$i]['message'];
			$min = $array[$i]['min'];
			$max = $array[$i]['max'];
			$equalTo = $array[$i]['equalto'];
			$errorCode='';

			$this->setValue($value);
			$this->setMin($min);
			$this->setMax($max);

			$msgcode = $type;

			if($type=='A')
			{
				$this->checkAlphaNumeric();
				$errorCode=$this->getErrorCode();

			}
			else if($type=='E')
			{
				$this->checkEmail();
				$errorCode=$this->getErrorCode();

			}
			else if($type=='N')
			{
				$this->checkNumeric();
				$errorCode=$this->getErrorCode();
			}
			else if($type=='B')
			{
				$this->checkNull();
				$errorCode=$this->getErrorCode();
			}
			else
			{
				continue;
			}

			if ($errorCode == '') {
				if ($min) {
					$this->checkMinChars();
					$errorCode = $this->getErrorCode();
					$msgcode = 'min';
				}
				if ($max && $errorCode == '') {
					$this->checkMaxChars();
					$errorCode=$this->getErrorCode();
					$msgcode = 'max';
				}

				if($equalTo) {
					$this->equalTo($equalTo);
					$errorCode=$this->getErrorCode();
					$msgcode = 'equalto';
				}
			}

			if($errorCode)
			{
				if($message[$msgcode] == '')
					$msg=$this->getErrorMessage();
				else
					$msg = $message[$msgcode];
				$errorMessageArray[]=$msg;
			}
			$this->resetVariables();
		}

		if( count($errorMessageArray)>0 && is_array($errorMessageArray) )
			return implode('<br>', $errorMessageArray);
		else
			return '';
	}

	public function validEmail($email)
	{
		$isValid = true;
		$atIndex = strrpos($email, "@");
		if (is_bool($atIndex) && !$atIndex)
		{
			$isValid = false;
		}
		else
		{
			$domain = substr($email, $atIndex+1);
			$local = substr($email, 0, $atIndex);
			$localLen = strlen($local);
			$domainLen = strlen($domain);
			if ($localLen < 1 || $localLen > 64)
			{
				// local part length exceeded
				$isValid = false;
			}
			else if ($domainLen < 1 || $domainLen > 255)
			{
				// domain part length exceeded
				$isValid = false;
			}
			else if ($local[0] == '.' || $local[$localLen-1] == '.')
			{
				// local part starts or ends with '.'
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $local))
			{
				// local part has two consecutive dots
				$isValid = false;
			}
			else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
			{
				// character not valid in domain part
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $domain))
			{
				// domain part has two consecutive dots
				$isValid = false;
			}
			else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local)))
			{
				// character not valid in local part unless
				// local part is quoted
				if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local)))
				{
					$isValid = false;
				}
			}
			if ($isValid && !(checkdnsrr($domain,"MX") ||  checkdnsrr($domain,"A")))
			{
				// domain not found in DNS
				$isValid = false;
			}
		}
		return $isValid;
	}
}

?>

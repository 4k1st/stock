<?
	class Template
	{
		var $values=array();
		var $html;
		
		function getTpl($tplName)
		{
			if(empty($tplName)||!file_exists($tplName))
			{
				return false;
			}else{
				$this->html=file_get_contents($tplName);//join('',file($tplName));
			}
		}
		
		function setValue($key,$var)
		{
			$key='[:'.$key.']';
			$this->values[$key]=$var;
		}
		
		function tplParse()
		{
			foreach($this->values as $find =>$replace)
			{
				$this->html=str_replace($find,$replace,$this->html);
			}
		}
	}
	$tpl= new Template;
?>
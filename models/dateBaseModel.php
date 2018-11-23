<?php
class models_dateBaseModel 
{
	private static $instance;
	
	public static function getInstance() 
	{
		if (!is_object(self::$instance)) self::$instance = new self;
		return self::$instance;    
	}
		 
	function query($query)
	{
		if(($num_args = func_num_args()) > 1)
		{
			$arg  = func_get_args();
			unset($arg[0]);		
			foreach($arg as $argument=>$value){
				$arg[$argument]=mysqli_real_escape_string(mysqli_connect(HOST, USER, PASSWORD, NAME_BD),$value); }
			$query = vsprintf($query,$arg);	
		}

		$sql = mysqli_query(mysqli_connect(HOST, USER, PASSWORD, NAME_BD), $query);	
		if(preg_match('`^(INSERT|UPDATE|DELETE|REPLACE)`i',$query,$null))
		{
			if($this->affected_rows($sql))
			{
					return $sql;
			}		
		}
		else
		{
			if($this->num_rows($sql))
			{
				return $sql;
			}
		}
		return false;	
	}

	function build_query($query,$array,$_devide = ',')
	{
		if(is_array($array))
		{
			$part_query = '';
			foreach($array as $index=>$value)
			{
				$part_query .= sprintf(" `%s` = '%s'".$_devide,$index,mysqli_real_escape_string(mysqli_connect(HOST, USER, PASSWORD, NAME_BD),$value));
			}
			$part_query = trim($part_query,$_devide);
			$query.=$part_query;
			return $this->query($query);
		}
		return false;
	}

	function build_part_query($array,$_devide = ',')
	{
		$part_query="";
		if(is_array($array))
		{
			$part_query = '';
			foreach($array as $index=>$value)
			{
				$part_query .= sprintf(" `%s` = '%s'".$_devide,$index,mysqli_real_escape_string(mysqli_connect(HOST, USER, PASSWORD, NAME_BD),$value));
			}
			$part_query = trim($part_query,$_devide);
		}
		return $part_query;
	}

	function fetch_object($object)
	{
		return @mysqli_fetch_object($object);
	}

	function num_rows($object)
	{
		return @mysqli_num_rows($object);
	}
	 
	function affected_rows($object)
	{
		return mysqli_affected_rows(mysqli_connect(HOST, USER, PASSWORD, NAME_BD));
	}

	function fetch_assoc($object)
	{
		return mysqli_fetch_assoc($object);
	}

	function insert_id()
	{
		return mysqli_insert_id(mysqli_connect(HOST, USER, PASSWORD, NAME_BD));
	}	
}
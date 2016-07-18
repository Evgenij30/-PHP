<?
	
	class Db
	{	
		public $link;
		function __construct()
		{
			$this->link = mysqli_connect(HOST, USER, DB_PASSWD, DB_NAME); 
			if (!$this->link) {
				echo "Ошибка соединения с базой";
				die();
			}
		}
		
		function __destruct(){
			mysqli_close($this->link);
		}
	}
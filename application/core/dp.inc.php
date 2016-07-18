<?

class Db 
{
  public $link;

  public function __construct($host, $name,$passwd,$user){

   $this->link=mysqli_connect($host, $name,$passwd,$user);

  }

}

$db = new Db (HOST,HOST_LOGIN,HOST_PASSWD,HOST_BASE);
if (!$db->link){
   echo "Нет соедениение с базой данных";
	die();
}


<?php

class Model_Admin extends Model
{

	 public function UserAuth() {
    
	 	if (!$_SESSION['login_admin']){
	 		header('Refresh:0; url=/authorization'); 
	 	}
	 }
}
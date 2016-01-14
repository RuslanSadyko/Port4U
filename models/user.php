<?php

class User extends Model {

    public function getByLogin( $login ){
        $login = $this->db->escape( $login );
        $sql = "SELECT * FROM `users` WHERE `login` = '{$login}' LIMIT 1";
        $result = $this->db->query( $sql );
        if ( isset($result[0]) ){
            return $result[0];
        }
        return false;
    }
	
	public function regUser( $data){
		
		$name1 = $this->db->escape( $data['name1'] ); 
		$name2 = $this->db->escape( $data['name2'] ); 
		$login = $this->db->escape( $data['login'] ); 
		$email = $this->db->escape( $data['email'] ); 
		$phone = $this->db->escape( $data['phone'] );
		$password = md5 ( Config::get('salt').$data['password'] );
		
		$sql = "INSERT INTO `users` 
						SET		`name1` = '{$name1}',
								`name2` = '{$name2}',
								`login` = '{$login}',
								`email` = '{$email}',
								`phone` = '{$phone}',
								`password` = '{$password}'
					";
		return $this->db->query( $sql);
	}

}
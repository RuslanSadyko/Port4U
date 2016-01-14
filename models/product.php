<?php

	class Product extends Model{
		
		 public function getList($category = null){
			if( isset($_GET['category']) ){
				$category = $_GET['category'];
				switch($category){
					case 'notebooks': $sql="SELECT * FROM `goods` WHERE `category` = 'Notebooks'"; break;
					case 'smartphones': $sql="SELECT * FROM `goods` WHERE `category` = 'Smartphones'"; break;
				}
			}
			else {
				$sql = "SELECT * FROM `goods` WHERE 1";
			}
			return $this->db->query($sql);
		}
		
		public function getById($id){
        $id = (int)$id;
        $sql = "SELECT * FROM `goods` WHERE `id` = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

		public function save($data, $id = null){
			if ( !isset($data['category']) || !isset($data['brand']) || !isset($data['model']) || !isset($data['shot_name']) 
				|| !isset($data['foto']) || !isset($data['model']) || !isset($data['describe']) ){
				return false;
			}

			$id = (int)$id;
			$category = $this->db->escape($data['category']);
			$brand = $this->db->escape($data['brand']);
			$model = $this->db->escape($data['model']);
			$shot_name = $this->db->escape($data['shot_name']);
			$foto = $this->db->escape($data['foto']);
			$describe = $this->db->escape($data['describe']);
		

			if ( !$id ){
				$sql = "INSERT INTO `goods`
							SET 	`category` = '{$category}',
									`brand` = '{$brand}',
									`model` = '{$model}',
									`shot_name` = '{$shot_name}',
									`foto` = '{$foto}',
									`describe` = '{$describe}'";
			} else {
				$sql = "UPDATE `goods`
							SET 	`category` = '{$category}',
									`brand` = '{$brand}',
									`model` = '{$model}',
									`shot_name` = '{$shot_name}',
									`foto` = '{$foto}',
									`describe` = '{$describe}'
							WHERE `id` = {$id}";
			}

			return $this->db->query($sql);
		}

		public function delete($id){
			$id = (int)$id;
			$sql = "DELETE FROM `product` WHERE `id` = '{$id}'";
			return $this->db->query($sql);
		}
		
		public function getByCategory($category){
			$sql = "SELECT * FROM `goods` WHERE `category` = '{$category}'";
			return $this->db->query($sql);
			
		}
		
		public function getByDate(){
			$sql="SELECT * FROM `goods` ORDER BY `date_add` DESC LIMIT 3 ";
			return $this->db->query($sql);
		}

	}
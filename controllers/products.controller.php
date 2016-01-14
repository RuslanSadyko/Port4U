<?php

	class ProductsController extends Controller{
		
		public function __construct( $data = array() ){
			parent::__construct($data);
			$this->model = new Product();
		}
		
		public function index(){
			$this->data['goods'] = $this->model->getList();
		}
		
		public function admin_index(){
			$this->data['goods'] = $this->model->getList();
		}
		
		public function admin_add(){
			if ( $_POST ){
				$result = $this->model->save($_POST);
				if ( $result ){
					Session::setFlash('Product was added.');
				} else {
					Session::setFlash('Error.');
				}
				Router::redirect('/admin/products/');
			}
		}
		
		public function admin_edit(){
			if ( $_POST ){
				$id = isset($_POST['id']) ? $_POST['id'] : null;
				$result = $this->model->save($_POST, $id);
				if ( $result ){
					Session::setFlash('Product was saved.');
				}else {
					Session::setFlash('Error.');
				}
				Router::redirect('/admin/products/');
			}

			if ( isset($this->params[0]) ){
				$this->data['product'] = $this->model->getById($this->params[0]);
			} else {
				Session::setFlash('Wrong page id.');
				Router::redirect('/admin/products/');
			}
		}
	
		public function notebooks(){
			$this->data['goods'] = $this->model->getByCategory('Notebooks');
		}
		
		public function view(){
			$params = App::getRouter()->getParams();
				if ( isset($params[0]) ){
				$id = strtolower($params[0]);
				$this->data['product'] = $this->model->getById($id);
			}
    }
	}
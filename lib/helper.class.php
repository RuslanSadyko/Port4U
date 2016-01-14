<?php

class Helper{
		public static $router;
	
	
	public static $items = array(
		array(
            'title' => 'Home',
            'url' => '/pages/',
            'active_class' => 'pages',
        ),
		array(
            'title' => 'Products',
            'url' => '/products/',
            'active_class' => 'products',
        ),
		array(
			'title' => 'Contact Us',
			'url' => '/contacts/',
			'active_class' => 'contacts',
        ),
	);

    public static function getMainMenu(){
		self::$router = App::getRouter()->getRoute();
		self::$router = (self::$router == 'default')? '' : '/admin';
		$result = '';

        foreach (self::$items as $_item) {
            $class = '';
            if (App::getRouter()->getController() == $_item['active_class']) {
                $class = 'active';
            }
            $result .= '<li class="' . $class . '"><a href="'.self::$router.$_item['url'] . '">' . $_item['title'] . '</a></li>';
        }
        return $result;
    }
}

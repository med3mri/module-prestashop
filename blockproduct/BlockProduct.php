<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BlockProduct
 *
 * @author Mohamed
 */

if (!defined('_PS_VERSION_'))
	exit;
class BlockProduct extends Module{
	public function __construct()
	{
        $this->name = 'blockproduct';
        $this->tab = 'front_office_features';
        $this->version = 1.0;
        $this->author = 'Mohamed El Aamri';
        $this->need_instance = 0;
 
        parent::__construct();
 
        $this->displayName = $this->l('Dernier produit commandé');
        $this->description = $this->l('Affichage de dernier produit commandé');           
        }
public function install()
    {
            if (parent::install() == false || $this->registerHook('displayHome') == false || $this->registerHook('displayHeader') == false || Configuration::updateValue('DP_Number_of_Products', 4) == false)
                    return false;
            return true;
    }
public function hookdisplayHome($params)
    {
        if ( $orders = end(OrderCore::getCustomerOrders(1)) ) {
          $orderdetail = end(OrderDetailCore::getList($orders['id_order']));
          $product = new ProductCore($orderdetail['product_id']);
          $image = ImageCore::getCover($orderdetail['product_id']);
          $link = new LinkCore();
          $imagePath = $link->getImageLink($product->link_rewrite, $image['id_image'], 'home_default');
          $this->smarty->assign(array(
            'product' => array('name'=>$orderdetail['product_name'],'price'=>$product->getPrice(),'link'=>$product->getLink(),'image'=>$imagePath)
        ));          
                return $this->display(__FILE__, 'blockproduct.tpl');

        }  
    }    
}

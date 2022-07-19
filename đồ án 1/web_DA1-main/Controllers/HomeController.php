<?php

class HomeController extends BaseController
{
    private $orderModel;
    private $userModel;
    private $productModel;

    public function __construct()
    {
        $this->loadModel('OrderModel');
        $this->orderModel = new OrderModel();
        $this->loadModel('UserModel');
        $this->userModel = new UserModel();
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel();
    }
    public function index()
    {
        $total_product = $this->productModel->total_product();
        $total_user = $this->userModel->total_new_users();
        $total_order = $this->orderModel->total_new_orders();
        $total_price = $this->orderModel->total_price();
        return $this->view('admin.home.index', ['total_order' => $total_order, 'total_user' => $total_user, 'total_product' => $total_product, 'total_price' => $total_price]);
    }

    public function show()
    {
        echo __METHOD__;
    }
}

<?php

class OrderController extends BaseController
{
    private $orderModel;


    public function __construct()
    {
        $this->loadModel('OrderModel');
        $this->orderModel = new OrderModel();
    }
    public function index()
    {
        $result = $this->orderModel->index();
        $this->view('admin.orders.index', ['order' => $result]);
    }

    public function categoryOrder()
    {
        $id = $_POST['select_id'];
        if ($id == 0) {
            $result = $this->orderModel->index_custom($id);
            $this->view('admin.orders.index-0', ['order' => $result]);
        }
        if ($id == 1) {
            $result = $this->orderModel->index_custom($id);
            $this->view('admin.orders.index-1', ['order' => $result]);
        }
        if ($id == 2) {
            $result = $this->orderModel->index_custom($id);
            $this->view('admin.orders.index-2', ['order' => $result]);
        }
        if ($id == 3) {
            header('Location:?controller=order');
        }
    }

    function update()
    {
        $id = $_GET['id'];
        $status = $_GET['status'];
        $data = ['status' => $status];
        $this->orderModel->update($id, $data);
        header('Location:?controller=order');
    }

    function updateShow()
    {
        $id = $_GET['id'];
        $status = $_GET['status'];
        $data = ['status' => $status];
        $this->orderModel->update($id, $data);
        $this->show();
    }

    public function find()
    {
        $id = $_POST['id'];
        if ($id) {
            $result =  $this->orderModel->search($id);
            $this->view('admin.orders.searchOrder', ['order' => $result]);
        } else {
            header('Location: ?controller=order');
        }
    }

    public function show()
    {
        $id = $_GET['id'];
        $order = $this->orderModel->detailShow($id);
        $table = $this->orderModel->tableOrder_details($id);
        return $this->view('admin.orders.showOrder', ['order' => $order, 'table' => $table]);
    }
}

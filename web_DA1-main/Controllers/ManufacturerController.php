<?php

class ManufacturerController extends BaseController
{
    private $ManufacturerModel;
    public function __construct()
    {

        $this->loadModel('ManufacturerModel');
        $this->ManufacturerModel = new ManufacturerModel();
    }

    public function index()
    {
        $select = ['id', 'name', 'phone', 'address'];
        $order = ['id'];
        $limit = 10;
        $result = $this->ManufacturerModel->getALL($select, $order, $limit);

        $this->view('admin.manufacturers.index', ['result' => $result]);
    }

    public function formCreate()
    {
        $this->view('admin.manufacturers.addManufacturer');
    }



    public function create()
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        if ($name || $phone || $address) {
            $data = ['name' => $name, 'phone' => $phone, 'address' => $address];
            $this->ManufacturerModel->store($data);
            $this->index();
        } else {
            $this->index();
        }
    }

    public function update()
    {
        $id = $_GET['id'];
        if ($id) {
            $result = $this->ManufacturerModel->findById($id);
            $this->view('admin.manufacturers.updateManufacturer', ['result' => $result]);
        } else {
            $this->index();
        }
    }

    public function saveUpdate()
    {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        if ($name || $phone || $address) {
            $data = ['name' => $name, 'phone' => $phone, 'address' => $address];
            $this->ManufacturerModel->update($id, $data);
            $this->update();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        if ($id) {
            $result = $this->ManufacturerModel->isDelete($id);
            if ($result) {
                $this->ManufacturerModel->deleteOfProduct($id);
                $this->ManufacturerModel->delete($id);
                $this->index();
            } else {
                $this->ManufacturerModel->delete($id);
                $this->index();
            }
        } else {
            $this->index();
        }
    }
}

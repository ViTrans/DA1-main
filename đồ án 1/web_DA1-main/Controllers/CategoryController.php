<?php
class CategoryController extends BaseController
{
    private $categoryModel;
    public function __construct()
    {

        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $select = ['id', 'name'];
        $order = ['id'];
        $limit = 10;
        $result = $this->categoryModel->getALL($select, $order, $limit);
        return $this->view('admin.category.index', ['result' => $result]);
    }



    public function create()
    {
        $name = $_POST['name'];
        if ($name) {
            $data = ['name' => $name];
            $this->categoryModel->store($data);
            $this->index();
        } else {
            $this->index();
        }
    }


    public function update()
    {
        $id = $_GET['id'];
        $name = $_POST['name'];
        if ($id) {
            if ($name) {
                $data = ['name' => $name];
                $this->categoryModel->update($id, $data);
                $this->index();
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        if ($id) {
            $result = $this->categoryModel->isDelete($id);
            if ($result) {
                $this->categoryModel->deleteOfProduct($id);
                $this->categoryModel->delete($id);
                $this->index();
            } else {
                $this->categoryModel->delete($id);
                $this->index();
            }
        } else {
            $this->index();
        }
    }
}

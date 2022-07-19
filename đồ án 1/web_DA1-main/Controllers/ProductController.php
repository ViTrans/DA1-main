<?php

use JetBrains\PhpStorm\Language;

class ProductController extends BaseController
{
    private $productModel;

    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $select = ['id', 'name', 'price', 'img'];
        $order = ['id'];
        $result = $this->productModel->getAll($select, $order);
        $this->view('admin.products.index', ['result' => $result]);
    }

    public function find()
    {
        $value = $_POST['search'];
        if ($value) {
            trim($value);
            $result = $this->productModel->searchName($value);
            $this->view('admin.products.searchProduct', ['result' => $result]);
        } else {
            header('Location: ?controller=product');
        }
    }

    public function show()
    {
        $id = $_GET['id'];
        if ($id) {
            $result = $this->productModel->show($id);
            $this->view('admin.products.showProduct', ['result' => $result]);
        } else {
            $this->index();
        }
    }



    public function formCreate()
    {
        $this->loadModel('CategoryModel');
        $this->loadModel('ManufacturerModel');
        $categoryModel = new CategoryModel();
        $manufacturerModel = new ManufacturerModel();
        $select = ['id', 'name'];
        $order = ['id'];
        $limit = 100;
        $category = $categoryModel->getALL($select, $order, $limit);
        $manufacturer = $manufacturerModel->getALL($select, $order, $limit);
        $this->view('admin.products.addProduct', ['category' => $category, 'manufacturer' => $manufacturer]);
    }

    public function create()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $des = $_POST['description'];
        $category_id = $_POST['category'];
        $manufacturer_id = $_POST['manufacturer'];
        $file = $_FILES['file'];

        // format name file
        $error = [];
        $size_allow = 10;
        $fileName = $file['name'];
        $fileName = explode('.', $fileName);
        $ext = end($fileName);
        $new_file_name = md5(uniqid()) . '.' . $ext;

        //Check type file
        $allow_ext = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];
        if (in_array($ext, $allow_ext)) {
            $size = $file['size'] / 1024 / 1024;
            if ($size <= $size_allow) {
                $upload = move_uploaded_file($file['tmp_name'], './Public/img/product/' . $new_file_name);
                if (!$upload) {
                    $error[] = 'error upload';
                }
            } else {
                $error = 'size_error';
            }
        } else {
            $error[] = 'ext_error';
        }

        if ($file && $file['name']) {
            $data = ['name' => $name, 'price' => $price, 'description' => $des, 'img' => $new_file_name, 'category_id' => $category_id, 'manufacturer_id' => $manufacturer_id];
            $this->productModel->store($data);
            $this->index();
        } else {
            header("Location: ?controller=product&action=formCreate");
        }
    }

    public function formUpdate()
    {
        $this->loadModel('CategoryModel');
        $this->loadModel('ManufacturerModel');
        $categoryModel = new CategoryModel();
        $manufacturerModel = new ManufacturerModel();
        $select = ['id', 'name'];
        $order = ['id'];
        $limit = 100;
        $category = $categoryModel->getALL($select, $order, $limit);
        $manufacturer = $manufacturerModel->getALL($select, $order, $limit);
        $id = $_GET['id'];
        if ($id) {
            $result = $this->productModel->detail($id);
            $this->view('admin.products.updateProduct', ['product' => $result, 'manufacturer' => $manufacturer, 'category' => $category]);
        } else {
            $this->index();
        }
    }

    public function update()
    {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $des = $_POST['description'];
        $category_id = $_POST['category'];
        $manufacturer_id = $_POST['manufacturer'];
        $file = $_FILES['file'];

        $result = $this->productModel->detail($id);
        $nameImg = $result['img'];
        // format name file
        $error = [];
        $size_allow = 10;
        $fileName = $file['name'];
        $fileName = explode('.', $fileName);
        $ext = end($fileName);
        $new_file_name = md5(uniqid()) . '.' . $ext;

        //Check type file
        $allow_ext = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];
        if (in_array($ext, $allow_ext)) {
            $size = $file['size'] / 1024 / 1024;
            if ($size <= $size_allow) {
                $upload = move_uploaded_file($file['tmp_name'], './Public/img/product/' . $new_file_name);
                if ($upload) {
                    if (file_exists("./Public/img/product/${nameImg}")) {
                        unlink("./Public/img/product/${nameImg}");
                    }
                }
                if (!$upload) {
                    $error[] = 'error upload';
                }
            } else {
                $error = 'size_error';
            }
        } else {
            $error[] = 'ext_error';
        }

        $data = [];
        if ($name != $result['name']) {
            $data['name'] = $name;
        }
        if ($price != $result['price']) {
            $data['price'] = $price;
        }
        if ($des != $result['description']) {
            $data['description'] = $des;
        }
        if ($category_id != $result['category_id']) {
            $data['category_id'] = $category_id;
        }
        if ($manufacturer_id != $result['manufacturer_id']) {
            $data['manufacturer_id'] = $manufacturer_id;
        }
        if ($file && $file['name']) {
            $data['img'] = $new_file_name;
        }

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $data['update_at'] = $date;
        $this->productModel->update($id, $data);
        header("location: ?controller=product");
    }

    public function delete()
    {

        $id = $_GET['id'];
        $result = $this->productModel->detail($id);
        $nameImg = $result['img'];
        if ($id) {
            $this->productModel->delete($id);
            unlink("./Public/img/product/${nameImg}");
            $this->index();
        } else {
            $this->index();
        }
    }
}

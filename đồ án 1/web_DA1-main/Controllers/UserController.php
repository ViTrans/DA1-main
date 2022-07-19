<?php

class UserController extends BaseController
{
    private $userModel;
    public function __construct()
    {

        $this->loadModel('UserModel');
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $select = ["id", "name", "birthday", "phone"];
        $order = ['id'];
        $limit = 100;
        $user = $this->userModel->getALL($select, $order, $limit);
        $this->view("admin.users.index", ['user' => $user]);
    }

    public function show()
    {
        $id = $_GET['id'];
        if ($id) {
            $user = $this->userModel->findById($id);
            $this->view('admin.users.showUser', ['user' => $user]);
        }
    }

    public function find()
    {
        $name = $_POST['name'];
        if ($name) {
            $user = $this->userModel->findByName($name);
            $this->view('admin.users.searchUser', ['user' => $user]);
        } else {
            header("location: ?controller=user ");
        }
    }

    public function formCreate()
    {
        $this->view('admin.users.addUser');
    }

    public function create()
    {
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];

        // format Data
        $date = date('Y-m-d', strtotime($birthday));
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);



        $data = ['name' => $name, 'birthday' => $date, 'email' => $email, 'phone' => $phone, 'password' => $hashed_password, 'address' => $address, 'gender' => $gender];
        $this->userModel->store($data);
        header("location:?controller=User");
    }

    public function formUpdate()
    {
        $id = $_GET['id'];
        if ($id) {
            $user = $this->userModel->show($id);
            $this->view('admin.users.updateUser', ['user' => $user]);
        } else {
            header("location:?controller=User");
        }
    }

    public function update()
    {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $data = [];
        if ($id) {
            $user = $this->userModel->show($id);
            if ($name != $user['name']) {
                $data['name'] = $name;
            }
            if ($birthday != $user['birthday']) {
                $data['birthday'] = $birthday;
            }
            if ($email != $user['email']) {
                $data['email'] = $email;
            }
            if ($phone != $user['phone']) {
                $data['phone'] = $phone;
            }
            if ($address != $user['address']) {
                $data['address'] = $address;
            }
            if ($gender != $user['gender']) {
                $data['gender'] = $gender;
            }

            $this->userModel->update($id, $data);
            $this->formUpdate();
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        if ($id) {
            $this->userModel->delete($id);
            header('Location: ?controller=user');
        }
    }
}

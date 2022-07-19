<?php
class LoginController extends BaseController
{
    private $AdminModel;
    public function __construct()
    {

        $this->loadModel('AdminModel');
        $this->AdminModel = new AdminModel();
    }

    public function index()
    {
        $this->view('admin.Login.index');
    }

    public function login()
    {
        $email = $_POST['login-email'];
        $pass = $_POST['login-password'];
        $result = $this->AdminModel->searchEmail($email);
        if ($result) {
            if ($pass == $result['password']) {
                $_SESSION['login'] = $result;
                header('Location:?controller=home');
            } else {
                echo 'sai mật khẩu';
            }
        } else {
            echo 'email không hợp lệ';
        }
    }

    public function logout()
    {
        if ($_SESSION['login']) {
            unset($_SESSION['login']);
            header('Location:?controller=login');
        }
    }
}

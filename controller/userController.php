<?php

require_once '../model/UserModel.php';
require_once '../helper/flash_session.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
        ];

        if (empty($data['email']) || empty($data['password'])) {
            flash('error_message', 'Semua kolom harus diisi.');
            redirect('../view/Login.php');
        }

        if ($this->userModel->findUserByEmail($data['email'])) {
            $loggedUser = $this->userModel->login($data['email'], $data['password']);

            if ($loggedUser) {
                $this->createUserSession($loggedUser);
                redirect("../index.php");
            } else {
                flash('error_message', 'Password salah.');
                redirect('../view/Login.php');
            }
        } else {
            flash('error_message', 'Email atau password salah.');
            redirect('../view/Login.php');
        }
    }

    public function createUserSession($user){
        $_SESSION['idUser'] = $user->idUser;
        $_SESSION['namaUser'] = $user->namaUser;
        $_SESSION['email'] = $user->email;
        $_SESSION['password'] = $user->password;
        $_SESSION['jenisKelamin'] = $user->jenisKelamin;
        $_SESSION['noTelepon'] = $user->noTelepon;
    }

    public function logout()
    {
        $destroy = session_destroy();
        redirect("../index.php");
    }

    public function editProfile()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'namaUser' => trim($_POST['namaUser']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'jenisKelamin' => trim($_POST['jeniskelamin']),
            'noTelepon' => trim($_POST['noTelepon']),
        ];

        //validation
        if (
            empty($data['namaUser']) ||
            empty($data['email']) ||
            empty($data['password']) ||
            empty($data['jenisKelamin']) ||
            empty($data['noTelepon']) ||
            ) {
            flash('error_message', 'Semua kolom harus diisi.');
            redirect('../view/Profile.php');
        }

        //coba update
        // $edited = $this->userModel->editProfile(
        //                         $_SESSION['idUser'],
        //                         $data['namaUser'],
        //                         $data['jenisKelamin'],
        //                         $data['tanggalLahir'],
        //                         $data['noTelepon'],
        //                         $data['email'],
        //                         $data['password']
        //                     );

    //     if ($edited) {
    //         flash('success_message', 'Profil berhasil diubah.', 'green');
    //         $user = $this->userModel->findUserByEmail($data['email']);
    //         $this->createUserSession($user);
    //         redirect('../view/Profile.php');
    //     } else {
    //         flash('error_message', 'Profil gagal diubah.', 'red');
    //         redirect('../view/Profile.php');
    //     }
    // }

    // public function requestMembership()
    // {
    //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //     $data = [
    //         'idUser' => $_SESSION['idUser'],
    //         'tipeMembership' => $_POST['tipeMembership'],
    //         'statusMembership' => 'Requested',
    //     ];

    //     //validation
    //     if (
    //         empty($data['idUser']) ||
    //         empty($data['tipeMembership']) ||
    //         empty($data['statusMembership'])
    //         ) {
    //         flash('error_message', 'Semua kolom harus diisi.');
    //         redirect('../view/ApplyMembership.php');
    //     }

    //     //coba update
    //     $edited = $this->userModel->requestMembership(
    //                             $data['idUser'],
    //                             $data['tipeMembership'],
    //                             $data['statusMembership']
    //                         );

    //     if ($edited) {
    //         flash('success_message', 'Permintaan membership berhasil.', 'green');
    //         redirect('../view/ApplyMembership.php');
    //     } else {
    //         flash('error_message', 'Permintaan membership gagal.', 'red');
    //         redirect('../view/ApplyMembership.php');
    //     }
    // }

}

$init = new UserController();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['type']){
        case 'login':
            $init->login();
            break;
        case 'edit_profile':
            $init->editProfile();
            break;
        case 'request_membership':
            $init->requestMembership();
            break;
        default:
        redirect("../index.php");
    }
}else{
    switch($_GET['q']){
        case 'logout':
            $init->logout();
            break;
        default:
        redirect("../index.php");
    }
}
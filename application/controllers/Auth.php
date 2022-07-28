<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_Model');
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        if (!$this->session->has_userdata('email')) {
            $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Batik - Login Page';
                $this->load->view('auth/login', $data);
            } else {
                $this->_subLogin();
            }
        } else {
            redirect('home');
        }
    }

    private function _subLogin()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $user = $this->Auth_Model->loginUser($email);
        if ($user != NULL) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $dataSession = [
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                        'email' => $user['email'],
                        'level' => $user['level']
                    ];
                    if ($user['level'] == 'Owner') {
                        //set session for 30 minutes
                        $this->session->sess_expiration = '43200'; //12 Jam
                        $this->session->sess_expire_on_close = 'true';
                    } else if ($user['level'] == 'Admin') {
                        //set session for 30 minutes
                        $this->session->sess_expiration = '43200'; //12 Jam
                        $this->session->sess_expire_on_close = 'true';
                    } else {
                        //set session for 30 minutes
                        $this->session->sess_expiration = '7200'; //2 Jam
                        $this->session->sess_expire_on_close = 'true';
                    }
                    $this->session->set_userdata($dataSession);
                    if ($this->session->has_userdata('checkout_url')) {
                        redirect($this->session->userdata('checkout_url'));
                    } else {
                        $this->freeM->getSweetAlert('infoPayment', 'Success!', 'Berhasil login, silahkan berbelanja!', 'success');
                        // ($this->session->level == 'Admin' OR $this->session->level == 'Owner') ? redirect('dashboard/admin') : redirect('dashboard/customers');
                        redirect('home');
                    }
                } else {
                    $this->freeM->getAlertBS('message', 'danger', 'Error!', 'Wrong password.');
                    redirect('auth/login');
                }
            } else {
                $this->freeM->getAlertBS('message', 'danger', 'Error!', 'This email has not been activated.');
                redirect('auth/login');
            }
        } else {
            $this->freeM->getAlertBS('message', 'danger', 'Error!', 'Email is not registered or has been deleted by system.');
            redirect('auth/login');
        }
    }

    public function register()
    {
        if (!$this->session->has_userdata('email')) {
            $this->form_validation->set_rules('fname', 'First Name', 'required|trim|min_length[3]|alpha_numeric_spaces|max_length[20]');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|min_length[1]|alpha_numeric_spaces|max_length[20]');
            $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[data_user.email]', [
                'is_unique' => 'This email already exist'
            ]); //UNTUK TESTING, PASSWORD MIN LENGTH 1
            $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password1]|min_length[8]|max_length[50]', [
                'matches' => 'Password dont match!',
                'min_length' => 'Password too short, Min 8 Characters!'
            ]);
            $this->form_validation->set_rules('password1', ' ', 'trim|required|matches[password]', [
                'matches' => ' '
            ]);
            $this->form_validation->set_rules('no_hp', 'Phone Number', 'required|numeric');
            $this->form_validation->set_rules('address', 'Address', 'required|trim');
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Batik - Register Page';
                $this->load->view('auth/register', $data);
            } else {
                $namaUser = htmlspecialchars($this->input->post('fname', true)) . ' ' .
                htmlspecialchars($this->input->post('lname', true));
                $data = [
                    'nama' => ucwords($namaUser),
                    'no_hp' => $this->input->post('no_hp', true),
                    'address' => $this->input->post('address', true),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'level' => 'Member'
                ];
                $dataEmail = [
                    'nama' => ucwords($namaUser),
                    'email' => $this->input->post('email', true)
                ];
//                if($this->freeM->sendEmail($dataEmail, 'Pendaftaran Member '.ucwords($namaUser),  EMAIL_FROM, 'daftar-member')){
                    if ($this->Auth_Model->regisUser($data)) {
                        $this->freeM->getAlertBS('message', 'success', 'Congratulation!', 'Your account has been created. Please Login.');
                        redirect('auth/login');
                    } else {
                        $this->freeM->getAlertBS('message', 'danger', 'Upss!', 'Your account cant not be created. Please Try Again.');
                        redirect('auth/register');
                    }
//                } else {
//                    $this->freeM->getAlertBS('message', 'danger', 'Upss!', 'Please use <b>Real Email</b> or <b>Active Email</b>.');
//                    redirect('auth/register');
//                }

            }
        } else {
            redirect('home');
        }
    }

    public function logout()
    {
        if ($this->session->has_userdata('email')) {
            $this->session->unset_userdata(['email', 'nama', 'level', 'id_user', 'checkout_url','triggerCheckout',]);
            $this->session->unset_userdata(['id_orders','kurir','service','estimasi','alamat_pengiriman',
            'kode_pos','nama_penerima','no_penerima',
            'berat', 'total_ongkir','totalBayar','triggerCheckout']);
            $this->freeM->getAlertBS('message', 'success', 'Congratulation!', 'Your has been logged out.');
            $this->cart->destroy();
            redirect('auth/login');
            // $this->session->sess_destroy();
        } else {
            redirect('home');
        }
    }
}

<?php

/**
 * Description of login
 *
 * @author anwar
 */
class login extends Controller {

    function login() {
        parent::Controller();
        $this->load->model('mod_login');
    }

    function index() {
        if ($_POST['login']) {
            if ($this->form_validation->run('valid_login')) {
                if ($this->mod_login->is_valid_user()) {
                    redirect('home');
                } else {
                    $data['msg'] = 'Invalid User and Password';
                }
            }
        }
        if ($data['msg'] == '') {
            $data['msg'] = $this->session->flashdata('msg');
        }
        $data['page_title'] = 'Login';
        $data['dir'] = 'login';
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }

    function logout() {
        $this->mod_login->do_logout();
        redirect('login');
    }

    function forgot_password() {
        if ($_POST['send']) {
            if ($this->form_validation->run('valid_forgot_password')) {
                $this->mod_login->reset_password();
                $this->session->set_flashdata('msg', 'Thank you for contacting Dream Girls Online Account Support.<p>We have Sent you an email to ' . $_POST['email'] . ' .
                                                    <span class="block">Please check your email- a password reset link will be included in a message from Dream Girls. Please click on the link to complete your password reset Process.</span></p>
                                                    <br />Thank you,
                                                    <br />Dream Girls Account Support');
                redirect('login/notice');
            }
        }
        $data['page_title'] = 'Forgot Password';
        $data['dir'] = 'login';
        $data['page'] = 'forgot_password';
        $this->load->view('main', $data);
    }

    function is_user() {
        $valid = sql::count('admin', "email='{$_POST['email']}'");
        if ($valid > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('is_user', 'Email is invalid!');
            return FALSE;
        }
    }

    function notice() {
        $data['msg'] = $this->session->flashdata('msg');
        if ($data['msg'] == '') {
            redirect('home');
        }
        $data['page_title'] = 'Notice';
        $data['dir'] = 'login';
        $data['page'] = 'notice';
        $this->load->view('main', $data);
    }

    function reset_password($verification_code='') {
        if ($_POST['change_password']) {
            $this->form_validation->set_rules('new_password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|matches[new_password]');
            if ($this->form_validation->run()) {
                $this->mod_login->update_password($verification_code);
                $this->session->set_flashdata('msg', 'Password Changed Successfully!!!');
                redirect('login/notice', 'refresh');
            }
        }
        if ($verification_code == '') {
            redirect('home');
        }
        if ($this->mod_login->is_password_verfiy($verification_code)) {
            $data['verify_code'] = $verification_code;
            $data['link_array'] = array(
                array('title' => 'Reset Password', 'url' => '')
            );
            $data['dir'] = 'login';
            $data['page'] = 'reset_password';
            $data['page_title'] = 'Reset Password';
            $this->load->view('main', $data);
        } else {
            $this->session->set_flashdata('msg', 'Error!!!<br />An Error occured!.');
            redirect('login/notice');
        }
    }

}
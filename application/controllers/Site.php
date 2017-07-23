<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->library('session');
	    $this->load->view('site/index');
	}

	public function getform()
    {
        $data = $this->input->post();
        if ($data) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('user_name', 'Имя пользователя', 'required', [
                'required' => 'Поле должно быть заполнено : %s.',
            ]);

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('site/contactForm');
            } else {
                $this->load->model('feedback');
                $this->load->library('session');
                $this->feedback->fillRecord($data);

                if ($this->feedback->insert()) {
                    $value = '<div class="alert alert-success" role="alert">' . 'Ваше сообщение успешно добавлено!' . '</div>';
                } else {
                    $value = '<div class="alert alert-danger" role="alert">' . 'К сожалению, произошла трагическая ошибка!' . '</div>';
                }

                $this->session->set_flashdata('_flash', $value);
                $this->load->helper('url');
                redirect('');
            }
        } else {
            $this->load->view('site/contactForm');
        }
    }
}

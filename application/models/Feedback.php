<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 23.07.2017
 * Time: 17:47
 */
class Feedback extends CI_Model {

    private $tableName = 'feedback';

    public $id;
    public $created_at;
    public $user_name;
    public $user_phone;
    public $message;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function fillRecord($data)
    {
        //$this->id = $data['id'];
        $this->created_at = $data['created_at'];
        $this->user_name = $data['user_name'];
        $this->user_phone = $data['user_phone'];
        $this->message = $data['message'];
    }

    public function save()
    {
        return ($this->db->simple_query ("UPDATE $this->tableName SET `id` = $this->id, `created_at` = $this->created_at")) ? true : false;
    }

    public function insert()
    {
        return ($this->db->query ("INSERT INTO $this->tableName SET `created_at` = $this->created_at, `user_name` = $this->user_name, `user_phone` = $this->user_phone, `message` = $this->message")) ? true : false;
    }
}
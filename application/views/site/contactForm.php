<?php
$this->load->helper('form');

echo validation_errors('<span class="error">', '</span>');

echo form_open_multipart();
echo form_input('created_at');
echo form_input('user_name');
echo form_input('user_phone');
echo form_input('message');
echo form_submit('formSubmit', 'Отправить!');

$string = '</div></div>';
echo form_close($string);

echo form_error('myfield', '<div class="error">', '</div>');

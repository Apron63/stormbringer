<?php
$this->load->helper('form');

echo validation_errors('<span class="error">', '</span>');

echo form_open_multipart();

echo form_input('created_at', '', ['placeholder' => 'Время создания']);
echo form_input('user_name', '', ['placeholder' => 'Имя пользователя']);
echo form_input('user_phone', '', ['placeholder' => 'Телефон']);
echo form_textarea('message', '', ['placeholder' => 'Текст сообщения']);
echo form_submit('formSubmit', 'Отправить!');

echo form_close();

echo form_error('myfield', '<div class="error">', '</div>');

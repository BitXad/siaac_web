<?php
$session_data = $this->session->userdata('logged_in');
echo  '<h1>hola</h1><br>';

echo 'gestion: '.$session_data['gestion'].'<br>';
echo 'gestion-semestre: '.$session_data['semestre'].'<br>';
echo 'gestion_id: '.$session_data['gestion_id'];

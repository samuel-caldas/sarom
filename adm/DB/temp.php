<?php
include 'sqlClass.php';
$sql= new sql();
$sql->connect('root','');
$sql->db('398948');
$sql->table('fb');
print_r($sql->select());
?>
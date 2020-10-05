<?php


require_once("config.php");

//Carrega um usuário 
//$root = new Usuario();
//$root->loadById(2);
//echo $root;

//Carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega uma lista de usuários buscando pelo login
//$search = Usuario::search("jo");
//echo json_encode($search);

//Carrega um usuário pelo login e senha 
//$usuario = new Usuario();
//$usuario->login("Joao","1234");
//echo $usuario;
/*Criando um novo usuário
$aluno = new Usuario ();
$aluno->setDeslogin("aluno");
$aluno->setDessenha("@alun0");

$aluno->insert();

echo $aluno;*/
$usuario = new Usuario();
$usuario->loadByID(2);
$usuario->update("professor","!aspdkijnoas");

?>
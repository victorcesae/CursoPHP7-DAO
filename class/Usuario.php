<?php

require_once("config.php");

class Usuario{
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario()
    {
        return $this->idusuario;
    }
    public function setIdusuario($value)
    {
        $this->idusuario = $value;
    }
    public function getDeslogin()
    {
        return $this->deslogin;
    }
    public function setDeslogin($value)
    {
        $this->deslogin = $value;
    }
    public function getDessenha()
    {
        return $this->dessenha;
    }
    public function setDessenha($value)
    {
        $this->dessenha = $value;
    }
    public function getDtcadastro()
    {
        return $this->dtcadastro;
    }
    public function setDtcadastro($value)
    {
        $this->dtcadastro = $value;
    }

    public function loadById($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));
        if (count($result) > 0) {
            $raw = $result[0];
            $this->setIdusuario($raw['idusuario']);
            $this->setDeslogin($raw['deslogin']);
            $this->setDessenha($raw['dessenha']);
            $this->setDtcadastro(new DateTime($raw['dtcadastro']));
        }
    }

    public static function getList()
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
    }
    public static function search($login)
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin",array(
            ':SEARCH'=> "%".$login."%"
        ));
    }

    public function login($login,$password)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ':PASSWORD'=>$password
        ));
        if (count($result) > 0) {
            $raw = $result[0];
            $this->setIdusuario($raw['idusuario']);
            $this->setDeslogin($raw['deslogin']);
            $this->setDessenha($raw['dessenha']);
            $this->setDtcadastro(new DateTime($raw['dtcadastro']));
        }else{
            throw new Exception("Login e/ou senha inválidos.");
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtusuario"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
        ));
    }

}

?>
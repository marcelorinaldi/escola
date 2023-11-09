<?php

class autentica
{
    public $login;
    public $senha;
    public $conn;
    public function __construct()
    {
        $db = new banco;
        $this->conn = $db->conn;
    }

    ///  insert into TABELA aluno 
    public function valida($inputData)
    {
        $login = $inputData['login'];
        $senha = $inputData['senha'];
        /* $nome = $inputData['nome'];
        $email = $inputData['email'];
        $datacadastro = $inputData['datacadastro']; */


        $sql = "select * from usuario where login='" . $login . "' and senha='" . $senha . "'";
        $resultado = $this->conn->query($sql);
        $resultado = $resultado->num_rows;

        //print_r($resultado);

        if ($resultado >= 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }
}


class aluno
{
    public $nome;
    public $data_nasc;
    public $foto;

    public $conn;
    public function __construct()
    {
        $db = new banco;
        $this->conn = $db->conn;
    }


    ///  insert into TABELA aluno 
    public function criar($inputData)
    {
        $nome = $inputData['nome'];
        $data_nasc = $inputData['data_nasc'];
        $turma_idturma = $inputData['turma_idturma'];
        $foto = $inputData['foto'];

        $sql = "INSERT INTO `escola`.`aluno` (`nome`, `data_nasc`, `turma_idturma`,`foto`) 
		VALUES ('" . $nome . "', '" . $data_nasc . "', '" . $turma_idturma . "','" . $foto . "')";
        $result = $this->conn->query($sql);

        if ($result == 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }

    ///  atualizar TABELA aluno 
    public function editar($inputData)
    {

        $nome = $inputData['nome'];
        $data_nasc = $inputData['data_nasc'];
        $turma_idturma = $inputData['turma_idturma'];
        $foto = $inputData['foto'];
        $id = $inputData['id'];
        $excluir = $inputData['excluir'];


        if ($excluir == 1) {
            $sql = "update aluno set nome='" . $nome . "',
            data_nasc='" . $data_nasc . "',
            foto='',
            turma_idturma='" . $turma_idturma . "'
             where idaluno='" . $id . "' limit 1 ";
        }
        if ($excluir == 2) {
            $sql = "update aluno set 
            nome='" . $nome . "',
            data_nasc='" . $data_nasc . "',
           
            turma_idturma='" . $turma_idturma . "'
             where idaluno='" . $id . "' limit 1 ";
        } else {
            $sql = "update aluno set 
            nome='" . $nome . "',
            data_nasc='" . $data_nasc . "',
            foto='" . $foto . "',
            turma_idturma='" . $turma_idturma . "'
             where idaluno='" . $id . "' limit 1 ";
        }




        $result = $this->conn->query($sql);

        if ($result == 1) {
            //echo "ok";
            return true;
        } else {
            //echo "nok";
            return false;
        }
    }


    public function listar_alunos($idturma)
    {
        $xpto = "SELECT * FROM escola.aluno where turma_idturma ='" . $idturma . "' ";
        $dados = $this->conn->query($xpto);
        return $dados;
    }


    public function listar_um_aluno($idaluno)
    {
        $xpto = "select * from aluno where idaluno='" . $idaluno . "'";
        $dados = $this->conn->query($xpto);
        return $dados;
    }

    public function buscar_um_aluno($nome)
    {
        $xpto = "select * from aluno where nome like '%" . $nome . "%'";
        $dados = $this->conn->query($xpto);
        return $dados;
    }

    public function listar_turmas()
    {
        $xpto2 = "SELECT * FROM turma";
        $dados2 = $this->conn->query($xpto2);
        return $dados2;
    }



    public function excluir_aluno($id, $acao)
    {


        if ($acao == 1) {
            $sql = "DELETE FROM `aluno` WHERE (`idaluno` = '" . $id . "') limit 1";
            $resultado = $this->conn->query($sql);
            $resultado = $this->conn->affected_rows;
            return $resultado;
        }
    }

    public function selecionar()
    {
    }
}

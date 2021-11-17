<?php

Class usuario{

    private $pdo;
    public $msgErro = "";

    public function conectar($dbnome, $host, $usuario, $senha){
        global $pdo;

        try{
            $pdo = new PDO("mysql:dbname=".$dbnome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e){
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrarPrecoSugerido($valorParaGastar, $idCliente){
        global $pdo;
        $sql = $pdo->prepare("UPDATE `cliente` SET cli_precoSugerido=:valorGastar WHERE cli_id = :idCliente");
        $sql->bindValue(":valorGastar",$valorParaGastar);
        $sql->bindValue(":idCliente",$idCliente);
        $sql->execute();
        return true;
    }

    public function cadastrarTransacoes($idProdutoModificado){
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO transacoes (t_itens) VALUES (:transacaoItens)");
        $sql->bindValue(":transacaoItens",$idProdutoModificado);
        $sql->execute();
        return true;
    }

    public function cadastrar($nome, $cpf, $nascimento, $cep, $endereco, $cidade, $estado, $animal, $email, $senha){
        global $pdo;
        //verificar cadastro
        $sql = $pdo->prepare("SELECT cli_id FROM cliente WHERE cli_email = :email");
        $sql->bindValue(":email",$email);
        $sql->execute();
        if($sql->rowCount()>0){
            return false; //ja cadastrado
        }else{
            $sql = $pdo->prepare("INSERT INTO cliente (cli_nome, cli_cpf, cli_nasci, cli_cep, cli_end, cli_cidade, cli_estado, cli_animal, cli_email, cli_senha) VALUES (:nome, :cpf, :nascimento, :cep, :endereco, :cidade, :estado, :animal, :email, :senha)");
            $sql->bindValue(":nome",$nome);
            $sql->bindValue(":cpf",$cpf);
            $sql->bindValue(":nascimento",$nascimento);
            $sql->bindValue(":cep",$cep);
            $sql->bindValue(":endereco",$endereco);
            $sql->bindValue(":cidade",$cidade);
            $sql->bindValue(":estado",$estado);
            $sql->bindValue(":animal",$animal);
            $sql->bindValue(":email",$email);
            $sql->bindValue(":senha",$senha);
            $sql->execute();
            return true;
        }

    }

    public function logar($email, $senha){
        global $pdo;
        $sql = $pdo->prepare("SELECT cli_id FROM cliente WHERE cli_email = :email AND cli_senha = :senha");
        $sql->bindValue(":email",$email);
        $sql->bindValue(":senha",$senha);
        $sql->execute();
        if($sql->rowCount() > 0){
            //cria uma sessao
            $dado = $sql->fetch();
            session_start();
            $_SESSION['cli_id'] = $dado['cli_id'];
            return true;
        }else{
            return false;
        }
    }
}

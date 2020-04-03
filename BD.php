<?php

class BD
{

    public function connection()
    {
        $bd_tipo = "mysql";
        $host = "localhost";
        $bd_nome = "db_tai_exercicio";
        $bd_porta = "3306";
        $bd_usuario = "root";
        $bd_senha = "";
        $bd_charset = "utf8";

        $str_conn = $bd_tipo . ":host=" . $host . ";dbname=" . $bd_nome . ";port=" . $bd_porta;;

        return new PDO(
            $str_conn,
            $bd_usuario,
            $bd_senha,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $bd_charset)
        );
    }

    public function selectAll()
    {

        $conn = $this->connection(); 
        $stmt = $conn->prepare("SELECT * FROM produto order by id desc");
        $stmt->execute();
        return $stmt;
    }

    public function find($id)
    {
        $conn = $this->connection(); 
        $stmt = $conn->prepare("SELECT * FROM produto WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject();
    }

    public function update($dados)
    {

        var_dump($dados);
        $sql = "UPDATE `produto` SET `nome`= ?, `tipo`= ?, `valor_unitario`= ?,
         `marca`= ? WHERE id= ? ;";

        $conn = $this->connection(); 
        $stmt = $conn->prepare($sql);

        $stmt->execute([
            $dados['nome'],
            $dados['tipo'], $dados['valor_unitario'], $dados['marca'], $dados['id']
        ]);

        return $stmt;
    }
 
    public function insert($dados)
    {
        var_dump($dados);
        $sql = "INSERT INTO `produto` (`nome`, `tipo`, `valor_unitario`, `marca`) 
            VALUES (?, ?, ?, ?);";

        $conn = $this->connection(); 
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $dados['nome'],
            $dados['tipo'], $dados['valor_unitario'], $dados['marca']
        ]);


        return $stmt;
    }
}

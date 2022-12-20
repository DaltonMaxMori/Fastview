<?php

namespace App\db;

use PDO;
use PDOException;

class Database{
    const HOST='LOCALHOST';
    const NAME='projeto';
    const USER='root';
    const PASS='';

    private $table;

    private $connection;

    public function __construct($table=null){
        $this->table=$table;
        $this->setConnection();
    }

    private function setConnection(){
        try {
            $this->connection=new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $th) {
            echo $th;
        }
    }

    public function execute($query,$parametros=[]){
        try {
            $statement=$this->connection->prepare($query);
            $statement->execute($parametros);
            return $statement;

        } catch (PDOException $th) {
            echo $th;
        }
    }

    public function insert($valor){
        
        $chaves=array_keys($valor);
        $quantidadeValores=array_pad([],count($chaves),'?');

        $query=('INSERT INTO projeto.'.$this->table.' ('.implode(',',$chaves).') VALUES ('.implode(',',$quantidadeValores).')');
        $this->execute($query,array_values($valor));

        return $this->connection->lastInsertId();
    }

    public function select($where =null,$order=null,$limit=null){
        $where= strlen($where) ? 'WHERE '.$where : '';
        $order= strlen($order) ? 'ORDER BY '.$order : '';
        $limit= strlen($limit) ? 'LIMIT '.$limit : '';

        $query='SELECT * FROM projeto.'.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);
    }

    public function update($where,$values){
        $chaves=array_keys($values);

        $query ='UPDATE projeto.'.$this->table.' SET '.implode('=?,',$chaves).'=? WHERE '.$where;

        $this->execute($query,array_values($values));
        return True;
    }
    public function delete($where){
        $query ='DELETE FROM projeto.'.$this->table.' WHERE '.$where;

        $this->execute($query);

        return True;
    }
}
?>
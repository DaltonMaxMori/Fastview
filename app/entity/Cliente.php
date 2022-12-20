<?php

namespace App\entity;


use App\db\Database;
use PDO;

class Cliente{
    /**
     * id do cliente
     * @var integer
    */
    public $id;

    /**
     * nome do cliente
     * @var string
    */
    public $nome;

    /**
     * telefone do cliente
     * @var integer
    */
    public $telefone;

    /**
     * email do cliente
     * @var string
    */
    public $email;

    /**
     * ultima atualizacao do cadastro
     * @var string
    */
    public $data;

    /**
     * id do cliente
     * @return boolean
    */
    public function cadastrar(){
        // atribui o timestamp no $data
        $this->data=date('Y-m-d H:i:s');
        
        //inserir cliente
        $oDatabase =new Database('clientes');
        $this->id = $oDatabase ->insert([
            'nome'=>$this->nome,
            'telefone'=>$this->telefone,
            'email'=>$this->email,
            'data'=>$this->data
        ]);   
        return true;     
    }
    public function excluir(){
        return (new Database('clientes'))->delete('id= '.$this->id);
    }

    public function atualizar(){
        return (new Database('clientes'))->update('id= '.$this->id,[
            'nome'=>$this->nome,
            'telefone'=>$this->telefone,
            'email'=>$this->email,
            'data'=>$this->data
        ]);
    }
    public static function getCliente($where=null,$order=null,$limit=null){
        return (new Database('clientes'))->select($where,$order,$limit)
                                        ->fetchALL(PDO::FETCH_CLASS,self::class);

    }
    public static function getClientePeloId($id){
        // var_dump('cheeegou');exit;

        return (new Database('clientes'))->select('id='.$id)
                                        ->fetchObject(self::class);
    }
    

    
}
?>
<?php

namespace App\entity;


use App\db\Database;
use PDO;

class Usuario{
    /**
     * id do usuario
     * @var integer
    */
    public $id;

    /**
     * nome do usuario
     * @var string
    */
    public $nome;

    /**
     * email do usuario
     * @var string
    */
    public $email;

    /**
     * hash da senha do usuario
     * @var string
    */
    public $senha;

    /**
     * ultima atualizacao do cadastro
     * @var string
    */
    public $data;

    /**
     * id do usuario
     * @return boolean
    */
    public function cadastrar(){
        // atribui o timestamp no $data
        $this->date=date('Y-m-d H:i:s');
        
        //inserir usuario
        $oDatabase =new Database('usuarios');
        $this->id = $oDatabase ->insert([
            'nome'=>$this->nome,
            'email'=>$this->email,
            'senha'=>$this->senha,
            'date'=>$this->date
        ]);   
        return true;     
    }
   
    public static function getUsuario($where=null,$order=null,$limit=null){
        return (new Database('usuarios'))->select($where,$order,$limit)
                                        ->fetchALL(PDO::FETCH_CLASS,self::class);

    }
    public static function getUsuarioPorEmail($email){

        return (new Database('usuarios'))->select('email="'.$email.'"')
                                        ->fetchObject(self::class);
    }
    

    
}
?>
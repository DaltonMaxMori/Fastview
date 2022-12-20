<?php
 namespace App\Session;
 class Login{
    /** 
     * 
     * metodo responsavel para iniciar a sessao
     */
    private static function init(){
        if (session_status()!==PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    /** 
     * 
     * metodo responsavel por logar o usuario
     * @param Usuario $oUsuario
     * 
     */
    public static function login($oUsuario){
        self::init();
        $_SESSION['usuario']=[
            'id'=> $oUsuario->id,
            'nome'=> $oUsuario->nome,
            'email'=> $oUsuario->email,
        ];
        header('location:index.php');
        exit;
    }
    /** 
     * 
     * metodo para deslogar usuario
     */
    public static function logout(){
        self::init();
        unset($_SESSION['usuario']);
        header('location:login.php');
        exit;
    }
    /** 
     * 
     * @return array
     */
    public static function getUsuarioLogado(){
        self::init();
        return self::isLogged()? $_SESSION['usuario']:null;
    }
    /** 
     * 
     * @return boolean
     */
    public static function isLogged(){
        self::init();       
        return isset($_SESSION['usuario']['id']);
    }

    public static function requireLogin(){
        if (!self::islogged()) {
            header('location:login.php');
            exit;
        }
    }

    public static function requireLogout(){
        if (self::islogged()) {
            header('location:index.php');
            exit;
        }
    }
 }
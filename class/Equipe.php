<?php
// require_once('class/Conexao.php');
class Equipe
{
    public $pdo;
    public $salt = 'Sen@c!';

    public function __construct()
    {
        $this->pdo = Conexao::conexao();                            
    }

    
    /**
     * Cadastra um novo usuário
     *
     * @param array $dados     
     * @return int
     */
    public function cadastrar(array $dados, $foto_enviada = null)
    {
        $sql = $this->pdo->prepare('INSERT INTO equipe 
                                    (nome, apelido, email, senha)
                                    values
                                    (:nome, :apelido, :email, :senha)'
                                    );

        //tratar os dados recebidos        
        $nome               = $dados['nome'];
        $apelido            = $dados['apelido'];
        $email              = strtolower(trim($dados['email']));
        $senha              = crypt($dados['senha'],$this->salt);
        // $foto = '';

        // if($foto_enviada){
        //     $nome_da_foto = Helper::sobeArquivo($foto_enviada,'imagens/usuarios/');
        //     //verificar se o upload deu certo
        //     if($nome_da_foto){
        //            $foto = $nome_da_foto;
        //     }
        // }

        //mesclar os dados com os parametros
        $sql->bindParam(':nome',$nome);
        $sql->bindParam(':apelido',$apelido);
        $sql->bindParam(':email',$email);
        $sql->bindParam(':senha',$senha);     
        // $sql->bindParam(':foto',$foto);  
        // executar
        $sql->execute();
        return $this->pdo->lastInsertId();

    }
    
    /**
     * lista os equipes
     *   
     * @return array
     * 
     */
    public function listar(int $id_equipe = null)
    {
       $sql = $this->pdo->prepare('SELECT * FROM equipe ORDER BY id_equipe ');
    //    $sql->bindParam(':id_equipe', $id_equipe);
       $sql->execute();      
       $dados =  $sql->fetchAll(PDO::FETCH_OBJ);
       return $dados;
    }


    /**
     * ===============================
     *  FUNÇÕES DE LOGIN 
     * ===============================
     */

     /**
      * realiza o login no sistema
      *
      * @param string $email
      * @param string $senha
      * @return void
      */
      public function logar(string $email, string $senha)
      {
          $email =  trim(strtolower($email));
          $senha =  crypt($senha,$this->salt);
 
          $sql = $this->pdo->prepare('SELECT * FROM equipe 
                                     WHERE 
                                     email = :email  AND senha = :senha');
         $sql->bindParam(':email',$email);
         $sql->bindParam(':senha',$senha);
         $sql->execute();
         @session_start();
         // verificar se a consulta retornou alguma informação
         if($sql->rowCount() == 1)
         {
             $equipe = $sql->fetch(PDO::FETCH_OBJ);
             $_SESSION['nome'] = $equipe->nome;           
             $_SESSION['id_equipe'] = $equipe->id_equipe;
             $_SESSION['logado'] = true;            
             header('location:index-att.php');
 
         }
         else
         {
             session_destroy();
             header('location:index.php?e');
         }
 
      }


   /**
    * retorna os dados do equipe
    *
    * @param integer $id_equipe
    * @return object
    */
    public function mostrar( $id_equipe)
    {
        $sql = $this->pdo->prepare('SELECT * FROM equipe 
                                    WHERE id_equipe = :id_equipe');
        $sql->bindParam(':id_equipe',$id_equipe);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    /**
      * Verifica se um E-mail já esta sendo utilizado
      *
      * @param string $email
      * @return boolean
      */
      public function verificarDuplicidadeDeEmail(string $email)
      {
         $sql = $this->pdo->prepare('SELECT email FROM equipe WHERE email = :email');
         $sql->bindParam(':email',$email);        
         $sql->execute();
 
         if ($sql->rowCount() > 0 ){           
             return true;
         } else {           
             return false;
         }
         
      }

      /**
      * realiza o login no sistema
      *
      * @param string $email
      * @param string $senha
      * @return response
      */
//      public function logado(string $email, string $senha)
//      {
//          $email =  trim(strtolower($email));
//          $senha =  crypt($senha,$this->salt);

//          $sql = $this->pdo->prepare('SELECT * FROM equipe 
//                                     WHERE 
//                                     email = :email  AND senha = :senha');
//         $sql->bindParam(':email',$email);
//         $sql->bindParam(':senha',$senha);
//         $sql->execute();
//         @session_start();
//         // verificar se a consulta retornou alguma informação
//         if($sql->rowCount() == 1)
//         {
//             $equipe = $sql->fetch(PDO::FETCH_OBJ);
//             $_SESSION['nome'] = $equipe->nome;           
//             $_SESSION['id_equipe'] = $equipe->id_equipe;
//             $_SESSION['logado'] = true;            
//             header('location:index-att.php');

//         }
//         else
//         {
//             session_destroy();
//             header('location:index.php?e');
//         }

//      }
}
?>
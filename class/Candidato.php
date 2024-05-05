<?php
require_once('class/Conexao.php');
class Candidato extends Conexao
{
    public $pdo;
    public $salt = 'Sen@c!';

    public function __construct()
    {
        $this->pdo = Conexao::conexao();                            
    }

    
    
    /**
     * lista os candidatos
     *   
     * @return array
     * 
     */
    public function Listar(int $id_candidato = null)
    {
       $sql = $this->pdo->prepare('SELECT * FROM candidato 
       WHERE id_candidato = :id_candidato ORDER BY nome ');
       $sql->bindParam(':id_candidato', $id_candidato);
       $sql->execute();      
       $dados =  $sql->fetchAll(PDO::FETCH_OBJ);
       return $dados;
    }


   /**
    * retorna os dados do candidato
    *
    * @param integer $id_candidato
    * @return object
    */
    public function Mostrar( $id_candidato)
    {
        $sql = $this->pdo->prepare('SELECT * FROM candidato 
                                    WHERE id_candidato = :id_candidato');
        $sql->bindParam(':id_candidato',$id_candidato);
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
         $sql = $this->pdo->prepare('SELECT email FROM candidato WHERE email = :email');
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
     public function logado(string $email, string $senha)
     {
         $email =  trim(strtolower($email));
         $senha =  crypt($senha,$this->salt);

         $sql = $this->pdo->prepare('SELECT * FROM candidato 
                                    WHERE 
                                    email = :email  AND senha = :senha');
        $sql->bindParam(':email',$email);
        $sql->bindParam(':senha',$senha);
        $sql->execute();
        @session_start();
        // verificar se a consulta retornou alguma informação
        if($sql->rowCount() == 1)
        {
            $candidato = $sql->fetch(PDO::FETCH_OBJ);
            $_SESSION['nome'] = $candidato->nome;           
            $_SESSION['id_candidato'] = $candidato->id_candidato;
            $_SESSION['logado'] = true;            
            header('location:index-att.php');

        }
        else
        {
            session_destroy();
            header('location:index.php?e');
        }

     }
}
?>
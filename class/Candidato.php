<?php
// require_once('class/Conexao.php');
class Candidato
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
        $sql = $this->pdo->prepare('INSERT INTO candidato 
                                    (nome, apelido, email, senha, foto)
                                    values
                                    (:nome, :apelido, :email, :senha, :foto)'
                                    );

        //tratar os dados recebidos        
        $nome               = $dados['nome'];
        $apelido            = $dados['apelido'];
        $email              = strtolower(trim($dados['email']));
        $senha              = $dados['senha'];
        $foto = '';

        if($foto_enviada){
            $nome_da_foto = Helper::sobeArquivo($foto_enviada,'imagens/candidatos/');
            //verificar se o upload deu certo
            if($nome_da_foto){
                   $foto = $nome_da_foto;
            }
        }

        //mesclar os dados com os parametros
        $sql->bindParam(':nome',$nome);
        $sql->bindParam(':apelido',$apelido);
        $sql->bindParam(':email',$email);
        $sql->bindParam(':senha',$senha);     
        $sql->bindParam(':foto',$foto);  
        // executar
        $sql->execute();
        return $this->pdo->lastInsertId();

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
      
      /**
       * mostrar imagem
       */


/**
 * atualiza um determinado candidato
 *
 * @param array $dados
//  * @param file $imagem
 * @return int id - do candidato
 */
public function editar(array $dados, $foto_atual = null)
{
    $sql = $this->pdo->prepare("UPDATE candidato SET
                                nome = :nome,
                                apelido = :apelido,
                                email = :email,
                                senha = :senha
                                WHERE id_candidato = :id_candidato
                              ");
    // tratar os dados
    $id_candidato          = $dados['id_candidato'];       
    $nome                  = $dados['nome'];
    $apelido               = $dados['apelido'];
    $email                 = strtolower(trim($dados['email']));
    $senha                 = crypt($dados['senha'],$this->salt);
    // $foto               = '';

        // verificar se alguma imagem foi enviada 
        // e realizar o upload da imagem
        // verificar sew o upload deu certo
        // if($foto){
        //     $nome_da_foto = Helper::sobeArquivo($foto_atual,'imagens/usuario/');
        //     //verificar se o upload deu certo
        //     if($nome_da_foto){
        //         $foto = $nome_da_foto;
        //     }
        //     else
        //     {
        //         // manter a foto que já existia na notícia
        //         $foto = $dados['foto_atual'];
        //     }
        // }
   //mesclar os dados com os parametros
   $sql->bindParam(':id_candidato',$id_candidato);
   $sql->bindParam(':nome',$nome);
   $sql->bindParam(':apelido',$apelido);
   $sql->bindParam(':email',$email);
   $sql->bindParam(':senha',$senha);     
//    $sql->bindParam(':foto',$foto);  

    // excutar o SQL
    $sql->execute();
    return $id_candidato;

}

public function enviarLinkPerfil(int $id_candidato) {
    // Substitua estas informações com as suas
    $recrutador_email = 'recrutador@empresa.com';
    $assunto = 'Perfil do candidato para a vaga';
    $link_perfil = 'http://seusite.com/perfil_candidato.php?id=' . $candidato_id;
    $mensagem = "Perfil do candidato: $link_perfil";
    // Enviar o email
    mail($recrutador_email, $assunto, $mensagem);
}

/**
     * atualiza o candidato
     *
     * @param array $dados
    //  * @param file $foto_enviada
     * @return int
     */
    public function Atualizar(array $dados, $foto = null)
    {
        $sql = $this->pdo->prepare("UPDATE candidato SET
                                    nome = :nome,
                                    apelido = :apelido,
                                    email = :email,
                                    senha = :senha
                                    WHERE id_candidato = :id_candidato
                                  ");
        // tratar os dados
        $id_candidato          = $dados['id_candidato'];       
        $nome                  = $dados['nome'];
        $apelido               = $dados['apelido'];
        $email                 = strtolower(trim($dados['email']));
        $senha                 = crypt($dados['senha'],$this->salt);

            // verificar se alguma foto foi enviada 
            // e realizar o upload da foto
            // verificar sew o upload deu certo
            // if($foto){
            //     $nome_da_foto = Helper::sobeArquivo($foto,'imagens/candidatos/');
            //     //verificar se o upload deu certo
            //     if($nome_da_foto){
            //         $foto = $nome_da_foto;
            //     }
            //     else
            //     {
            //         // manter a foto que já existia na notícia
            //         $foto = $dados['foto_atual'];
            //     }
            // }
        

        //mesclar os dados com os parametros
        $sql->bindParam(':id_candidato',$id_candidato);
        $sql->bindParam(':nome',$nome);
        $sql->bindParam(':apelido',$apelido);
        $sql->bindParam(':email',$email);
        $sql->bindParam(':senha',$senha);     
        // $sql->bindParam(':foto',$foto);  
 
        // executar
        $sql->execute();
        return $dados['id_candidato'];
    }

    /**
     * lista os candidatos
     *   
     * @return array
     * 
     */
    public function listar(int $id_candidato = null)
    {
       $sql = $this->pdo->prepare('SELECT * FROM candidato ORDER BY id_candidato ');
    //    $sql->bindParam(':id_candidato', $id_candidato);
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
    public function mostrar( $id_candidato)
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
//      public function logado(string $email, string $senha)
//      {
//          $email =  trim(strtolower($email));
//          $senha =  crypt($senha,$this->salt);

//          $sql = $this->pdo->prepare('SELECT * FROM candidato 
//                                     WHERE 
//                                     email = :email  AND senha = :senha');
//         $sql->bindParam(':email',$email);
//         $sql->bindParam(':senha',$senha);
//         $sql->execute();
//         @session_start();
//         // verificar se a consulta retornou alguma informação
//         if($sql->rowCount() == 1)
//         {
//             $candidato = $sql->fetch(PDO::FETCH_OBJ);
//             $_SESSION['nome'] = $candidato->nome;           
//             $_SESSION['id_candidato'] = $candidato->id_candidato;
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
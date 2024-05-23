<?php
// require_once('class/Conexao.php');
class Jogo
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
        $sql = $this->pdo->prepare('INSERT INTO vaga 
                                    (nome_jogo, data_hora, resultado, foto)
                                    values
                                    (:nome_jogo, :data_hora, :resultado, :foto)'
                                    );

        //tratar os dados recebidos        
        $nome_jogo                 = $dados['nome_jogo'];
        $data_hora                 = date('Y-m-d H:i:s');
        $resultado                 = $dados['resultado'];
        $foto = '';

        if($foto_enviada){
            $jogo_da_foto = Helper::sobeArquivo($foto_enviada,'imagens/jogos/');
            //verificar se o upload deu certo
            if($jogo_da_foto){
                   $foto = $jogo_da_foto;
            }
        }

        //mesclar os dados com os parametros
        $sql->bindParam(':nome_jogo',$nome_jogo);
        $sql->bindParam(':data_hora',$data_hora);
        $sql->bindParam(':resultado',$resultado);    
        $sql->bindParam(':foto',$foto);  
        // executar
        $sql->execute();
        return $this->pdo->lastInsertId();

    }
    /**
     * lista os jogos
     *   
     * @return array
     * 
     */
    public function listar(int $id_jogo = null)
    {
       $sql = $this->pdo->prepare('SELECT * FROM jogo ORDER BY id_jogo ');
    //    $sql->bindParam(':id_jogo', $id_jogo);
       $sql->execute();      
       $dados =  $sql->fetchAll(PDO::FETCH_OBJ);
       return $dados;
    }

   /**
    * retorna os dados do vaga
    *
    * @param integer $id_jogo
    * @return object
    */
    public function mostrar( $id_jogo)
    {
        $sql = $this->pdo->prepare('SELECT * FROM jogo 
                                    WHERE id_jogo = :id_jogo');
        $sql->bindParam(':id_jogo',$id_jogo);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    
}
?>
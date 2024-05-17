<?php
// require_once('class/Conexao.php');
class Vaga
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
                                    (jogo, titulo_vaga, descricao_vaga, requisitos, num_vagas, status, salario, criacao, encerramento, jogo_id_jogo)
                                    values
                                    (:jogo, :titulo_vaga, :descricao_vaga, :requisitos, :num_vagas, :status, :salario, :criacao, :encerramento, :jogo_id_jogo)'
                                    );

        //tratar os dados recebidos        
        $jogo                      = $dados['jogo'];
        $titulo_vaga               = $dados['titulo_vaga'];
        $descricao_vaga            = $dados['descricao_vaga'];
        $requisitos                = $dados['requisitos'];
        $num_vagas                 = $dados['num_vagas'];
        $status                    = $dados['status'];
        $salario                   = $dados['salario'];
        $criacao                   = $dados['criacao'];
        $encerramento              = date('Y-m-d H:i:s');
        $jogo_id_jogo              = $dados['jogo_id_jogo'];
        
        $foto = '';

        if($foto_enviada){
            $jogo_da_foto = Helper::sobeArquivo($foto_enviada,'imagens/vagas/');
            //verificar se o upload deu certo
            if($jogo_da_foto){
                   $foto = $jogo_da_foto;
            }
        }

        //mesclar os dados com os parametros
        $sql->bindParam(':jogo',$jogo);
        $sql->bindParam(':titulo_vaga',$titulo_vaga);
        $sql->bindParam(':descricao_vaga',$descricao_vaga);
        $sql->bindParam(':requisitos',$requisitos);     
        $sql->bindParam(':num_vagas',$num_vagas);     
        $sql->bindParam(':status',$status);     
        $sql->bindParam(':salario',$salario);     
        $sql->bindParam(':criacao',$criacao);     
        $sql->bindParam(':encerramento',$encerramento);     
        $sql->bindParam(':jogo_id_jogo',$jogo_id_jogo);     
        $sql->bindParam(':foto',$foto);  
        // executar
        $sql->execute();
        return $this->pdo->lastInsertId();

    }

    /**
     * atualiza a vaga
     *
     * @param array $dados
    //  * @param file $foto_enviada
     * @return int
     */
    public function Atualizar(array $dados, $foto = null)
    {
        $sql = $this->pdo->prepare("UPDATE vaga SET
                                    jogo = :jogo,
                                    titulo_vaga = :titulo_vaga,
                                    descricao_vaga = :descricao_vaga,
                                    requisitos = :requisitos,
                                    num_vagas = :num_vagas,
                                    status = :status,
                                    salario = :salario,
                                    encerramento = :encerramento,
                                    jogo_id_jogo = :jogo_id_jogo
                                    WHERE id_vaga = :id_vaga
                                  ");
        // tratar os dados
        $id_vaga               = $dados['id_vaga'];       
        $jogo                  = $dados['jogo'];
        $titulo_vaga           = $dados['titulo_vaga'];
        $descricao_vaga        = $dados['descricao_vaga'];
        $requisitos            = $dados['requisitos'];
        $num_vagas             = $dados['num_vagas'];
        $status                = $dados['status'];
        $salario               = $dados['salario'];
        $encerramento          = $dados['encerramento'];
        $jogo_id_jogo          = $dados['jogo_id_jogo'];
       

            // verificar se alguma foto foi enviada 
            // e realizar o upload da foto
            // verificar sew o upload deu certo
            if($foto){
                $jogo_da_foto = Helper::sobeArquivo($foto,'imagens/vagas/');
                //verificar se o upload deu certo
                if($jogo_da_foto){
                    $foto = $jogo_da_foto;
                }
                else
                {
                    // manter a foto que já existia na notícia
                    $foto = $dados['foto_atual'];
                }
            }
        

        //mesclar os dados com os parametros
        $sql->bindParam(':id_vaga',$id_vaga);
        $sql->bindParam(':jogo',$jogo);
        $sql->bindParam(':titulo_vaga',$titulo_vaga);
        $sql->bindParam(':descricao_vaga',$descricao_vaga);
        $sql->bindParam(':requisitos',$requisitos);     
        $sql->bindParam(':num_vagas',$num_vagas);     
        $sql->bindParam(':status',$status);     
        $sql->bindParam(':salario',$salario);     
        $sql->bindParam(':encerramento',$encerramento);     
        $sql->bindParam(':jogo_id_jogo',$jogo_id_jogo);     
        // $sql->bindParam(':foto',$foto);  
 
        // executar
        $sql->execute();
        return $dados['id_vaga'];
    }
    
    /**
     * lista os vagas
     *   
     * @return array
     * 
     */
    public function listar(int $id_vaga = null)
    {
       $sql = $this->pdo->prepare('SELECT * FROM vaga ORDER BY id_vaga ');
    //    $sql->bindParam(':id_vaga', $id_vaga);
       $sql->execute();      
       $dados =  $sql->fetchAll(PDO::FETCH_OBJ);
       return $dados;
    }

 /**
     * Excluir vaga
     *
     * @param integer $id_vaga
     * @return void (esse metodo não retorna nada)
     */
    public function excluir(int $id_vaga)
    {
        $sql = $this->pdo->prepare('DELETE FROM vaga WHERE id_vaga = :id_vaga');
        $sql->bindParam(':id_vaga',$id_vaga);
        $sql->execute();
    }

   /**
    * retorna os dados do vaga
    *
    * @param integer $id_vaga
    * @return object
    */
    public function mostrar( $id_vaga)
    {
        $sql = $this->pdo->prepare('SELECT * FROM vaga 
                                    WHERE id_vaga = :id_vaga');
        $sql->bindParam(':id_vaga',$id_vaga);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    
}
?>
<?php 

/**
 * Categoria
 */
class Fornecedor extends Conexao
{
    
    # ATRIBUTOS	
	public $pdo;
    
    public function __construct()
    {
        $this->pdo = Conexao::conexao();               
    }

    /**
     * listar
     * @return array
     */
    public function listar(){
    	//montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('SELECT * FROM fornecedor ORDER BY razao_social');
    	//executar a consulta
    	$sql->execute();
    	//pegar os dados retornados
    	$dados = $sql->fetchAll(PDO::FETCH_OBJ);
    	return $dados;
    }

    // /**
    //  * cadastrar a categoria
    //  *
    //  * @param Array $dados
    //  * @return int 
    //  */
    // public function cadastrar(Array $dados)
    // {
    //     $sql = $this->pdo->prepare('INSERT INTO fornecedor
    //                                 (fornecedor)
    //                                 VALUES
    //                                 (:fornecedor)
    //                                 ');
    //     //mesclar os dados
    //     $sql->bindParam(':fornecedor',$dados['fornecedor']);
    //     //executar
    //     $sql->execute();
    //     return $this->pdo->lastInsertId();
    // }

    public function cadastrar(array $dados, $foto_enviada = null)
    {
        $sql = $this->pdo->prepare('INSERT INTO fornecedor 
                                    (razao_social, cnpj, email, nome_de_contato, cargo, observacoes, endereco, cep, numero, telefone, ddd, bairro, cidade, estado)
                                    values
                                    (:razao_social, :cnpj, :email, :nome_de_contato, :cargo, :observacoes, :endereco, :cep, :numero, :telefone, :ddd, :bairro, :cidade, :estado)'
                                    );

        //tratar os dados recebidos        
        $razao_social               = $dados['razao_social'];
        $cnpj               = $dados['cnpj'];
        $email              = strtolower(trim($dados['email']));
        $nome_de_contato    = $dados['nome_de_contato'];
        $cargo = $dados['cargo'];
        $observacoes = $dados['observacoes'];
        $endereco = $dados['endereco'];
        $cep = $dados['cep'];
        $numero = $dados['numero'];
        $telefone = $dados['telefone'];
        $ddd = $dados['ddd'];
        $bairro = $dados['bairro'];
        $cidade = $dados['cidade'];
        $estado = $dados['estado'];

        //mesclar os dados com os parametros
        $sql->bindParam(':razao_social',$razao_social);
        $sql->bindParam(':cnpj',$cnpj);
        $sql->bindParam(':email',$email);
        $sql->bindParam(':nome_de_contato',$nome_de_contato);     
        $sql->bindParam(':cargo',$cargo);  
        $sql->bindParam(':observacoes',$observacoes);  
        $sql->bindParam(':endereco',$endereco);  
        $sql->bindParam(':cep',$cep);  
        $sql->bindParam(':numero',$numero);  
        $sql->bindParam(':telefone',$telefone);  
        $sql->bindParam(':ddd',$ddd);  
        $sql->bindParam(':bairro',$bairro);  
        $sql->bindParam(':cidade',$cidade);  
        $sql->bindParam(':estado',$estado);  
        
       
        // executar
        $sql->execute();
        return $this->pdo->lastInsertId();

    }

    
    // /**
    //  * Excluir Categoria
    //  *
    //  * @param integer $id_categoria
    //  * @return void
    //  */
    // public function excluir(int $id_fornecedor)
    // {
    //     // atualizar todas as noticias dessa categoria
    //     // para a categoria padrão
    //     $pdo = $this->pdo->prepare('UPDATE noticias SET 
    //                                 id_categoria = 1
    //                                 WHERE
    //                                 id_categoria = :id_categoria
    //                                 AND
    //                                 id_noticia > 0
    //                             ');
    //     $pdo->bindParam(':id_categoria',$id_categoria);
    //     $pdo->execute();

    //     // excluir a categoria
    //     //$sql = $this->pdo->prepare('DELETE FROM categorias WHERE id_categoria = :id_categoria');
    //     $sql = $this->pdo->prepare('UPDATE categorias SET 
    //                                 excluido = 1
    //                                 WHERE 
    //                                 id_categoria = :id_categoria
    //                             ');
    //     $sql->bindParam(':id_categoria',$id_categoria);
    //     $sql->execute();
    // }

    /**
     * mostra a categoria
     *
     * @param integer $id_fornecedor
     * @return object
     */
    public function mostrar(int $id_fornecedor)
    {
        $sql = $this->pdo->prepare('SELECT * FROM fornecedor WHERE id_fornecedor = :id_fornecedor');
        $sql->bindParam(':id_fornecedor',$id_fornecedor);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    /**
     * editar
     *
     * @param array $dados
     * @return int
     */
    // public function editar(array $dados)
    // {
    //     if($dados['id_fornecedor'] != '' && isset($dados['id_fornecedor']) ){
           
    //         $sql = $this->pdo->prepare('UPDATE fornecedor SET 
    //                                 razao_social = :razao_social,
    //                                 email = :email,
    //                                 cnpj = :cnpj
    //                                 nome_de_contato = :nome_de_contato,
    //                                 cargo = :cargo,
    //                                 observacoes = :observacoes,
    //                                 endereco = :endereco,
    //                                 cep = :cep,
    //                                 numero = :numero,
    //                                 telefone = :telefone,
    //                                 ddd = :ddd,
    //                                 bairro = :bairro,
    //                                 estado = :estado,
    //                                 cidade = :cidade
    //                                 WHERE 
    //                                 id_fornecedor = :id_fornecedor
    //                             ');

    //         $sql->bindParam(':id_fornecedor',$dados['id_fornecedor']);
    //         $sql->bindParam(':razao_social',$dados['razao_social']);
    //         $sql->bindParam(':telefone',$dados['telefone']);
    //         $sql->bindParam(':email',$dados['email']);
    //         $sql->bindParam(':cnpj',$dados['cnpj']);
    //         $sql->bindParam(':nome_de_contato',$dados['nome_de_contato']);
    //         $sql->bindParam(':cargo',$dados['cargo']);
    //         $sql->bindParam(':observacoes',$dados['observacoes']);
    //         $sql->bindParam(':endereco',$dados['endereco']);
    //         $sql->bindParam(':cep',$dados['cep']);
    //         $sql->bindParam(':numero',$dados['numero']);
    //         $sql->bindParam(':ddd',$dados['ddd']);
    //         $sql->bindParam(':bairro',$dados['bairro']);
    //         $sql->bindParam(':cidade',$dados['cidade']);
    //         $sql->bindParam(':estado',$dados['estado']);
    //         $sql->execute();
    //         return $dados['id_fornecedor'];
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }

    /**
     * atualiza um determinado produto
     *
     * @param array $dados
     * @param file $imagem
     * @return int id - do produto
     */
        public function editar(array $dados)
    {
        $sql = $this->pdo->prepare("UPDATE fornecedor SET
                                    nome_de_contato = :nome_de_contato,
                                    cnpj = :cnpj,
                                    razao_social = :razao_social,
                                    cargo = :cargo,
                                    email = :email,
                                    ddd = :ddd,
                                    telefone = :telefone,
                                    observacoes = :observacoes,
                                    cep = :cep,
                                    endereco = :endereco,
                                    numero = :numero,
                                    bairro = :bairro,
                                    estado = :estado,
                                    cidade = :cidade
                                    WHERE id_fornecedor = :id_fornecedor
                                  ");
        // tratar os dados
        $id_fornecedor       = $dados['id_fornecedor'];
        $nome_de_contato     = $dados['nome_de_contato'];
        $cnpj                = $dados['cnpj'];
        $razao_social        = ucfirst(strtolower(trim($dados['razao_social'])));;
        $cargo               = $dados['cargo'] ;
        $email               = $dados['email'];
        $ddd                 = trim($dados['ddd']);
        $telefone            = $dados['telefone'];
        $observacoes         = $dados['observacoes'];
        $cep                 = $dados['cep'];
        $endereco            = $dados['endereco'];
        $numero              = $dados['numero'];
        $bairro              = $dados['bairro'];
        $estado              = $dados['estado'];
        $cidade              = $dados['cidade'];
        
        // MESCLAR OS DADOS
        $sql->bindParam(':id_fornecedor',$id_fornecedor);
        $sql->bindParam(':nome_de_contato',$nome_de_contato);
        $sql->bindParam(':cnpj',$cnpj);
        $sql->bindParam(':razao_social',$razao_social);
        $sql->bindParam(':cargo',$cargo);
        $sql->bindParam(':email',$email);
        $sql->bindParam(':ddd',$ddd);
        $sql->bindParam(':telefone',$telefone);
        $sql->bindParam(':observacoes',$observacoes);
        $sql->bindParam(':cep',$cep);
        $sql->bindParam(':endereco',$endereco);
        $sql->bindParam(':numero',$numero);
        $sql->bindParam(':bairro',$bairro);
        $sql->bindParam(':estado',$estado);
        $sql->bindParam(':cidade',$cidade);

        // excutar o SQL
        $sql->execute();
        return $id_fornecedor;

    }
     /**
     * Excluir Fornecedor
     *
     * @param integer $id_fornecedor
     * @return void
     */
    public function excluir(int $id_fornecedor)
    {
        $sql = $this->pdo->prepare('DELETE FROM fornecedor WHERE id_fornecedor = :id_fornecedor');
        $sql->bindParam(':id_fornecedor',$id_fornecedor);
        $sql->execute();
    }


}

?>
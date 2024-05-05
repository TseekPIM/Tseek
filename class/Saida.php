  <?php
       
    /**
    * Categoria
    */
    class Saida extends Conexao
    {
    
    # ATRIBUTOS	
	public $pdo;
    
    public function __construct()
    {
        $this->pdo = Conexao::conexao();               
    
    }


    /**
     * Pesquisar produto
     * @return array
     */
    public function pesquisarSaida($q){
    	//montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('  SELECT * FROM produtos_individuais
        INNER JOIN produtos ON produtos.id_produto = produtos_individuais.id_produto
		INNER JOIN tipo_saida ON tipo_saida.id_tipo_saida = tipo_saida.id_tipo_saida
        INNER JOIN saida ON saida.id_saida = produtos_individuais.id_saida 
        INNER JOIN usuarios ON usuarios.id_usuario = saida.id_usuario 
		WHERE produtos.nome        like :nome_produto  
		or saida.data_saida        like :data_saida
		or tipo_saida.tipo_saida   like :tipo_saida
        or saida.observacoes       like :observacoes
	    or saida.nota_fiscal       like :nota_fiscal
		or usuarios.nome           like :nome_usuario
	    or produtos.quantidade     like :quantidade ');

        // mesclas
        $pesquisado = '%'.$q.'%';
        $sql->bindParam(':nome_produto',$pesquisado);
        $sql->bindParam(':data_saida',$pesquisado);
        $sql->bindParam(':tipo_saida',$pesquisado);
        $sql->bindParam(':observacoes',$pesquisado);
        $sql->bindParam(':nota_fiscal',$pesquisado);
        $sql->bindParam(':nome_usuario',$pesquisado);
        $sql->bindParam(':quantidade',$pesquisado);
    	//executar a consulta
    	$sql->execute();
    	//pegar os dados retornados
    	$dados = $sql->fetchAll(PDO::FETCH_OBJ);
    	return $dados;
   	 }







     /**
     * listar
     * @return array
     */
    public function listarProduto(int $id_produto = null){
    	//montar o SELECT ou o SQL
        if ($id_produto) {
            $sql = $this->pdo->prepare('SELECT * FROM produtos WHERE id_produto = :id_produto ORDER BY data');
            $sql->bindParam(':id_produto', $id_produto);
        }else {
            $sql = $this->pdo->prepare('SELECT * FROM produtos ORDER BY data');
        }
    	
    	//executar a consulta

    	$sql->execute();
    	
        //pegar os dados retornados

    	$dados = $sql->fetchAll(PDO::FETCH_OBJ);
    	return $dados;
    }

      /**
     * listar
     * @return array
     */
    public function listarSaida(){
    	//montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('SELECT produtos.nome as nomeProd, saida.data_saida, tipo_saida.tipo_saida, produtos.quantidade,
        saida.nota_fiscal, saida.observacoes, usuarios.nome as nomeUsu FROM produtos_individuais
        INNER JOIN produtos ON produtos.id_produto = produtos_individuais.id_produto
        INNER JOIN saida ON saida.id_saida = produtos_individuais.id_saida 
        INNER JOIN tipo_saida ON tipo_saida.id_tipo_saida = saida.id_tipo_saida 
        INNER JOIN usuarios ON usuarios.id_usuario = saida.id_usuario
        ');
    	//executar a consulta
    	$sql->execute();
    	//pegar os dados retornados
    	$dados = $sql->fetchAll(PDO::FETCH_OBJ);
        // $sql->debugDumpParams();

        // var_dump($dados);
        // die();
    	return $dados;
    }

       public function CadastrarSaidaDoProduto(array $dados)
       {
       
        $produto_quantidade = explode('|',$dados['id_produto']);
        $id_produto = $produto_quantidade[0];
        $quantidade = $produto_quantidade[1];
        $qtd_saida  = intval($dados['qtd_saida']);       
        
        

        //Rotina de seleção do id_produto na tabela "produtos_individuais"
        $sql = $this->pdo->prepare('SELECT * FROM produtos_individuais
        WHERE id_produto = :id_produto and status = "ATIVO" limit '.$quantidade);

        $sql->bindParam(':id_produto', $id_produto );

        $sql->execute();

        $dados_produtos_individuais = $sql->fetchAll(PDO::FETCH_OBJ);


        //Rotina de inserção na tabela de "saida"
        // print_r($dados);die;
        $sql = $this->pdo->prepare('INSERT INTO saida
                                  (id_usuario,id_tipo_saida,nota_fiscal,observacoes, data_saida)
                                  VALUES 
                                  (:id_usuario,:id_tipo_saida,:nota_fiscal,:observacoes, :data_saida)
                                  ');
 
       
        
        // TRATAR OS DADOS


        $data_saida             = date('Y-m-d H:i:s');
        $id_usuario             = $dados['id_usuario'];
        $id_tipo_saida          = $dados['id_tipo_saida'];
        $nota_fiscal            = $dados['nota_fiscal'];
        $observacoes            = $dados['observacoes'];

        $sql->bindParam(':id_usuario', $id_usuario);
        $sql->bindParam(':id_tipo_saida', $id_tipo_saida);
        $sql->bindParam(':nota_fiscal', $nota_fiscal);
        $sql->bindParam(':data_saida', $data_saida);
        $sql->bindParam(':observacoes', $observacoes);
        

        $sql->execute(); 
        $id_saida =  $this->pdo->lastInsertId();
        // FIM - Rotina de inserção na tabela de "saida"
        
        foreach($dados_produtos_individuais as $produto_individual){    
            // echo "<PRE>";
            // print_r($produto_individual);
            // echo "</PRE>";            
            // echo $produto_individual->id_produto_individual."<BR>";
            //Rotina update na tabela de proutos_individuais dando baixa no produto_individual
            $sql_baixa = $this->pdo->prepare('UPDATE produtos_individuais 
            set 
            status="INATIVO", 
            id_saida = :id_saida 
            WHERE id_produto_individual = :id_produto_individual');

            $sql_baixa->bindParam(':id_produto_individual',  $produto_individual->id_produto_individual);
            $sql_baixa->bindParam(':id_saida',  $id_saida);

            $sql_baixa->execute();

            // $sql_baixa->debugDumpParams();

            // die($sql_baixa);
        }


            //Rotina de inserção na tabela de "saida"
            // $sql = $this->pdo->prepare('SELECT * FROM produtos
            // WHERE id_produto = :id_produto and status = "ATIVO" AND quantidade = :quantidade');
    
            // $sql->bindParam(':id_produto', $id_produto );
            // $sql->bindParam(':quantidade', $quantidade );
    
            // $sql->execute();
    
            // $dados_produtos = $sql->fetchA(PDO::FETCH_OBJ);
            //Rotina de inserção na tabela de "saida"       
        

         $sqlproduto = $this->pdo->prepare('SELECT * FROM produtos  where id_produto = :id_produto');
         $sqlproduto->bindParam(':id_produto', $id_produto);
         $sqlproduto->execute();

         $produto = $sqlproduto->fetch(PDO::FETCH_OBJ);
         $nova_quantidade =  intval($quantidade) - intval($qtd_saida) ;
        //  echo 'esse: '.$qtd_saida.'<br>';
        //  echo intval($quantidade).'<br>';
        //  echo 'esse: '.$nova_quantidade.'<br>';
        // die($nova_quantidade);
        
         //Rotina de atualização da uantidade na tabela produtos
        $sql_update = $this->pdo->prepare('UPDATE produtos SET quantidade = :nova_quantidade 
                                                            WHERE id_produto = :id_produto ');

        $sql_update->bindParam(':id_produto',  $id_produto);
        $sql_update->bindParam(':nova_quantidade',  $nova_quantidade);

        // echo $quantidade;
        // echo '<br>'.$id_produto;
        // die();


        $sql_update->execute();

        //  $sql_update->debugDumpParams();
        // echo '<br>';
        // die($qtd);

        //FIM - Rotina de atualização da uantidade na tabela produtos

        //Comando para mostrar qual sintaxe SQL foi rodadda no Banco - colocar depois do Execute
        // $sql->debugDumpParams();

    //     return $this->pdo->lastInsertId();

        // return $id_produto;
        // return $dados;


    }
        

    /**
     * retorna a lista de tipo de saida
     *
     * @return object
     */
    public function TipoDeSaida(){
        
        $sql = $this->pdo->prepare('SELECT * FROM 
                                tipo_saida
                                ORDER BY tipo_saida ASC
                                ');
        $sql->execute();
        $dados = $sql->fetchAll(PDO::FETCH_OBJ);
        return $dados;
    }

    
    /**
     * lista os usuários por nivel de acesso
     *
     * @param string $tipo_saida
     * @return object
     * 
     */
    public function Listar(string $tipo_saida = '')
    {
       if ($tipo_saida != '') {
           $sql = $this->pdo->prepare('SELECT * FROM tipo_saida
                                     WHERE id_tipo_saida = :id_tipo_saida
                                     ');
            $sql->bindParam(':id_tipo_saida',$tipo_saida);
       }
       else
       {
        $sql = $this->pdo->prepare('SELECT * FROM tipo_saida     
                                    ');
       }
       $sql->execute();
       return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * mostrar
     * @param int $id_produto
     * @return object
     */
    public function mostrar(int $id_usuario){
    	//montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('SELECT * FROM produtos WHERE id_usuario = :id_usuario');
        $sql->bindParam(':id_usuario', $id_usuario);
    	//executar a consulta
    	$sql->execute();
    	//pegar os dados retornados
    	$dados = $sql->fetch(PDO::FETCH_OBJ);
    	return $dados;
    }


}
    ?>
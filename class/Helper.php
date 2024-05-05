<?php

/**
 * Classe com metodos estáticos
 */
class Helper{

  /**
   * Sobe Arquivo
   * @param  file  $arquivo    - Pode ser uma imagem ou qualquer outro
   *                             tipo de arquivo
   * @param  string $diretorio - Caminho da pasta onde o arquivo
   *                             será armazenado
   * @return string || false     - nome do arquivo
   */
// public static function sobeArquivo($arquivo,$diretorio = 'imagens/'){
//     $arquivo = $arquivo;
//     // pegar apenas o nome original do arquivo
//     $nome_arquivo = $arquivo['name'];
//       // verificar se algum arquivo foi enviado
//       if(trim($nome_arquivo)!= '') {
//           // pegar a extensao do arquivo         
//           $extensao = explode('.', $nome_arquivo);
//           // gerar nome         
//           $novo_nome = date('YmdHis').rand(0,1000).'.'.end($extensao);         

//           // montar o destino onde o arquivo será armazenado         
//           $destino = $diretorio.$novo_nome;                  
//           $ok = move_uploaded_file($arquivo['tmp_name'],$destino);
//           // verificar se o upload foi realizado
//           if($ok) {
//             return $novo_nome;            
//           } else {
//             return false;
//           }

//       } else {
//         return false;
//       }
//   }


    /**
     * retorna o nome da categoria
     *
     * @param integer $id_categoria
     * @return string
     */

    public static function nomeDaCategoria(int $id_categoria)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT * FROM categoria 
                                    WHERE id_categoria = :id_categoria');
        $sql->bindParam(':id_categoria', $id_categoria);
        $sql->execute();
        $categoria = $sql->fetch(PDO::FETCH_OBJ);
        return $categoria->categoria;
    }

    /**
     * retorna o nome da categoria
     *
     * @param integer $id_categoria
     * @return string
     */

    public static function nomeDoProduto(int $id_produto)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT * FROM produtos 
                                    WHERE id_produto = :id_produto');
        $sql->bindParam(':id_produto', $id_produto);
        $sql->execute();
        $produto = $sql->fetch(PDO::FETCH_OBJ);
        return $produto->nome;
    }

     /**
     * retorna o nome da categoria
     *
     * @param integer $id_candidato
     * @return string
     */

    public static function nomeDoCandidato(int $id_candidato)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT * FROM candidato 
                                    WHERE id_candidato = :id_candidato');
        $sql->bindParam(':id_candidato', $id_candidato);
        $sql->execute();
        $candidato = $sql->fetch(PDO::FETCH_OBJ);
        return $candidato->nome;
    }



    public static function QuantidadeemEstoque($id_produto)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT quantidade FROM produtos 
                                    WHERE id_produto = :id_produto');
        $sql->bindParam(':id_produto', $id_produto);
        // $sql->bindParam(':quantidade', $quantidade);
        $sql->execute();
        $produto = $sql->fetch(PDO::FETCH_OBJ);
        return $produto->quantidade;
    }




    /**
     * retorna o nome do fabricante
     *
     * @param integer $id_fabricante
     * @return string
     */

    public static function nomeDoFabricante(int $id_fabricante)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT * FROM fabricante 
                                    WHERE id_fabricante = :id_fabricante');
        $sql->bindParam(':id_fabricante', $id_fabricante);
        $sql->execute();
        $fabricante = $sql->fetch(PDO::FETCH_OBJ);
        return $fabricante->nome;
       
    }

    /**
     * retorna o nome do fornecedor
     *
     * @param integer $id_fornecedor
     * @return string
     */

    public static function nomeDoFornecedor(int $id_fornecedor)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT * FROM fornecedor 
                                    WHERE id_fornecedor = :id_fornecedor');
        $sql->bindParam(':id_fornecedor', $id_fornecedor);
        $sql->execute();
        $fornecedor = $sql->fetch(PDO::FETCH_OBJ);
        return $fornecedor->razao_social;
       
    }

    /**
     * mostra a foto do candidato 
     *
     * @param integer $id_candidato
     * @return string || 
     */
    public static function fotoDoAutor(int $id_candidato)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT * FROM candidato 
                                    WHERE id_candidato = :id_candidato');
        $sql->bindParam(':id_candidato', $id_candidato);
        $sql->execute();
        $candidato = $sql->fetch(PDO::FETCH_OBJ);
        //verificar se existe uma foto
       if ($candidato->foto !='') {
        return '<img class= "img-thumbnail" width="150" src="../imagens/candidatos/'.$candidato->foto.'">';
      } else {
        return '';
      }
        
    }
    /**
     * mostra a foto do candidato 
     *
     * @param integer $id_candidato
     * @return string || 
     */
    public static function fotoDocandidato(int $id_candidato = null)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT * FROM candidato 
                                    WHERE id_candidato = :id_candidato');
        $sql->bindParam(':id_candidato', $id_candidato);
        $sql->execute();
        $candidato = $sql->fetch(PDO::FETCH_OBJ);
        //verificar se existe uma foto
       if ($candidato->foto !='') {
        return '<img class= "img-thumbnail" width="150" src="imagens/candidatos/'.$candidato->foto.'">';
      } else {
        return '';
      }
        
    }

    /**
     * retorna o nome do autor
     *
     * @param integer $id_candidato
     * @return string
     */

    public static function NiveldeAcesso(int $id_nivel_de_acesso)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT * FROM niveis_de_acessos 
                                    WHERE id_nivel_de_acesso = :id_nivel_de_acesso');
        $sql->bindParam(':id_nivel_de_acesso', $id_nivel_de_acesso);
        $sql->execute();
        $nivel_de_acesso = $sql->fetch(PDO::FETCH_OBJ);
        return $nivel_de_acesso->nivel_de_acesso;
    }

    /**
     * retonar total de noticias por autor
     *
     * @param integer $id_candidato
     * @return int
     */
    public static function noticiasPorAutor(int $id_candidato)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT COUNT(*) as total FROM noticias
                                    WHERE id_candidato = :id_candidato');
        $sql->bindParam(':id_candidato', $id_candidato);
        $sql->execute();
        $total = $sql->fetch(PDO::FETCH_OBJ);
        // print_r($total); die();
        return $total->total;
    }
    
    /**
     * retorna quantidade de noticias por categoria
     *
     * @param integer $id_categoria
     * @return int
     */
    public static function categoriasPorProduto(int $id_categoria)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT COUNT(*) as total FROM produtos
                                    WHERE id_categoria = :id_categoria');
        $sql->bindParam(':id_categoria', $id_categoria);
        $sql->execute();
        $total = $sql->fetch(PDO::FETCH_OBJ);
        // print_r($total); die();
        return $total->total;
    }


    /**
     * retonar total de comentarios
     *
     * @param integer $id_noticia
     * @return int
     */
    public static function comentarioPorProduto(int $id_noticia)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT COUNT(*) as total FROM comentarios
                                    WHERE id_noticia = :id_noticia');
        $sql->bindParam(':id_noticia', $id_noticia);
        $sql->execute();
        $total = $sql->fetch(PDO::FETCH_OBJ);
        // print_r($total); die();
        return $total->total;
    }
    /**
     * retonar total de comentarios do leitor
     *
     * @param integer $id_candidato
     * @return int
     */
    public static function comentarioPorLeitor(int $id_candidato)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT COUNT(*) as total FROM comentarios
                                    WHERE id_candidato = :id_candidato');
        $sql->bindParam(':id_candidato', $id_candidato);
        $sql->execute();
        $total = $sql->fetch(PDO::FETCH_OBJ);
        // print_r($total); die();
        return $total->total;
    }
    
    /**
     * Transforma a data no padrão do Brasil
     *
     * @param Date $data
     * @return string
     */
    public static function dataBrasil($data = null)
    {
      $date = new DateTime($data);
      return $date->format('d/m/Y');
    }


    /**
     * =====================================
     * CONTROLE DE ACESSO
     * =====================================
     */

     /**
      * verefica se existe variavel de sessão logad
      *
      * @return bool
      */
     public static function logado()
     {
       if (!isset($_SESSION['logado'])) {
         header('location:index.php?e');
       }
     }
}

?>
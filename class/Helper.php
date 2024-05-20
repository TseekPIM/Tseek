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
  public static function sobeArquivo($arquivo,$diretorio = 'imagens/'){
    $arquivo = $arquivo;
    // pegar apenas o nome original do arquivo
    $nome_arquivo = $arquivo['name'];
      // verificar se algum arquivo foi enviado
      if(trim($nome_arquivo)!= '') {
          // pegar a extensao do arquivo         
          $extensao = explode('.', $nome_arquivo);
          // gerar nome         
          $novo_nome = date('YmdHis').rand(0,1000).'.'.end($extensao);         

          // montar o destino onde o arquivo será armazenado         
          $destino = $diretorio.$novo_nome;                  
          $ok = move_uploaded_file($arquivo['tmp_name'],$destino);
          // verificar se o upload foi realizado
          if($ok) {
            return $novo_nome;            
          } else {
            return false;
          }

      } else {
        return false;
      }
  }


  


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
     * retorna o nome do candidato
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
     * retonar total de vagas por equipe
     *
     * @param integer $id_candidato
     * @return int
     */
    public static function vagasporequipe(int $id_equipe)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT COUNT(*) as total FROM noticias
                                    WHERE id_equipe = :id_equipe');
        $sql->bindParam(':id_equipe', $id_equipe);
        $sql->execute();
        $total = $sql->fetch(PDO::FETCH_OBJ);
        // print_r($total); die();
        return $total->total;
    }
    
    /**
     * retorna quantidade de jogos por categoria
     *
     * @param integer $id_categoria
     * @return int
     */
    public static function categoriasPorJogo(int $id_categoria)
    {
        $pdo = Conexao::conexao();
        $sql = $pdo->prepare('SELECT COUNT(*) as total FROM jogo
                                    WHERE id_categoria = :id_categoria');
        $sql->bindParam(':id_categoria', $id_categoria);
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
    // public static function dataBrasil($data = null)
    // {
    //   $date = new DateTime($data);
    //   return $date->format('d/m/Y');
    // }

    /**
     * Transforma uma data em formato padrão brasileiro (dia/mês/ano)
     *
     * @param string|null $data A data a ser formatada (formato YYYY-MM-DD) (opcional, se não fornecida, usa a data atual)
     * @param string $formato O formato de data desejado (opcional, padrão: 'd/m/Y')
     * @return string A data formatada
     */    public static function dataBrasil($data = null, $formato = 'd/m/Y')
{
    // Se não for fornecida uma data, assume a data atual
    if ($data === null) {
        $date = new DateTime();
    } else {
        // Tratamento de data nula ou vazia
        if ($data === '' || $data === '0000-00-00' || $data === '0000-00-00 00:00:00') {
            return '';
        }

        $date = new DateTime($data);
    }

    // Retorna a data formatada conforme o formato especificado
    return $date->format($formato);
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
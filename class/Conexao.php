<?php
/**
 * Conexão com o banco de dados
 */
date_default_timezone_set('America/Sao_Paulo');
class Conexao 
{
     # Variável que guarda a conexão PDO.
    protected static $db;
    
    private function __construct()
    {
        # Informações sobre o banco de dados:
        $db_host = 'localhost';// servidor
        $db_nome    = "tseek";    //nome do banco
        $db_usuario = 'root'; //usuario do banco
        $db_senha = '';
        $db_driver  = "mysql";
        $db_porta   = "3306";
        
        // $db_database ='tseek';


       try
        {
            # Atribui o objeto PDO à variável $db.
            self::$db = new PDO("$db_driver:host=$db_host; port=$db_porta; dbname=$db_nome", $db_usuario, $db_senha);
            # Garante que o PDO lance exceções durante erros.
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # Garante que os dados sejam armazenados com codificação UTF-8.
            self::$db->exec('SET NAMES utf8');
        }
        catch (PDOException $e)
        {
            # Então não carrega nada mais da página.
            // die("Connection Error: " . $e->getMessage());
            echo 'Falha na conexão: ' . $e->getMessage();
        }
    }

	# Método estático - acessível sem instanciação.
	# Conexao::conexao();
    public static function conexao()
    {
        # Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$db)
        {
            new Conexao();
        }
        # Retorna a conexão.
        return self::$db;
    }



}
$db_host = 'localhost';// servidor
$db_nome    = "tseek";    //nome do banco
$db_usuario = 'root'; //usuario do banco
$db_senha = '';
$db_driver  = "mysql";
$db_porta   = "3306";
$mysqli = new mysqli($db_host, $db_usuario, $db_senha, $db_nome, $db_porta);

if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

if(isset($_POST['email'])|| isset($_POST['senha'])){
    if(strlen($_POST['email']) == 0){
        echo "preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM candidato WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("falha na execuçaõ do codigo SQL:" . $mysqli->error);
      
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
             
            $candidato = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $candidato['id'];
            $_SESSION['nome'] = $candidato['nome'];

            header("location: index-att.php");

        }else{
            echo "falha ao logar! email ou senha invalidos";
        }
    }

}
?>


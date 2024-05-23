<h1>TseeK</h1>

## Links Importantes
- [Site Oficial](https://tseek.com.br)

<h3>Por quê do Projeto?</h3>
<ul>
    <li>O projeto foi concebido com o propósito de agilizar e simplificar o processo de contratação de jogadores no cenário dos jogos eletrônicos competitivos.</li>
    <li>A essência da plataforma TseeK é como uma versão Catho voltada para o cenário de E-Sports, conectando empresas e jogadores em um espaço dinâmico, onde as vagas são anunciadas e os talentos podem se apresentar às equipes em busca de oportunidades.</li>
</ul>
<h2> 🧑🏾‍💻 Como utilizar este projeto localmente? </h2>

<p>Faça um clone do repositório</p>

```
git clone https://github.com/TseekPIM/tseek.git
```
### Instalação de Softwares Necessários
1. [Wampserver](https://wampserver.aviatechno.net)
2. [MySQL](https://www.mysql.com)
3. [Visual Studio Code](https://code.visualstudio.com)
<hr>
## 📂 Banco de Dados
Para o funcionamento do banco de dados, siga os passos abaixo:

1. Baixe a modelagem e o script do banco de dados [aqui](https://drive.google.com/drive/folders/1g10eh8hiK0ikSpfILUxuo4B5msneJCvO?usp=sharing).
2. Inicie o Wampserver e abra o MySQL.
3. Abra a modelagem do banco de dados:
<img src="./assets/img/readme-img/dados-modelagem.png">
4. Exporte o script conforme a imagem abaixo:
<img src="./assets/img/readme-img/exportacao.png">
5. Verifique se a conexão está estabelecida com o Wampserver:
<img src="./assets/img/readme-img/testedeconexao.png">
6. Abra a pasta `tseek` no VS Code e encontre o arquivo `conexao.php`
<img src="./assets/img/readme-img/conexao.png">
7. Configure o arquivo `conexao.php` da seguinte forma:

```
        $db_host = 'localhost';// servidor
        $db_nome    = "tseek";    //nome do banco
        $db_usuario = 'root'; //usuario do banco
        $db_senha = '';
        $db_driver  = "mysql";
        $db_porta   = "3306";
```

8. No gerenciador de arquivos (WIN + E), encontre a pasta do repositório clonado, copie a pasta `tseek` e cole no seguinte caminho:

```
C:\wamp64\www
```
### Iniciando o Projeto
Abra o navegador e digite `localhost/tseek`:

<img src="./assets/img/readme-img/navegador.png">
<hr>
<h2>🛠️ Tecnologias utilizadas</h2>
<ul>
    <li>PHP</li>
    <li>Javascript</li>
    <li>Sass</li>
    <li>Css</li>
    <li>MySQL</li>
</ul>

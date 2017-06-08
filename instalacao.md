# 1. Como rodar o aplicativo em ambiente de desenvolvimento
##### Pré-requisitos: nenhum

1. Baixar e instalar o Xampp (https://www.apachefriends.org/pt_br/index.html);
2. Baixar e instalar o Composer (https://getcomposer.org/);
3. Baixar e instalar o Node.js (https://nodejs.org/en/);
4. Criar o banco de dados (mySQL);
5. Após instalar o Node.js, abra o Terminal e instale o Gulp digitando: "npm install -g gulp";
6. Rodar um "composer update" na pasta raiz do projeto;
7. Duplicar o arquivo .env.example e mudar o nome do novo arquivo para .env. Lembre-se de mudar as credenciais do banco de dados para poder conectar-se;
8. Digite "php artisan migrate" na raiz do projeto para migrar as tabelas para o banco de dados;
9. Digite "php artisan serve" na raiz do projeto para rodar o projeto;
10. Caso dê um erro parecido com este: _No supported encrypter found. The cipher and / or key length are invalid._ Rode na pasta do projeto o comando: "php artisan:key generate";. 
11. Caso tente rodar novamente e dê um erro relacionado ao autoloader ou bootstrap, digite: "composer dump-autoload";
12. Digite "npm install" na raiz do projeto para instalar as dependências do front-end;
13. Digite "gulp" na raiz do projeto  para compilar o CSS. Também pode ser digitado "gulp dev" na raiz do projeto para o compilador ficar "vigiando" o CSS e compilar a medida em que o css é modificado (isto é útil para manutenção).

# 2. Como fazer o deploy em FTP (pela primeira vez)
##### Pré-requisitos: todos os passos do item 1 (Como rodar o aplicativo em ambiente de desenvolvimento).

1. Crie uma nova pasta chamada *mentoringContainer* (pode ser qualquer nome, o objetivo desta pasta é englobar a outra pasta chamada *mentoringDeCarreira*) e copie e cole a pasta *mentoringDeCarreira* da versão de controle para dentro da pasta *mentoringContainer*;
2. Dentro da *mentoringDeCarreira*, delete a pasta e os arquivos: node_modules, .git e .gitignore;
3. Dentro da pasta *mentoringDeCarreira*, vá no diretório _public_ e mova tudo que tiver lá para a raiz da pasta *mentoringContainer*;
4. Na raiz da *mentoringContainer*, abra o arquivo recém-copiado chamado index.php e modifique as seguintes linhas:

```php
require __DIR__.'/../bootstrap/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
```
para:
```php
require __DIR__.'/mentoringDeCarreira/bootstrap/autoload.php';
$app = require_once __DIR__.'/mentoringDeCarreira/bootstrap/app.php';
```

5. Compacte toda a pasta *mentoringContainer* em formato .zip;
6. Exporte todas as tabelas do banco de dados local e salve-as em alguma pasta que você lembre depois!;
7. Crie o banco de dados no servidor e importe todos as tabelas salvas no passo anterior;
8. Faça o upload do .zip salvo no passo 5 para a pasta raiz do servidor (public_html ou www);
9. Copie e cole o arquivo unzip.php que se encontra na pasta raiz do controle de versão para algum lugar que você se lembre depois. NÃO MODIFIQUE ESTE ARQUIVO DIRETAMENTE NO PROJETO VERSIONADO;
10. Leia os comentários contidos no unzip.php recém-copiado e modifique o que for necessário. Atente-se que este arquivo irá descompactar a pasta do projeto salva como .zip no servidor;
11. Faça o upload do unzip.php para a mesma pasta onde está salvo o projeto zipado (raiz do servidor);
12. Acesse o arquivo unzip.php. (Ex: digite no navegador www.meu_dominio.com/unzip.php). Caso dê um erro aqui, verifique se os campos do unzip.php estão corretos. Caso dê tudo certo, aparecerá uma mensagem de confirmação;
13. Caso dê tudo certo no passo 12, delete o arquivo unzip.php;
14. Copie o conteúdo da nova pasta criada pelo unzip.php para a raiz do projeto. Pode apagar esta pasta depois disso;
15. Modifique o arquivo .env (este é o nome do arquivo) no servidor e insira as credencias do banco de dados remoto. Ele está na pasta _mentoringDeCarreira_ no servidor.

# 3. Como fazer o deploy em FTP
##### Pré-requisitos: todos os passos do item 2 (Como rodar o aplicativo em ambiente de desenvolvimento).

1. Só é necessário fazer o upload dos arquivos que foram modificados/deletados/criados;
2. Só é necessário fazer o upload das tabelas do banco que foram modificadas/deletadas/criadas;

# 3. Observações
1. Tudo que estiver com aspas é para indicar comandos, retire-as quando for digitar.<br/>
2. Tutorial mais completo de como instalar o Laravel: http://bit.ly/1tCan0h<br/>

# 4. Comandos

1. php artisan serve - Starta o projeto (obs: lembre-se de criar o banco que está definido no arquivo .env);<br/>
2. php artisan migrate - Migra as tabelas do Laravel para o banco de dados;<br/>
3. npm install - Instala as dependências do front-end;<br/>
4. gulp - Roda o automatizador de tarefas front-end;<br/>
5. gulp dev - Roda o automatizador de tarefas front-end Gulp e deixa ele "vigiando" os arquivos SCSS localizados na pasta resources/assets/sass.
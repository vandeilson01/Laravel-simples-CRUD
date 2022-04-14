<h1 align="center"> 
	🚧  Crud 🚀 Concluído!  🚧
</h1>


## :hammer: Funcionalidades do projeto

 Este projeto é um CRUD simples realizado pelo framework Laravel da linguagem PHP utilizado para inserção, delete e modificação de dados de usuários com informações limitadas.


## 📁 Acesso ao projeto

**Baixar projeto por GIT**

```
$ git init

$ git remote add origin https://github.com/vandeilson01/to_start.git

$ git pull origin master
```

## 🛠️ Abrir e rodar o projeto(Siga as instruções abaixo para execução)



**Instalação do composer no projeto:**

```
$ php composer install
```


**Para a atualização das pastas do composer também pode-se utilizar os comandos:**

```
$ php composer install 
$ composer dump-autoload
```

**Para a iniciação e configuração do arquivo de configuração .env e chave do projeto use os comandos:**

```
$ cp .env.example .env
$ php artisan key:generate
```

<!-- 
**Ainda no arquivo .env configure a conexão no seu banco de dados local:**

```
DB_CONNECTION=mysql

DB_HOST=localhost

DB_PORT=3306

DB_DATABASE=data_base

DB_USERNAME=root

DB_PASSWORD=
``` -->


**Na raiz esta a tabela do banco de dados(data_users.sql) onde você pode gerar a tabela do projeto por importação em seu banco de dados.**


**Caso queira gerar valores fictícios na tabela use o comando:**


```
$ php artisan seed:db
```

<h2> 
  Para rodar o projeto use o comando:
</h2>

```
$ php artisan serve
```





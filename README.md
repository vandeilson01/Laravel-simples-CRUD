<h1 align="center"> 
	 Crud 🚀 Concluído!  
</h1>


## :hammer: Funcionalidades do projeto

 Este projeto é um CRUD simples realizado pelo framework Laravel da linguagem PHP utilizado para inserção, delete e modificação de dados de usuários com informações limitadas.
<h3>🎨 Layout</h3>

**Página principal**

<img src="https://user-images.githubusercontent.com/60020510/163507851-8d95bf2c-a9b4-4362-af41-b7b25afa1f2f.PNG">

<h3>💨 Banco de dados</h3>

<img src="https://user-images.githubusercontent.com/60020510/163507952-fca3550b-582b-4ad6-baa0-b631abd8d40f.PNG">

**Tabela de úsuarios**

<img src="https://user-images.githubusercontent.com/60020510/163508065-77e65ba8-df01-44f1-9cfc-59c86e9777d4.PNG">


**📁 Acesso ao projeto**

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

**Iniciação e configuração do arquivo de configuração .env e chave do projeto use os comandos:**

```
$ cp .env.example .env
$ php artisan key:generate
```
<h2> 
	Importe na sua base de dados o arquivo regions.sql que esta na raiz do projeto para gerar as tabelas de cidades e estados brasileiros!
</h2>


**Para gerar a tabela de úsuarios na sua base de dados use o comando:**


```
$ php artisan migrate
```

**Caso queira gerar valores fictícios na tabela use o comando:**


```
$ php artisan db:seed
```

<h2> 
  Para rodar o projeto use o comando:
</h2>

```
$ php artisan serve
```





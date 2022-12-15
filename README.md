


<h1 align="center">
  <br>
  <a href=""><img src="https://cdn-icons-png.flaticon.com/512/6410/6410570.png" alt="Financial Market" width="250"></a>
</h1>


<h4 align="center">Aplicação desenvolvida para baixar e apresentar de modo qualitativo dados do site da B3, mais especificamente da parte de Posições em Aberto de Empréstimo de Ativos.</h4>


<p align="center">
  <a href="#key-features">Funcionalidades</a> •
  <a href="#how-to-use">Como Usar</a> •
  <a href="#download">Download</a> •
</p>


## Funcionalidaes

* Download
  - Download das informações a respeito das Posições em Aberto de Empréstimo de Ativos do site da B3

* Vizualização
  - Vizualização dos dados baixados através de gráficos indicativos.


## Como Utilizar

Para clonar e executar esta aplicação, você precisará do Composer para a utilização do Laravel, [Git](https://git-scm.com) e [Node.js](https://nodejs.org/en/download/) (que vem com [ npm](http://npmjs.com)) instalado em seu computador. Passo a passo de execução:

```bash
# Clonar Repositório
$ git clone https://github.com/DaviMAC02/b3-lending-open-position-dashboard.git

# Assegurar que tenha um banco de dados mySQL com o nome b3_jumba_db e seu respectivo servidor rodando

# Download backend
* Entrar na pasta backend/b3-lending-open-position-backend
$ composer install
* Entrar no banco de dados e inserir na tabela uptodatetrack a última data em que o download foi feito para o algoritmo saber de onde começar
$ php artisan migrate
$ php artisan serve
$ php artisan download:b3
Irá baixar todos os dados da tabela da B3 desde a última execução.

#Frontend
npm install --force (para instalar as dependencias, houve um pequeno conflito entre as dependências que será resolvido em uma versão furura, por isso a --force flag)
Na pasta principal rodar npm run serve (manter o servidor backend rodando)

# Biblioteca

Neste sistema podemos gerenciar os empréstimos de livro de uma biblioteca.


## Instalação / Configuração

#### 1. Dependências
Após clonar o projeto, devemos entrar no diretório e executar o composer para baixar as dependências:
```shell
composer install
```

#### 2. Arquivo .env
Para criar o arquivo .env devemos copiar o arquivo de exemplo:
```
php -r "copy('.env.example', '.env');"
```
ou
```
cp .env.example .env
```

#### 3. Gerando a Key
Vamos gerar uma key para o sistema criar senhas personalizadas:
```
php artisan key:generate
```

#### 4. Banco de Dados
Dentro do arquivo `.env` vamos alterar as seguintes variáveis:
```
DB_CONNECTION
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```

#### 5. Tabelas e Conteúdo Base
Por último precisamos criar nossas tabelas e alimentar com o conteúdo base. Para isso basta executar a migration passando o parametro seed:
```
php artisan migrate:refresh --seed
```

### Dados de Acesso
```
E-mail: contato@felipericardo.com
Senha: mudar123
```

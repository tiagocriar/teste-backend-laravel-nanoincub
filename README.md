## Bônus Incub (Teste Backend para Nano Incub)

Bônus Incub é um projeto de endomarketing desenvolvido em PHP com framework Laravel 8. Para UI foi utilizado Argon 2 e Tailwin css. Nesse teste para vaga de backend na empresa Nano Incub, foi desenvolvido um projeto para bonificação de funcionários em forma de pontos, onde o administrador faz toda gestão de funcionários e movimentações.

* Documentação [Laravel 8](https://laravel.com/docs/8.x/installation)
* Documentação [Tailwind](https://tailwindcss.com/docs/guides/laravel)
* Documentação [Argon 2](https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/argon-dashboard/)

### Features

#### 1 - Autenticação

**1.1. Login Admin**
> Página de Login para os administradores com campo usuário e senha.

#### 2 - Funcionários

**2.1. Listagem de funcionários**
> Listagem dos funcionários exibindo o ID, Nome, Saldo atual, Data de criação.

**2.2. Paginação e filtro de funcionários**
> Listagem de funcionários, com paginação e filtro por **Nome do funcionário** e **Data de cadastro**.

**2.3. Visualizar extrato do funcionário**
> Visualização de extrato do funcionário com todas as movimentações de seus pontos (Data da movimentação, Tipo, Valor, Observação).

**2.4. Cadastro de funcionários**
> Formulário de cadastro com os campos do funcionário

**2.5. Edição de funcionário**
> Formulário de edição com os campos do funcionário

**2.6. Excluir funcionário**
> Função excluir o funcionário cadastrado com uma confirmação antes da exclusão.

#### 3 - Movimentações

**3.1. Listagem de movimentações**
> Listagem das movimentações exibindo, ID, Tipo, Valor, Funcionário, Observação e Data de criação, com ordem da última para o primeira.

**3.2. Paginação e filtro de movimentações**
> Listagem de movimentações, com paginação e filtro por **Nome do funcionário**, **Data de cadastro** e **Tipo de movimentação**

**3.3. Cadastro de movimentações**
> Formulário de cadastro com os campos da movimentação.

```plain
    tipo:       saida
    valor:      24.99
    observacao: Recarga de celular
```
ou
```plain
    tipo:       entrada
    valor:      100.00
    observacao: Entrega de projeto antes do prazo
```

---

### Banco de dados

O projeto tem migrations com a seguinte estrutura:

Tabela - `administrador`

```
id                  int
nome_completo:      string
login:              string
senha:              string
data_criacao:       datetime
data_alteracao:     datetime    * atualiza automaticamente
                                  sempre que o registro é atualizado
```

Tabela - `funcionario`

```
id                  int
nome_completo:      string
login:              string      * o login e senha do funcionário não será utilizado neste exato momento
senha:              string      * o login e senha do funcionário não será utilizado neste exato momento
saldo_atual:        decimal
administrador_id:   int         * administrador que cadastrou este registro
data_criacao:       datetime
data_alteracao:     datetime    * atualiza automaticamente
                                  sempre que o registro é atualizado
```

Tabela - `movimentacao`

```

id                  int
tipo_movimentacao   enum        * [entrada|saida]
valor:              decimal
observacao:         string
funcionario_id      int         * funcionario vinculado a movimentação 
administrador_id:   int         * administrador que cadastrou este registro
data_criacao:       datetime
```

---

## Requerimentos para instalação

* PHP (7.3, 7.4)
* Node 16 (LTS)
* Database (MySQL)
* Web Server (Nginx)

## Instalação

* Instale o [Composer](https://getcomposer.org/download) e [Npm](https://nodejs.org/en/download)
* Clone o repositório: <br />
`git clone https://github.com/tiagocriar/teste-backend-laravel-nanoincub.git`
* Entre na pasta criada pelo git
* Crie um arquivo .env e configure as variaveis de ambiente e de banco de dados, use de exemplo o arquivo `.env.example`
* Instale as dependencias do projeto PHP: `composer install`
* Gere a chave laravel `php artisan key:generate`
* Rode as migrations `php artisan migrate`
* Rode os sedeers `php artisan db:seed`
* Instale as dependencias node: `npm install`
* Gera arquivos node: `npm run dev`

## Úteis

### Acesso administrador padrão
```plain
login: admin
senha: changeme
```

### Comandos artisan para administradores
* Criar Administrador `php artisan administrador:criar`
* Excluir Administrador `php artisan administrador:excluir`
* Mudar senha de Administrador `php artisan administrador:mudar-senha`

### Namespace views
* layout-admin `views/layout/admin`
* layout-login `views/layout/login`
* login `views/components/login`
* administrador-funcionario `views/components/administrador/funcionario`
* administrador-movimentacao `views/components/administrador/movimentacao`

Registrados em App/Providers/AppServiceProvider.php

Exemplo de uso: `view('administrador-movimentacao::view')` seleciona a view de nome view.blade.php no diretório `views/components/administrador/movimentacao` dentro da pasta resources do projeto.

## Licença

O projeto está vinculado a licença [MIT](https://opensource.org/licenses/MIT).

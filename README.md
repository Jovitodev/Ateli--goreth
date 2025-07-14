# 🧵 Atelier Goreth's — Sistema de Cadastro de Clientes e Pedidos

Este projeto é um sistema web desenvolvido com **Laravel** para gerenciamento de clientes e pedidos do **Atelier Goreth's**. O objetivo é oferecer uma plataforma simples e eficiente para organizar os dados de clientes e seus respectivos pedidos, com funcionalidades básicas de CRUD.

---

## 🚀 Funcionalidades

### 👥 Clientes
- Cadastro de novos clientes
- Visualização da lista de clientes
- Visualização individual de cada cliente com seus dados e pedidos relacionados
- Edição de informações do cliente
- Validações de CPF e dados obrigatórios

### 📦 Pedidos
- Cadastro de pedidos associados a um cliente
- Visualização de pedidos feitos por cada cliente
- Campos do pedido:
  - Tipo de pedido
  - Valor
  - Status de pagamento
  - Status de execução

### 🏠 Página Inicial
- Interface limpa com as opções:
  - **Cadastrar Cliente**
  - **Visualizar Clientes**
- Sem exibição direta de dados sensíveis ou lista de clientes na home

---

## 🛠 Tecnologias Utilizadas

- **PHP 8.2+**
- **Laravel 12+**
- **PostgreSQL** (atualizado de MySQL para melhor desempenho)
- **Blade (Template Engine)**
- **HTML/CSS puro (sem framework frontend no momento)**

---
## 📁 Estrutura do Projeto

├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── ClienteController.php
│   │       └── PedidoController.php
├── resources/
│   └── views/
│       ├── home.blade.php
│       ├── clientes/
│       │   ├── create.blade.php
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       └── pedidos/
│           ├── create.blade.php
│           └── index.blade.php
├── routes/
│   └── web.php
├── database/
│   ├── migrations/
│   └── seeders/
├── config/
│   └── database.php
└── .env

---

## ⚙️ Configuração do Banco de Dados

O projeto utiliza PostgreSQL. Configure seu `.env` conforme o exemplo abaixo para conectar ao banco:

env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=projeto_atelier
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

---

## 🧩 Como Rodar o Projeto Localmente

    Clone o repositório:
    git clone https://github.com/seuusuario/seurepositorio.git
    cd seurepositorio
    
---

Instale as dependências:

composer install

    Configure o arquivo .env com suas credenciais do PostgreSQL.

    Gere a chave da aplicação:

php artisan key:generate

    Execute as migrations para criar as tabelas no banco:

php artisan migrate

    (Opcional) Popule o banco com dados de exemplo:

php artisan db:seed

    Inicie o servidor local:

php artisan serve

    Acesse o sistema em:

http://localhost:8000

## 📝 Exemplos de Consultas Avançadas no Banco

    Consulta com função agregada (ex: total de pedidos por cliente)

    Consulta com cláusula HAVING para filtrar grupos

    Funções customizadas no PostgreSQL para lógica de negócio

    Triggers para ações automáticas no banco


📫 Contato

João Victor Oliveira
Email: jvo.santos@dicente.ufma.br
GitHub: https://github.com/Jovitodev
📜 Histórico de Alterações

    2025-07-14: Migração do banco de dados de MySQL para PostgreSQL, atualização das configurações do projeto.

    Data anterior: Versão inicial com MySQL.

⚖️ Licença

Este projeto está licenciado sob a licença MIT - veja o arquivo LICENSE para detalhes.

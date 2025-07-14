# 🧵 Atelier Goreth's — Sistema de Cadastro de Clientes e Pedidos

Este projeto é um sistema web desenvolvido com Laravel para gerenciamento de clientes e pedidos do **Atelier Goreth's**. O objetivo é oferecer uma plataforma simples e eficiente para organizar os dados de clientes e seus respectivos pedidos, com funcionalidades básicas de CRUD.

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

- **PHP 8+**
- **Laravel 10+**
- **Blade (Template Engine)**
- **MySQL**
- **HTML/CSS puro (sem framework frontend no momento)**

---

## 📁 Estrutura do Projeto

```bash
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
├── routes/
│   └── web.php

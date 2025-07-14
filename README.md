# 🧵 Atelier Goreth's — Sistema de Gerenciamento de Clientes e Pedidos

Este é um sistema web desenvolvido com **Laravel** para gerenciar clientes e pedidos do **Atelier Goreth's**. O projeto oferece uma solução prática e eficiente para organizar os dados dos clientes e seus respectivos pedidos, com funcionalidades básicas de CRUD (criar, ler, atualizar e deletar).

---

## 🚀 Funcionalidades

### 👥 Clientes
- Cadastro e registro de novos clientes
- Listagem completa dos clientes cadastrados
- Visualização detalhada de cada cliente, incluindo seus pedidos relacionados
- Edição e atualização das informações dos clientes
- Validação de CPF e campos obrigatórios para garantir dados corretos

### 📦 Pedidos
- Registro de pedidos vinculados a clientes específicos
- Visualização dos pedidos realizados por cada cliente
- Detalhes dos pedidos incluindo:
  - Tipo do pedido
  - Valor
  - Status do pagamento
  - Status da execução

### 🏠 Página Inicial
- Interface simples e limpa com opções para:
  - **Cadastrar Cliente**
  - **Visualizar Clientes**
- A home não exibe listas ou dados sensíveis para manter a privacidade

---

## 🛠 Tecnologias Utilizadas

- **PHP 8.2+**
- **Laravel 12+**
- **PostgreSQL** (atualizado de MySQL para melhor desempenho e robustez)
- **Blade** (motor de templates do Laravel)
- **HTML/CSS puro** (sem frameworks frontend no momento)

---

## 📁 Estrutura do Projeto
```
├── app/
│ ├── Http/
│ │ └── Controllers/
│ │ ├── ClienteController.php
│ │ └── PedidoController.php
├── resources/
│ └── views/
│ ├── home.blade.php
│ ├── clientes/
│ │ ├── create.blade.php
│ │ ├── index.blade.php
│ │ └── show.blade.php
│ └── pedidos/
│ ├── create.blade.php
│ └── index.blade.php
├── routes/
│ └── web.php
├── database/
│ ├── migrations/
│ └── seeders/
├── config/
│ └── database.php
└── .env
```

---

## ⚙️ Configuração do Banco de Dados

Este projeto utiliza PostgreSQL. Configure seu arquivo `.env` com os dados do seu banco de dados:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=projeto_atelier
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```
---

##🧩 Como Executar o Projeto Localmente

Clone o repositório:
```
git clone https://github.com/seuusuario/seurepositorio.git
cd seurepositorio
```

Instale as dependências do Composer:
    
```
composer install
```

Configure o arquivo .env com suas credenciais do PostgreSQL.

Gere a chave da aplicação:
```
php artisan key:generate
```
Rode as migrations para criar as tabelas no banco:
```
php artisan migrate
```
(Opcional) Popule o banco com dados iniciais:
```
php artisan db:seed
```
Inicie o servidor local:
```
php artisan serve
```
 Acesse o sistema pelo navegador em:
```
http://localhost:8000
```
##📝 Consultas Avançadas no Banco de Dados

    Uso de funções agregadas (exemplo: total de pedidos por cliente)

    Aplicação da cláusula HAVING para filtragem de grupos

    Implementação de funções customizadas no PostgreSQL para regras de negócio

    Triggers para automações no banco de dados
    
--- 

##📫 Contato

João Victor Oliveira

Email: jvo.santos@dicente.ufma.br

GitHub: https://github.com/Jovitodev

---

##📜 Histórico de Versões

    2025-07-14: Migração do banco de dados de MySQL para PostgreSQL e atualização das configurações do projeto.

    Versão inicial com MySQL em datas anteriores.

---

##⚖️ Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.

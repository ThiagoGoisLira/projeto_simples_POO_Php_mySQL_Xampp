# 📚 Sistema de Gerenciamento de Biblioteca (PHP CRUD)

Este é um sistema de biblioteca simples e funcional, desenvolvido para fins de aprendizado de **PHP Intermediário**. O projeto utiliza **Programação Orientada a Objetos (POO)** e o padrão **MVC (Model-View-Controller)** para gerenciar livros em um banco de dados MySQL.

---

## 🚀 Funcionalidades

* **Cadastrar:** Adicione novos livros com título, autor e volume.
* **Listar:** Visualize todos os livros salvos diretamente do banco de dados.
* **Editar:** Atualize informações de livros já cadastrados.
* **Excluir:** Remova livros da estante digital com confirmação de segurança.

---

## 🛠️ Tecnologias Utilizadas

* **PHP 8.x** (Utilizando PDO para segurança contra SQL Injection).
* **MySQL** (Banco de dados relacional).
* **CSS3** (Estilização da interface).
* **Padrão MVC** (Separação de lógica e visualização).

---

## 📋 Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina:
* [XAMPP](https://www.apachefriends.org/pt_br/index.html) (Apache e MySQL).
* Um editor de código (Ex: [VS Code](https://code.visualstudio.com/)).

---

## 🔧 Instalação e Configuração

### 1. Clonar ou baixar o projeto
Baixe os arquivos e coloque-os dentro da pasta `htdocs` do seu XAMPP:
`C:\xampp\htdocs\sistema-biblioteca\`

### 2. Configurar o Banco de Dados
1. Abra o **XAMPP Control Panel** e inicie o **Apache** e o **MySQL**.
2. Acesse o **phpMyAdmin** em `http://localhost/phpmyadmin`.
3. Crie um novo banco de dados chamado `biblioteca`.
4. Clique na aba **SQL** e cole o seguinte comando:

```sql
CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    volume INT NOT NULL
);
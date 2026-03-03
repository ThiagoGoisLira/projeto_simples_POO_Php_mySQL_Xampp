<?php
// models/Livro.php

class Livro
{
    // Atributos privados (Encapsulamento): só podem ser acessados por métodos da classe
    private $id;
    private $titulo;
    private $autor;
    private $volume;

    //Construtor da classel. Os parâmetros são nulos por padrão para permitir que o PDO preencha as propriedades automaticamente ao listar (FETCH_CLASS).
    public function __construct($titulo = null, $autor = null, $volume = null)
    {
        if ($titulo !== null) $this->titulo = $titulo;
        if ($autor !== null) $this->autor = $autor;
        if ($volume !== null) $this->volume = $volume;
    }

    //CREATE: Insere um novo livro no banco de dados.
    // @param PDO $conexao - A conexão ativa com o banco.
    public function salvar($conexao)
    {
        // Usamos Prepared Statements (:t, :a, :v) para evitar ataques de SQL Injection
        $sql = "INSERT INTO livros (titulo, autor, volume) VALUES (:t, :a, :v)";
        $stmt = $conexao->prepare($sql);
        return $stmt->execute([
            ':t' => $this->titulo,
            ':a' => $this->autor,
            ':v' => $this->volume
        ]);
    }
    // Busca um único livro pelo seu ID.
    public static function buscarPorId($conexao, $id)
    {
        $sql = "SELECT * FROM livros WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$id]);
        // Retorna o resultado como um objeto da classe Livro
        return $stmt->fetchObject('Livro');
    }

    //UPDATE: Atualiza os dados de um livro já existente.
    public function atualizar($conexao)
    {
        $sql = "UPDATE livros SET titulo = :t, autor = :a, volume = :v WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        return $stmt->execute([
            ':t'  => $this->titulo,
            ':a'  => $this->autor,
            ':v'  => $this->volume,
            ':id' => $this->id
        ]);
    }
    //READ: Busca todos os livros.
    // @param PDO $conexao
    // @return array - Retorna um array de Objetos do tipo Livro.
    
    public static function listarTodos($conexao)
    {
        $sql = "SELECT * FROM livros";
        $stmt = $conexao->query($sql);
        //FETCH_CLASS: Transforma cada linha da tabela em uma instância desta classe
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Livro');
    }

    //DELETE: Remove um registro pelo ID.
    
    public static function excluir($conexao, $id)
    {
        $sql = "DELETE FROM livros WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        return $stmt->execute([$id]);
    }

    //GETTERS: Métodos públicos para ler as propriedades privadas
    public function getId()
    {
        return $this->id;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getAutor()
    {
        return $this->autor;
    }
    public function getVolume()
    {
        return $this->volume;
    }
}

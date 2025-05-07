<?php

try {
    $conn = new PDO("mysql:host=localhost;port=3306", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão com MySQL estabelecida com sucesso!\n";
    
    // Tentar criar o banco de dados
    $conn->exec("CREATE DATABASE IF NOT EXISTS sistema_gestao CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Banco de dados 'sistema_gestao' criado ou já existente!\n";
    
} catch(PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage() . "\n";
} 
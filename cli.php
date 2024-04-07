<?php

require_once 'config.php';
require_once 'Logger.php';
require_once 'DataStorageInterface.php';
require_once 'XMLHandler.php';
require_once 'DBHandlerInterface.php';
require_once 'MySQLHandler.php';
require_once 'XMLToDBProcessor.php';

if ($argc < 5) {
    echo "Usage: php cli.php <xml_file_path> <db_host> <db_user> <db_pass> <db_name>\n";
    exit(1);
}

$xmlFile = $argv[1];
$dbHost = $argv[2];
$dbUser = $argv[3];
$dbPass = $argv[4];
$dbName = $argv[5];

$config = include 'config.php';
$logger = new Logger($config['log_file']);

try {
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Test connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS items (
            entity_id INT PRIMARY KEY,
            CategoryName VARCHAR(255),
            sku VARCHAR(255),
            name VARCHAR(255),
            description TEXT,
            shortdesc TEXT,
            price DECIMAL(10, 2),
            link TEXT,
            image TEXT,
            Brand VARCHAR(255),
            Rating INT,
            CaffeineType VARCHAR(255),
            Count INT,
            Flavored VARCHAR(255),
            Seasonal VARCHAR(255),
            Instock VARCHAR(10),
            Facebook INT,
            IsKCup INT
        )";

    if ($conn->query($sql) === TRUE) {
        echo "Table 'items' created successfully.\n";
    } else {
        echo "Error creating table: " . $conn->error . "\n";
    }
    $xmlHandler = new XMLHandler();
    $dbHandler = new MySQLHandler($dbHost, $dbUser, $dbPass, $dbName);
    $xmlToDBProcessor = new XMLToDBProcessor($xmlHandler, $dbHandler, $logger);
    $xmlToDBProcessor->processXMLToDB($xmlFile);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}


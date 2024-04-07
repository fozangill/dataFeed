<?php

class MySQLHandler implements DBHandlerInterface
{
    private $conn;

    /**
     * @throws Exception
     */
    public function __construct($host, $username, $password, $database)
    {
        $this->conn = new mysqli($host, $username, $password, $database);

        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * @throws Exception
     */
    public function insertData($data)
    {
        $entity_id = $this->conn->real_escape_string($data['entity_id']);
        $CategoryName = $this->conn->real_escape_string($data['CategoryName']);
        $sku = $this->conn->real_escape_string($data['sku']);
        $name = $this->conn->real_escape_string($data['name']);
        $description = $this->conn->real_escape_string($data['description']);
        $shortdesc = $this->conn->real_escape_string($data['shortdesc']);
        $price = $this->conn->real_escape_string($data['price']);
        $link = $this->conn->real_escape_string($data['link']);
        $image = $this->conn->real_escape_string($data['image']);
        $Brand = $this->conn->real_escape_string($data['Brand']);
        $Rating = $this->conn->real_escape_string($data['Rating']);
        $CaffeineType = $this->conn->real_escape_string($data['CaffeineType']);
        $Count = $this->conn->real_escape_string($data['Count']);
        $Flavored = $this->conn->real_escape_string($data['Flavored']);
        $Seasonal = $this->conn->real_escape_string($data['Seasonal']);
        $Instock = $this->conn->real_escape_string($data['Instock']);
        $Facebook = $this->conn->real_escape_string($data['Facebook']);
        $IsKCup = $this->conn->real_escape_string($data['IsKCup']);

        $sql = "INSERT INTO items (entity_id, CategoryName, sku, name, description, shortdesc, price, link, image, Brand, Rating,
                   CaffeineType, Count, Flavored, Seasonal, Instock, Facebook, IsKCup) VALUES ('$entity_id', '$CategoryName', '$sku', '$name', '$description','$shortdesc', '$price', '$link', '$image', '$Brand', '$Rating','$CaffeineType', '$Count',
    '$Flavored', '$Seasonal', '$Instock', '$Facebook', '$IsKCup')";
        if (!$this->conn->query($sql)) {
            throw new Exception("Error inserting data: " . $this->conn->error);
        }
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}


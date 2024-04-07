<?php

require_once 'config.php';
require_once 'Logger.php';
require_once 'DataStorageInterface.php';
require_once 'DBHandlerInterface.php';

class XMLToDBProcessor
{
    private $xmlHandler;
    private $dbHandler;
    private $logger;

    public function __construct(DataStorageInterface $xmlHandler, DBHandlerInterface $dbHandler, Logger $logger)
    {
        $this->xmlHandler = $xmlHandler;
        $this->dbHandler = $dbHandler;
        $this->logger = $logger;
    }

    public function processXMLToDB($xmlFile)
    {
        try {
            $xmlData = $this->xmlHandler->readData($xmlFile);
            foreach ($xmlData->item as $item) {
                $data = [
                    'entity_id' => (string)$item->entity_id,
                    'CategoryName' => (string)$item->CategoryName,
                    'sku' => (string)$item->sku,
                    'name' => (string)$item->name,
                    'description' => (string)$item->description,
                    'shortdesc' => (string)$item->shortdesc,
                    'price' => (string)$item->price,
                    'link' => (string)$item->link,
                    'image' => (string)$item->image,
                    'Brand' => (string)$item->Brand,
                    'Rating' => (string)$item->Rating,
                    'CaffeineType' => (string)$item->CaffeineType,
                    'Count' => (string)$item->Count,
                    'Flavored' => (string)$item->Flavored,
                    'Seasonal' => (string)$item->Seasonal,
                    'Instock' => (string)$item->Instock,
                    'Facebook' => (string)$item->Facebook,
                    'IsKCup' => (string)$item->IsKCup,
                ];
                $this->dbHandler->insertData($data);
            }
            echo "XML processing and database insertion completed successfully.\n";
        } catch (Exception $e) {
            $this->logger->logError($e->getMessage());
            echo "Error occurred. Please check the log file for details.\n";
        }
    }
}


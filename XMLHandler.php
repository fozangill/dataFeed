<?php

class XMLHandler implements DataStorageInterface
{
    public function readData($xmlFile)
    {
        return simplexml_load_file($xmlFile);
    }
}


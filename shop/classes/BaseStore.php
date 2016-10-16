<?php

abstract class BaseStore
{
    protected $database;

    public function __construct(Database $dataB)
    {
        $this->database = $dataB;
    }
}
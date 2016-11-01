<?php

abstract class BaseStore
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }
}
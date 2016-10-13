<?php

class Configuration
{
    private $configuration;

    function __construct()
    {
        $this->configuration = parse_ini_file("configuration.ini.php", true);
    }

    public function get($section, $key)
    {
        return $this->configuration[$section][$key];
    }

    public function getSection($section)
    {
        return $this->configuration[$section];
    }
}
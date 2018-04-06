<?php

namespace FileUploader;


abstract class Collection
{
    private $parameters;

    protected function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    protected function get(string $key = '')
    {
        return array_key_exists($key, $this->parameters) ? ($key ?? '') : '';
    }

    protected function getInt(string $key = '') :int
    {
        return (int)$this->get($key) ?? 0;
    }

    protected function getString(string $key = '') :string
    {
        return (string)$this->get($key) ?? '';
    }
}

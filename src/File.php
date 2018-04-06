<?php

namespace FileUploader;


use Exception;

class File extends Collection
{
    private $fileName;
    private $uploadDirPath;

    public function __construct(array $file = [], string $uploadDirPath = './')
    {
        parent::__construct($file);
        $this->uploadDirPath = $uploadDirPath;
    }

    public function getName() :string
    {
        return $this->getString('name');
    }

    public function getTmpName() :string
    {
        return $this->getString('tmp_name');
    }

    public function getSize() :string
    {
        return $this->getString('size');
    }

    public function getUploadErrorCode() :int
    {
        return $this->getInt('error');
    }

    public function upload() :bool
    {
        try
        {
            move_uploaded_file($this->getTmpName(), $this->uploadDirPath);
            return true;
        }
        catch (Exception $exception)
        {
            return false;
        }
    }

    public function setFileName(string $fileName = '') :void
    {
        if (empty($fileName))
            $this->fileName = uniqid() . '-' . $this->getName();
        else
            $this->fileName = $fileName;
    }

    public function getFileName() :string
    {
        return $this->fileName;
    }
}

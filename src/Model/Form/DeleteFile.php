<?php
namespace MVC\Model\Form;
class DeleteFile implements \MVC\Model\Form {
    private $filePath;
    private $deleter;
    private $data;
    public $successful = false;
    public $submited = false;

    public function __construct(Delete $deleter, $filePath) {
        $this->deleter = $deleter;
        $this->filePath = $filePath;
    }

    public function main($data = null) {
        $this->submitted = false;
        $this->deleter->main($data);
        return true;
    }

    public function submit($data) {
        $this->deleter->main($data);
        $fileName = $this->getData()->file_name;
        return $this->deleter->submit($data) && unlink($this->filePath . $fileName);
    }

    public function success() {
        $this->successful = true;
    }

    public function getData() {
        return $this->saver->getData();
    }
}

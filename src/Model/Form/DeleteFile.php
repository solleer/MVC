<?php
namespace MVC\Model\Form;
class DeleteFile implements \MVC\Model\Form {
    private $filePath;
    private $deleter;
    public $successful = false;
    public $submited = false;
    public $data;

    public function __construct(Delete $deleter, $filePath) {
        $this->deleter = $deleter;
        $this->filePath = $filePath;
    }

    public function main($data = null) {
        $this->submitted = false;
        $this->deleter->main($data);
        $this->data = $this->deleter->data;
        return true;
    }

    public function submit($data) {
        $this->deleter->main(array_values($data)[0]);
        $this->data = $this->deleter->data;
        $fileName = $this->deleter->data->file_name;
        return $this->deleter->submit($data) && unlink($this->filePath . $fileName);
    }

    public function success() {
        $this->successful = true;
    }
}

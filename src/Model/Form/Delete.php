<?php
namespace MVC\Model\Form;
class Delete implements \MVC\Model\Form {
    private $mapper;
    private $deleteField;
    public $successful = false;
    public $submited = false;
    public $data;

    public function __construct(\ArrayAccess $mapper, $deleteField) {
        $this->mapper = $mapper;
        $this->deleteField = $deleteField;
    }

    public function main($data = [null]) {
        $this->submitted = false;
        $this->data = $this->mapper[$data[0]];
        return true;
    }

    public function submit($data) {
        $this->submitted = true;
        $this->data = $data;
        if (!isset($this->mapper[$data[$this->deleteField]])) return false;
        unset($this->mapper[$data[$this->deleteField]]);
        return true;
    }

    public function success() {
        $this->successful = true;
    }
}

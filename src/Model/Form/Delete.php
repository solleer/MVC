<?php
namespace MVC\Model\Form;
class Delete implements \MVC\Model\Form {
    private $mapper;
    public $successful = false;
    public $submited = false;
    public $data;

    public function __construct(\ArrayAccess $mapper) {
        $this->mapper = $mapper;
    }

    public function main($data = [null]) {
        $this->submitted = false;
        $this->data = $this->mapper[$data[0]];
        return true;
    }

    public function submit($data) {
        $this->submitted = true;
        $this->data = $data;
        if (!isset($this->mapper[array_values($data)[0]])) return false;
        unset($this->mapper[array_values($data)[0]]);
        return true;
    }

    public function success() {
        $this->successful = true;
    }
}

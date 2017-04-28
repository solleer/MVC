<?php
namespace MVC\Model\Form;
class Save implements \MVC\Model\Form {
    private $mapper;
    private $validator;
    public $successful = false;
    public $submited = false;
    public $data;

    public function __construct(\ArrayAccess $mapper, \Respect\Validation\Rules\AllOf $validator) {
        $this->mapper = $mapper;
        $this->validator = $validator;
    }

    public function main($data = [null]) {
        $this->submitted = false;
        $this->data = $this->mapper[$data[0]];
        return true;
    }

    public function submit($data) {
        $this->submitted = true;
        $this->data = (object) $data;
        if (!$this->validator->validate((array) $this->data)) return false;
        $this->mapper[] = $this->data;
        return true;
    }

    public function success() {
        $this->successful = true;
    }
}

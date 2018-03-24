<?php
namespace MVC\Model\Form;
class Save implements \MVC\Model\Form {
    private $mapper;
    private $validator;
    private $data;
    public $successful = false;
    public $submited = false;

    public function __construct(\ArrayAccess $mapper, \Respect\Validation\Rules\AllOf $validator) {
        $this->mapper = $mapper;
        $this->validator = $validator;
    }

    public function main($data = null) {
        $this->submitted = false;
        $this->data = isset($data[0]) ? ($this->mapper[$data[0]] ?? []) ? [];
        return true;
    }

    public function submit($data) {
        $this->submitted = true;
        $this->data = (object) $data;
        if (!$this->validator->validate((array) $this->data)) return false;
        $this->data = $this->deepConvert($data);
        $this->mapper[] = $this->data;
        return true;
    }

    private function deepConvert($data) {
        return json_decode(json_encode($data));
    }

    public function success() {
        $this->successful = true;
    }

    public function getData() {
        return $this->data;
    }
}

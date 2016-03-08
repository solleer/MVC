<?php

namespace MVC\Model\Form;

class Delete implements \MVC\Model\Form {
    private $maphper;
    public $successful = false;
    public $data;

    public function __construct(\Maphper\Maphper $maphper) {
        $this->maphper = $maphper;
    }

    public function main($id) {
        $this->data = $this->maphper[$id];
        return true;
    }

    public function submit($filter) {
        $this->maphper->filter($filter)->delete();
        return true;
    }

    public function success() {
        $this->successful = true;
    }
}

?>

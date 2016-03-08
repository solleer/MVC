<?php

namespace MVC\Model\Form;

class Edit implements \MVC\Model\Form {
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

    // TODO: Add data validation
    public function submit(\stdClass $data) {
        $this->maphper[] = $data;
        return true;
    }

    public function success() {
        $this->successful = true;
    }
}

?>

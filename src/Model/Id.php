<?php

namespace MVC\Model;
class Id implements Idable {
    private $maphper;
    private $id;

    public function __construct(\Maphper\Maphper $maphper) {
        $this->maphper = $maphper;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getData() {
        return $this->maphper[$this->id];
    }
}

?>

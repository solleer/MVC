<?php
namespace MVC\Model;
class Sort implements Filterable {
    private $maphper;
    private $filter = [];
    private $sort;

    public function __construct(\Maphper\Maphper $maphper, $sort = '') {
        $this->maphper = $maphper;
        $this->sort = $sort;
    }

    public function setFilter($filter) {
        $this->filter = $filter;
    }

    public function getData() {
        return $this->maphper->filter($this->filter)->sort($this->sort);
    }
}

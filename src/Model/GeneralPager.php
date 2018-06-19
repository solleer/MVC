<?php
namespace MVC\Model;

class GeneralPager implements Pageable, Filterable {
    private $model;
    private $recordsPerPage;
    private $currentPage = 1;
    private $filter = [];

    public function __construct(\Maphper\Maphper $model, $defaultRecordsPerPage = 30) {
        $this->model = $model;
        $this->recordsPerPage = $defaultRecordsPerPage;
    }

    public function setFilter($filter) {
        $this->filter = $filter;
    }

    public function find(int $limit, int $offset) {
        return $this->model->filter($this->filter)->limit($limit)->offset($offset);
    }

    public function setRecordsPerPage(int $records) {
        $this->recordsPerPage = $records;
    }

    public function getRecordsPerPage(): int {
        return $this->recordsPerPage;
    }

    public function setCurrentPage(int $page) {
        $this->currentPage = $page;
    }

    public function getCurrentPage(): int {
        return $this->currentPage;
    }

    public function getNumberOfPages(): int {
        return ceil($this->getTotalRecords()/$this->getRecordsPerPage());
    }

    public function getTotalRecords(): int {
        return count($this->model);
    }
}

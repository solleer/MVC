<?php
namespace MVC\Model;
class FileFilter implements Filterable {
    private $model;
    private $filePath;

    public function __construct(Filterable $model, $filePath) {
        $this->model = $model;
        $this->filePath = $filePath;
    }

    public function setFilter($filter) {
        $this->model->setFilter($filter);
    }

    public function getData() {
        return $this->model->getData();
    }

    public function getFilePath() {
        return $this->filePath;
    }
}

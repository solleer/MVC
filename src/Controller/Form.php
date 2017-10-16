<?php

namespace MVC\Controller;

class Form {
    private $model;
    private $request;

    public function __construct(\MVC\Model\Form $model, \Utils\Request $request) {
        $this->model = $model;
        $this->request = $request;
    }

    public function submit() {
        if ($this->model->submit($this->request->post() ?? null)) $this->model->success();
    }

    public function main(...$data) {
        $this->model->main($data);
    }
}

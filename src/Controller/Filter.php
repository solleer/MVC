<?php

namespace MVC\Controller;

class Filter {
	private $model;

	public function __construct(\MVC\Model\Filterable $model) {
		$this->model = $model;
	}

	public function set_filter($filter) {
		$this->model->set_filter($filter);
	}

}

?>

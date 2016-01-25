<?php

namespace MVC\Controller;
class Id {
	private $model;

	public function __construct(\MVC\Model\Idable $model) {
		$this->model = $model;
	}

	public function set_id($id) {
		$this->model->set_id($id);
	}

}

?>

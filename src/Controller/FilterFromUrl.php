<?php
namespace MVC\Controller;
class FilterFromUrl {
	private $model;
	private $filterKeys;

	public function __construct(\MVC\Model\Filterable $model, array $filterKeys) {
		$this->model = $model;
		$this->filterKeys = $filterKeys;
	}

	public function filter(...$filter) {
		$this->model->setFilter(array_combine($this->filterKeys, $filter));
	}
}

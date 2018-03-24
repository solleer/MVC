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
		if (count($filter) === count($this->filterKeys))
            $this->model->setFilter(array_combine($this->filterKeys, $filter));
	}
}

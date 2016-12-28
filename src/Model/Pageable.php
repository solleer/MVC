<?php
namespace MVC\Model;

interface Pageable {
    public function find(int $limit, int $offset);
    public function getRecordsPerPage(): int;
    public function getCurrentPage(): int;
    public function getNumberOfPages(): int;
    public function getTotalRecords(): int;
}

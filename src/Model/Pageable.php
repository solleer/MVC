<?php
namespace MVC\Model;

interface Pageable {
    public function getCurrentPageRecords();
    public function getRecordsPerPage(): int;
    public function getCurrentPage(): int;
    public function getNumberOfPages(): int;
    public function getTotalRecords(): int;
}

<?php

namespace MVC\Model;

interface Emailer {
    /*
        $data includes 'from' and other misc data
    */
    public function send(array $recipients, array $data): bool;
}

<?php

namespace MVC\Model;

interface Emailer {
    public function send(array $recipients, array $data): bool;
}

<?php

namespace MVC\Model;

class PHPMailerEmailer implements Emailer {
    private $mailer;
    private $template;
    private $subject;

    public function __construct(\PHPMailer $mailer, \Transphporm\Builder $template, $subject = "") {
        $this->mailer = $mailer;
        $this->template = $template;
        $this->subject = $subject;
    }

    public function send(array $recipients, array $data): bool {
        $mailer = clone $this->mailer;
        foreach ($recipients as $name => $address)
            $mailer->addAddress($address, is_integer($name) ? "" : $name);

        if (isset($data['from'])) $mailer->setFrom($data['from']);

        $mailer->Subject = $data['subject'] ?? $this->subject;
        $mailer->isHTML(true);
        $mailer->Body = $this->template->output($data)->body;

        return $mailer->send();
    }
}

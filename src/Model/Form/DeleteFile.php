<?php
namespace MVC\Model\Form;
class DeleteFile implements \MVC\Model\Form {
    private $deleter;
    private $data;
    private $filesystem;
    public $successful = false;
    public $submitted = false;

    public function __construct(Delete $deleter, \League\Flysystem\Filesystem $filesystem) {
        $this->deleter = $deleter;
        $this->filesystem = $filesystem;
    }

    public function main($data = null) {
        $this->submitted = false;
        $this->deleter->main($data);
        return true;
    }

    public function submit($data) {
        $this->submitted = true;
        $this->deleter->main([$data[$this->deleter->getDeleteField()]]);
        $fileName = $this->getData()->file_name;
        return $this->deleter->submit($data) && $this->filesystem->delete($fileName);
    }

    public function success() {
        $this->successful = true;
    }

    public function getData() {
        return $this->deleter->getData() ?? [];
    }
}

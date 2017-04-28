<?php
namespace MVC\Model\Form;
class SaveFile implements \MVC\Model\Form {
    private $saver;
    private $uploader;
    public $successful = false;
    public $submited = false;
    public $data;

    public function __construct(Save $validator, \FileUpload\FileUpload $uploader) {
        $this->saver = $saver;
        $this->uploader = $uploader;
        $this->uploader->setFileNameGenerator(new \FileUpload\FileNameGenerator\Custom([$this, 'setNewFileName']));
    }

    private function setNewFileName($sourceName) {
        return time() . '-' . $sourceName;
    }

    public function main($data = null) {
        $this->submitted = false;
        $this->saver->main($data);
        return true;
    }

    public function submit($data) {
        $this->submitted = true;
        $this->setNewFileName();
        // Upload File
        list($files) = $this->uploader->processAll();
        foreach ($files as $file) {
            if (!$file->completed) return false;
            $data['file_name'] = $file->getFilename();
            if (!$this->saver->submit($data)) return false;
        }
        return true;
    }

    public function success() {
        $this->successful = true;
    }

    public function getData() {
        return $this->saver->getData();
    }
}

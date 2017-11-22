<?php

namespace StartupWrench\Admin\Form\Field;

use StartupWrench\Admin\Form\Field;

class Editor extends Field
{
    /**
     * @var array
     */
    protected static $js = [
        '//cdn.ckeditor.com/4.5.10/standard/ckeditor.js'
    ];

    public function render()
    {
        $this->script = "CKEDITOR.replace('{$this->column}');";

        return parent::render();
    }
}

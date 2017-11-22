<?php

namespace StartupWrench\Admin\Form\Field;

class Url extends Text
{
    /**
     * @var string
     */
    protected $rules = 'url';

    public function render()
    {
        $this->prepend('<i class="fa fa-internet-explorer"></i>')
             ->defaultAttribute('type', 'url');

        return parent::render();
    }
}

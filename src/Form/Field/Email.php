<?php

namespace StartupWrench\Admin\Form\Field;

class Email extends Text
{
    /**
     * @var string
     */
    protected $rules = 'email';

    public function render()
    {
        $this->prepend('<i class="fa fa-envelope"></i>')
             ->defaultAttribute('type', 'email');

        return parent::render();
    }
}

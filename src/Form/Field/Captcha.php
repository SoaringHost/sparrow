<?php

namespace StartupWrench\Admin\Form\Field;

use StartupWrench\Admin\Form;

class Captcha extends Text
{
    /**
     * @var string
     */
    protected $rules = 'required|captcha';

    /**
     * @var string
     */
    protected $view = 'admin::form.captcha';

    /**
     * @param $column
     * @param array $arguments
     */
    public function __construct($column, $arguments = [])
    {
        if (!class_exists(\Mews\Captcha\Captcha::class)) {
            throw new \Exception('To use captcha field, please install [mews/captcha] first.');
        }

        $this->column = '__captcha__';
        $this->label  = trans('admin.captcha');
    }

    /**
     * @param Form $form
     * @return mixed
     */
    public function setForm(Form $form = null)
    {
        $this->form = $form;

        $this->form->ignore($this->column);

        return $this;
    }

    public function render()
    {
        $this->script = <<<EOT

$('#{$this->column}-captcha').click(function () {
    $(this).attr('src', $(this).attr('src')+'?'+Math.random());
});

EOT;

        return parent::render();
    }
}

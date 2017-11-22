<?php

namespace StartupWrench\Admin\Form\Field;

class Number extends Text
{
    /**
     * @var array
     */
    protected static $js = [
        '/vendor/laravel-admin/number-input/bootstrap-number-input.js'
    ];

    public function render()
    {
        $this->default((int) $this->default);

        $this->script = <<<EOT

$('{$this->getElementClassSelector()}:not(.initialized)')
    .addClass('initialized')
    .bootstrapNumber({
        upClass: 'success',
        downClass: 'primary',
        center: true
    });

EOT;

        $this->prepend('')->defaultAttribute('style', 'width: 100px');

        return parent::render();
    }
}

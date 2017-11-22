<?php

namespace SoaringHost\Admin\Form\Field;

class Icon extends Text
{
    /**
     * @var string
     */
    protected $default = 'fa-pencil';

    /**
     * @var array
     */
    protected static $css = [
        '/vendor/laravel-admin/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css'
    ];

    /**
     * @var array
     */
    protected static $js = [
        '/vendor/laravel-admin/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.min.js'
    ];

    public function render()
    {
        $this->script = <<<EOT

$('{$this->getElementClassSelector()}').iconpicker({placement:'bottomLeft'});

EOT;

        $this->prepend('<i class="fa fa-pencil"></i>')
             ->defaultAttribute('style', 'width: 140px');

        return parent::render();
    }
}

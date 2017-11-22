<?php

namespace StartupWrench\Admin\Form\Field;

use StartupWrench\Admin\Form\Field;

class Slider extends Field
{
    /**
     * @var array
     */
    protected static $css = [
        '/vendor/laravel-admin/AdminLTE/plugins/ionslider/ion.rangeSlider.css',
        '/vendor/laravel-admin/AdminLTE/plugins/ionslider/ion.rangeSlider.skinNice.css'
    ];

    /**
     * @var array
     */
    protected static $js = [
        '/vendor/laravel-admin/AdminLTE/plugins/ionslider/ion.rangeSlider.min.js'
    ];

    /**
     * @var array
     */
    protected $options = [
        'type'     => 'single',
        'prettify' => false,
        'hasGrid'  => true
    ];

    public function render()
    {
        $option = json_encode($this->options);

        $this->script = "$('{$this->getElementClassSelector()}').ionRangeSlider($option)";

        return parent::render();
    }
}

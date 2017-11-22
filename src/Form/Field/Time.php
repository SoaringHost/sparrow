<?php

namespace SoaringHost\Admin\Form\Field;

class Time extends Date
{
    /**
     * @var string
     */
    protected $format = 'HH:mm:ss';

    public function render()
    {
        $this->prepend('<i class="fa fa-clock-o"></i>')
             ->defaultAttribute('style', 'width: 150px');

        return parent::render();
    }
}

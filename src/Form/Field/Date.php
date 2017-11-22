<?php

namespace StartupWrench\Admin\Form\Field;

class Date extends Text
{
    /**
     * @var array
     */
    protected static $css = [
        '/vendor/laravel-admin/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'
    ];

    /**
     * @var array
     */
    protected static $js = [
        '/vendor/laravel-admin/moment/min/moment-with-locales.min.js',
        '/vendor/laravel-admin/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
    ];

    /**
     * @var string
     */
    protected $format = 'YYYY-MM-DD';

    /**
     * @param $format
     * @return mixed
     */
    public function format($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function prepare($value)
    {
        if ($value === '') {
            $value = null;
        }

        return $value;
    }

    public function render()
    {
        $this->options['format'] = $this->format;
        $this->options['locale'] = config('app.locale');

        $this->script = "$('{$this->getElementClassSelector()}').datetimepicker(" . json_encode($this->options) . ');';

        $this->prepend('<i class="fa fa-calendar"></i>')
             ->defaultAttribute('style', 'width: 110px');

        return parent::render();
    }
}

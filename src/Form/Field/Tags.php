<?php

namespace SoaringHost\Admin\Form\Field;

use SoaringHost\Admin\Form\Field;
use Illuminate\Support\Arr;

class Tags extends Field
{
    /**
     * @var array
     */
    protected $value = [];

    /**
     * @var array
     */
    protected static $css = [
        '/vendor/laravel-admin/AdminLTE/plugins/select2/select2.min.css'
    ];

    /**
     * @var array
     */
    protected static $js = [
        '/vendor/laravel-admin/AdminLTE/plugins/select2/select2.full.min.js'
    ];

    /**
     * @param $data
     */
    public function fill($data)
    {
        $this->value = array_get($data, $this->column);

        if (is_string($this->value)) {
            $this->value = explode(',', $this->value);
        }

        $this->value = array_filter((array) $this->value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function prepare($value)
    {
        if (is_array($value) && !Arr::isAssoc($value)) {
            $value = implode(',', array_filter($value));
        }

        return $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function value($value = null)
    {
        if (is_null($value)) {
            return empty($this->value) ? $this->getDefault() : $this->value;
        }

        $this->value = $value;

        return $this;
    }

    public function render()
    {
        $this->script = "$(\"{$this->getElementClassSelector()}\").select2({
            tags: true,
            tokenSeparators: [',']
        });";

        return parent::render();
    }
}

<?php

namespace StartupWrench\Admin\Form\Field;

trait PlainInput
{
    /**
     * @var mixed
     */
    protected $prepend;

    /**
     * @var mixed
     */
    protected $append;

    /**
     * @param $string
     * @return mixed
     */
    public function prepend($string)
    {
        if (is_null($this->prepend)) {
            $this->prepend = $string;
        }

        return $this;
    }

    /**
     * @param $string
     * @return mixed
     */
    public function append($string)
    {
        if (is_null($this->append)) {
            $this->append = $string;
        }

        return $this;
    }

    protected function initPlainInput()
    {
        if (empty($this->view)) {
            $this->view = 'admin::form.input';
        }
    }

    /**
     * @param $attribute
     * @param $value
     * @return mixed
     */
    protected function defaultAttribute($attribute, $value)
    {
        if (!array_key_exists($attribute, $this->attributes)) {
            $this->attribute($attribute, $value);
        }

        return $this;
    }
}

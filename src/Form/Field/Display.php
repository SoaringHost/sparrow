<?php

namespace StartupWrench\Admin\Form\Field;

use Closure;
use StartupWrench\Admin\Form\Field;

class Display extends Field
{
    /**
     * @var mixed
     */
    protected $callback;

    /**
     * @param Closure $callback
     */
    public function with(Closure $callback)
    {
        $this->callback = $callback;
    }

    public function render()
    {
        if ($this->callback instanceof Closure) {
            $this->value = $this->callback->call($this->form->model(), $this->value);
        }

        return parent::render();
    }
}

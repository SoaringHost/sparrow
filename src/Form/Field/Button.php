<?php

namespace SoaringHost\Admin\Form\Field;

use SoaringHost\Admin\Form\Field;

class Button extends Field
{
    /**
     * @var string
     */
    protected $class = 'btn-primary';

    /**
     * @return mixed
     */
    public function info()
    {
        $this->class = 'btn-info';

        return $this;
    }

    /**
     * @param $event
     * @param $callback
     */
    public function on($event, $callback)
    {
        $this->script = <<<EOT

        $('{$this->getElementClassSelector()}').on('$event', function() {
            $callback
        });

EOT;
    }
}

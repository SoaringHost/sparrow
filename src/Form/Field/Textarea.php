<?php

namespace SoaringHost\Admin\Form\Field;

use SoaringHost\Admin\Form\Field;

class Textarea extends Field
{
    /**
     * Default rows of textarea.
     *
     * @var int
     */
    protected $rows = 5;

    /**
     * Set rows of textarea.
     *
     * @param int $rows
     *
     * @return $this
     */
    public function rows($rows = 5)
    {
        $this->rows = $rows;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        return parent::render()->with(['rows' => $this->rows]);
    }
}

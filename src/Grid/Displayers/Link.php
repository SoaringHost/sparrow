<?php

namespace StartupWrench\Admin\Grid\Displayers;

class Link extends AbstractDisplayer
{
    /**
     * @param $href
     * @param $target
     */
    public function display($href = '', $target = '_blank')
    {
        $href = $href ?: $this->value;

        return "<a href='$href' target='$target'>{$this->value}</a>";
    }
}

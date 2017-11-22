<?php

namespace SoaringHost\Admin\Grid\Displayers;

class Button extends AbstractDisplayer
{
    /**
     * @param $style
     */
    public function display($style)
    {
        $style = collect((array) $style)->map(function ($style) {
            return 'btn-' . $style;
        })->implode(' ');

        return "<span class='btn $style'>{$this->value}</span>";
    }
}

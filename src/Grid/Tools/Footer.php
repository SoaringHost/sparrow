<?php

namespace SoaringHost\Admin\Grid\Tools;

use SoaringHost\Admin\Grid;

class Footer extends AbstractTool
{
    /**
     * @var int
     */
    protected $colspan = 1;

    /**
     * @var array
     */
    protected $tds = [];

    /**
     * @param Grid $grid
     */
    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    /**
     * @param $content
     * @param $colspan
     * @return mixed
     */
    public function td($content = '', $colspan = 1)
    {
        $this->tds[] = get_defined_vars();

        return $this;
    }

    /**
     * @param $colspan
     * @return mixed
     */
    public function colspan($colspan)
    {
        if ($td = array_pop($this->tds)) {
            $td['colspan'] = $colspan;

            array_push($this->tds, $td);
        }

        return $this;
    }

    /**
     * @param $column
     */
    public function column($column)
    {
        $data = $this->grid->model()->buildData();

        return collect(array_column($data, $column));
    }

    /**
     * @return mixed
     */
    protected function hasRowSelectorColumn()
    {
        return $this->grid->columns()->first()->getName() == Grid\Column::SELECT_COLUMN_NAME;
    }

    protected function fillTds()
    {
        $columnCount = $this->grid->columns()->count();

        $tdCount = array_sum(array_column($this->tds, 'colspan'));

        foreach (range(1, $columnCount - $tdCount) as $_) {
            $this->td();
        }
    }

    public function render()
    {
        if ($this->hasRowSelectorColumn()) {
            $this->td();
        }

        call_user_func($this->grid->footer(), $this);

        $this->fillTds();

        $tr = '';

        foreach ($this->tds as $td) {
            $tr .= "<td colspan=\"{$td['colspan']}\">{$td['content']}</td>\r\n";
        }

        return "<tr>$tr</tr>";
    }
}

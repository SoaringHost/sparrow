<?php

namespace SoaringHost\Admin\Form\Field;

/**
 * Class ListBox.
 *
 * @see https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox
 */
class Listbox extends MultipleSelect
{
    /**
     * @var array
     */
    protected $settings = [];

    /**
     * @var array
     */
    protected static $css = [
        '/vendor/laravel-admin/bootstrap-duallistbox/dist/bootstrap-duallistbox.min.css'
    ];

    /**
     * @var array
     */
    protected static $js = [
        '/vendor/laravel-admin/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js'
    ];

    /**
     * @param array $settings
     * @return mixed
     */
    public function settings(array $settings)
    {
        $this->settings = $settings;

        return $this;
    }

    public function render()
    {
        $settings = array_merge($this->settings, [
            'infoText'          => trans('admin.listbox.text_total'),
            'infoTextEmpty'     => trans('admin.listbox.text_empty'),
            'infoTextFiltered'  => trans('admin.listbox.filtered'),
            'filterTextClear'   => trans('admin.listbox.filter_clear'),
            'filterPlaceHolder' => trans('admin.listbox.filter_placeholder')
        ]);

        $settings = json_encode($settings);

        $this->script = <<<SCRIPT

$("{$this->getElementClassSelector()}").bootstrapDualListbox($settings);

SCRIPT;

        return parent::render();
    }
}

<?php

namespace StartupWrench\Admin\Grid\Tools;

abstract class BatchAction
{
    /**
     * @var mixed
     */
    protected $id;

    /**
     * @var mixed
     */
    protected $resource;

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    public function getToken()
    {
        return csrf_token();
    }

    protected function getElementClass()
    {
        return '.grid-batch-' . $this->id;
    }

    public function script()
    {
        return '';
    }
}

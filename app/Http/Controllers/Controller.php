<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Defines the default number of records records per page returned from paginator.
    **/
    protected $perPage = 15;

    /**
     * Verify that requested fields actually exist on the model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  array $fields
     * @return string|void
    **/
    protected function validateFields($model, $fields)
    {
        $columns = array_merge($model->getFillable(), ['id', 'created_at', 'updated_at']);
        foreach ($fields as $field) {
            if (!in_array($field, $columns)) {
                return $field;
            }
        }
    }
}

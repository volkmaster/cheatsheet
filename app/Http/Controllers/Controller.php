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
     * Placeholder array for the requested fields.
     */
    protected $fields = null;

    /**
     * Set the requested fields array.
     *
     * @param  string $requestFields
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  array $additionalColumns
     * @return string|void
     **/
    protected function setAndValidateFields($fields, $model, $additionalColumns = [])
    {
        if (!is_null($fields)) {
            $this->fields = explode(',', $fields);
            return $this->validateFields($model, $additionalColumns);
        }
    }

    /**
     * Checks if the requested field exists in the array of fields.
     *
     * @param  string $field
     * @return boolean
     **/
    protected function hasField($field)
    {
        return in_array($field, $this->fields);
    }

    /**
     * Adds the requested field to the array of fields.
     *
     * @param  string $field
     * @return void
     **/
    protected function addField($field)
    {
        $this->fields[] = $field;
    }

    /**
     * Removes the requested field from the array of fields.
     *
     * @param  string $field
     * @return void
     **/
    protected function removeField($field)
    {
        $key = array_search($field, $this->fields);
        unset($this->fields[$key]);
    }

    /**
     * Verify that requested fields actually exist on the model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  array $additionalColumns
     * @return string|void
     **/
    private function validateFields($model, $additionalColumns = [])
    {
        $columns = array_merge($model->getFillable(), ['id', 'created_at', 'updated_at'], $additionalColumns);
        foreach ($this->fields as $field) {
            if (!in_array($field, $columns)) {
                return $field;
            }
        }
    }
}

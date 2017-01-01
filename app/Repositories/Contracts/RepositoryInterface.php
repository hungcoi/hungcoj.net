<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    /**
     *
     * @param array $columns
     */
    public function all($columns = ['*']);

    /**
     *
     * @param int $perPage
     * @param array $columns
     */
    public function paginate($perPage = 20, $columns = ['*']);

    /**
     *
     * @param array $data
     */
    public function create(array $data);

    /**
     *
     * @param array $data
     * @param string $exist_field
     */
    public function save(array $data, $exist_field = 'id');

    /**
     *
     * @param array $data
     * @param string|int $id
     */
    public function update(array $data, $id);

    /**
     *
     * @param string|int $id
     */
    public function delete($id);

    /**
     *
     * @param string|int $id
     */
    public function forceDelete($id);

    /**
     *
     * @param string|int $id
     * @param array $columns
     */
    public function find($id, $columns = ['*']);

    /**
     *
     * @param string $field
     * @param string $value
     * @param array $columns
     */
    public function findBy($field, $value, $columns = ['*']);

    /**
     *
     * @param string $field
     * @param string $value
     * @param array $columns
     */
    public function findAllBy($field, $value, $columns = ['*']);

    /**
     *
     * @param array $columns
     */
    public function firstOrFail($columns = ['*']);

    /**
     *
     */
    public function makeModel();

    /**
     *
     */
    public function withTrashed();

    /**
     *
     */
    public function onlyTrashed();

    /**
     * And where
     *
     * @param mixed $condition Array of conditions or string field name
     * @param mixed $value Value of field (if condition is field name string)
     * @param string $operator Condition operator (ie: =, <=, >=, <>, ...)
     */
    public function where($conditions, $operator = '=', $value = '1');

    /**
     * Or where
     *
     * @param mixed $condition Array of conditions or string field name
     * @param mixed $value Value of field (if condition is field name string)
     * @param string $operator Condition operator (ie: =, <=, >=, <>, ...)
     */
    public function orWhere($conditions, $operator = '=', $value = '1');

    /**
     * Offset of cursor in result set
     *
     * @param int $offset Offset number
     */
    public function skip($offset = 0);

    /**
     * Limit records of result set
     *
     * @param int $limit Limit number
     */
    public function take($limit = 20);

    /**
     * Sort result set
     *
     * @param string $field Field name
     * @param string $direction Sort direction (ASC and DESC)
     */
    public function orderBy($field, $direction = 'ASC');

    /**
     * Insert and support created_at and updated_at columns
     *
     * @param  array   $dataArr       Insert data array
     * @param  boolean $withUpdatedAt With updated_at column?
     */
    public function insert(array $dataArr, $withUpdatedAt = false);
}

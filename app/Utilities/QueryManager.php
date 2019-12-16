<?php

namespace App\Utilities;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;

class QueryManager
{
    /**
     * The query.
     *
     * @var array
     */
    protected $query;

    /**
     * Construct a new class instance.
     *
     * @param array $query
     */
    public function __construct()
    {
        $this->query = Request::query();
    }

    /**
     * Create the query string.
     *
     * @param  array  $query
     * @return  array
     */
    public function build(array $query)
    {
        $queryString = array_merge( $this->query, $query);

        return Arr::except($queryString, ['page']);

    }

    /**
     * Remove the query string.
     *
     * @param  string $filter
     * @return  array
     */
    public function remove($filter)
    {
        return Request::except([$filter, 'page']);
    }

    /**
     * Detects specific filter.
     *
     * @param  string $filter
     * @return boolean
     */
    public function detects($filter)
    {
        return request($filter);
    }

    /**
     * Detects any active filter.
     *
     * @param  array $filters
     * @return boolean
     */
    public function detectsAny($filters)
    {
        return collect($this->query)->intersectByKeys($filters)->all();
    }

    /**
     * Make active class.
     *
     * @param  string $key
     * @param  string $filter
     * @return string | null
     */
    public function makeActiveClass($key, $filter)
    {
        return request($filter) || request($filter) == '0'  ? active($key, request($filter)) : '';
    }
}
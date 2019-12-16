<?php

namespace App\Services\Filters;

use Closure;

abstract class Filter
{
    /**
     * The filter name.
     *
     * @var string
     */
    protected $name;

    /**
     * The query builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder $builder
     */
    protected $builder;

    /**
     * Apply the filter.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected abstract function apply();

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Support\Request $request
     * @param  Closure $next
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function handle($request, Closure $next)
    {
        $this->builder = $next($request);

        if(! request()->has($this->name)) {
            return $next($request);
        }

        return $this->apply();
    }
}

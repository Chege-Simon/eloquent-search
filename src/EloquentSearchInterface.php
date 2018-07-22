<?php

namespace AcDevelopers\EloquentSearch;

/**
 * Interface EloquentSearchInterface
 *
 * @package AcDevelopers\EloquentSearchTrait
 */
interface EloquentSearchInterface
{
    /**
     * Scope a query to search for a keyword.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $keyword);

    /**
     * Return an array of all the columns to search through.
     *
     * @return array
     */
    public function searchColumns():array;
}
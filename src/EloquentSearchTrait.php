<?php

namespace AcDevelopers\EloquentSearch;

/**
 * Class EloquentSearchTrait
 *
 * @package AcDevelopers\EloquentSearchTrait
 * @author Anitche Chisom
 */
trait EloquentSearchTrait
{
    /**
     * Scope a query to search for a keyword.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $keyword)
    {
        $columns = $this->searchColumns();

        foreach ($columns as $column) {

            if ($columns === reset($columns)) {

                $query->where($column, 'like', "%{$keyword}%");

            }

            $query->orWhere($column, 'like', "%{$keyword}%");
        }

        return $query;
    }

    /**
     * Return an array of all the columns to search through.
     *
     * @return array
     */
    abstract public function searchColumns():array;
}
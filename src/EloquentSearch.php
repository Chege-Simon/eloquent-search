<?php

namespace AcDevelopers\EloquentSearch;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

/**
 * Class EloquentSearch
 *
 * @package AcDevelopers\EloquentSearch
 * @author Anitche Chisom
 */
class EloquentSearch
{
    /**
     * Search for keyword in the given models.
     *
     * @param string $keyword
     * @param array $models
     * @param int $perPage
     * @param  int|null  $currentPage
     * @param  array  $options (path, query, fragment, pageName)
     *
     * @return \Illuminate\Pagination\Paginator
     */
    static public function search($keyword, $models = ['App\User'], $perPage = 15, $currentPage = null, array $options = [])
    {
        $query = null;

        if (empty($options)) {
            $options = [
                'path' => Paginator::resolveCurrentPath()
            ];
        }

        foreach ($models as $model) {

            if ($model === reset($models)) {

                $query = self::searchModel(new $model, $keyword);

            }

            $query = $query->merge(self::searchModel(new $model, $keyword));
        }

        return new LengthAwarePaginator($query->forPage(null, $perPage), $query->count(), $perPage, $currentPage, $options);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $keyword
     * @return mixed
     */
    static private function searchModel($model, $keyword)
    {
        return $model->search($keyword)->get();
    }
}
<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    /* @var Model */
    private $model;

    /**
     * CompaniesRepository constructor.
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fetchAll()
    {
        return $this->model->all();
    }

    /**
     * @param array $params
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function create(array $data)
    {
        $post = $this->model->create($data);
        return $post;
    }
}

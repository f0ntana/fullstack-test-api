<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    /* @var Model */
    private $model;

    /**
     * CompaniesRepository constructor.
     * @param Contact $model
     */
    public function __construct(Contact $model)
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
        $register = $this->model->create($data);
        return $register;
    }
}

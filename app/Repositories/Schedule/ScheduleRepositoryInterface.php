<?php

namespace App\Repositories;

use App\Repositories\Contracts\ScheduleRepositoryInterface;
use App\Client;

class ClientRepositoryEloquent implements ScheduleRepositoryInterface
{
	private $model;

	public function __consutruct(Client $model)
	{
		$this->model = $model;
	}

	public function findAll()
	{
		return $this->model->all();
	}    
}
<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
    protected $userRepository;
    protected $userTransformer;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
        $this->userTransformer = new UserTransformer();
    }

    public function getListUser()
    {
        $allData = $this->userRepository->getAll();
        $dataResult = [];
        if (count($allData) > 0)
            $dataResult = $this->userTransformer->transform_collection($allData->all());
        return $this->returnJson(STATUS_SUCCESS, $dataResult);
    }
}

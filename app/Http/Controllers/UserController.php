<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;
    protected $userTransformer;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->userTransformer = new UserTransformer();
    }

    public function getUserByPaginate(Request $request)
    {
        $allData = $this->userRepository->getAll();
        $data_result = [];
        if (count($allData) > 0)
            $data_result = $this->userTransformer->transform_collection($allData->all());
        return $this->returnJson(STATUS_SUCCESS, $data_result);
    }
}

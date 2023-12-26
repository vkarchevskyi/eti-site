<?php

namespace App\Http\Controllers;

use App\Services\GetGroupsService;

class NewsController extends Controller
{
    public function index(GetGroupsService $getGroupsService): array
    {
        return $getGroupsService->run();
    }
}

<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController
 */
class UserController extends Controller
{

    /**
     * Get the connected user
     *
     * @return JsonResponse
     */
    public function getConnectedUser(Request $request): JsonResponse
    {
        return response()->json(
            new UserResource(Auth::user())
        );
    }
}

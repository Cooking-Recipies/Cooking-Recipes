<?php

declare(strict_types=1);

namespace App\Http\Controllers\Follow;

use App\Http\Controllers\Controller;
use App\Http\Resources\Follow\FollowCollection;
use App\Models\User;
use App\Services\Follow\Creator\FollowCreatorInterface;
use App\Services\Follow\Deleter\FollowDeleterInterface;
use App\Services\Follow\Getter\FollowGetterInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class FollowController extends Controller
{
    public function followersIndex(User $user, Request $request, FollowGetterInterface $getter): ResourceCollection
    {
        $followers = $getter->getPaginatedFollowers($user,$request->query("per-page"));

        return new FollowCollection($followers);
    }

    public function followingsIndex(User $user, Request $request, FollowGetterInterface $getter): ResourceCollection
    {
        $followings = $getter->getPaginatedFollowings($user, $request->query("per-page"));

        return new FollowCollection($followings);
    }

    public function followersMeIndex(Request $request, FollowGetterInterface $getter): ResourceCollection
    {
        $followers = $getter->getPaginatedFollowers($request->user(), $request->query("per-page"));

        return new FollowCollection($followers);
    }

    public function followingsMeIndex(Request $request, FollowGetterInterface $getter): ResourceCollection
    {
        $followings = $getter->getPaginatedFollowings($request->user(), $request->query("per-page"));

        return new FollowCollection($followings);
    }

    public function create(User $user, Request $request, FollowCreatorInterface $creator): JsonResponse
    {
        $creator->create($request->user(), $user);

        return response()->json([
            "message" => __("resources.created"),
        ], Response::HTTP_OK);
    }

    public function delete(User $user, Request $request, FollowDeleterInterface $deleter): JsonResponse
    {
        $deleter->delete($request->user(), $user);

        return response()->json([
            "message" => __("resources.deleted"),
        ], Response::HTTP_OK);
    }
}

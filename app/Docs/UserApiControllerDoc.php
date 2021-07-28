<?php

/**
 * @OA\Get(
 *   path="/api/v1/user/{user}",
 *   operationId="showUserPosts",
 *   tags={"User"},
 *   summary="Show all the posts of the user",
 *   @OA\Parameter(
 *     name="user",
 *     description="user's name",
 *     required=true,
 *     in="path",
 *     @OA\Schema(
 *       type="string"
 *     )
 *   ),
 *   @OA\Response(
 *     response=200,
 *     description="Get all the posts of the user"
 *   ),
 *   @OA\Response(
 *     response=404,
 *     description="Not Found"
 *   )
 *
 * )
 * Show the specific post 
 * 
 * @param \App\Models\Post
 * @return \Illuminate\Http\Response
 */

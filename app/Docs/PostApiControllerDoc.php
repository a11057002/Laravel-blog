<?php

/**
 * @OA\Get(
 *   path="/api/v1/post/{post}",
 *   operationId="showPost",
 *   tags={"Post"},
 *   summary="Show specific post",
 *   @OA\Parameter(
 *     name="post",
 *     description="Post slug",
 *     required=true,
 *     in="path",
 *     @OA\Schema(
 *       type="string"
 *     )
 *   ),
 *   @OA\Response(
 *     response=200,
 *     description="Get Post details"
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

<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Post Repository Variable
     *
     * @var string
     */
    private $postRepository;

    /**
     * Construct Post Controller Function
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Index Post Controller Function
     *
     * @return Post $posts
     */
    public function index()
    {
        try {
            $posts = $this->postRepository->fetchAll();
        } catch (Exception $e) {
            return response()->json($e, 500);
        }

        return response()->json($posts, 200);
    }

    /**
     * Store Post Controller Function
     * @param PostRequest $request
     * @return Post $posts
     */
    public function store(PostRequest $request)
    {
        try {
            $posts = $this->postRepository->create($request->all());
        } catch (Exception $e) {
            return response()->json($e, 500);
        }

        return response()->json($posts, 200);
    }
}

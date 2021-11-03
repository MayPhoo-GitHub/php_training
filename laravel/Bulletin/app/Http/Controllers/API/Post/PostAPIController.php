<?php

namespace App\Http\Controllers\API\Post;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateAPIRequest;
use App\Http\Requests\PostEditAPIRequest;
use App\Http\Requests\PostUploadRequest;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostAPIController extends Controller
{
  /**
   * Post Interface
   */
  private $postInterface;

  public function __construct(PostServiceInterface $postServiceInterface)
  {
    $this->postInterface = $postServiceInterface;
  }

  /**
   * This is to get post list.
   * @return Response json with post list
   */
  public function getPostList()
  {
    $postList = $this->postInterface->getPostList();
    return response()->json($postList);
  }

  /**
   * To delete post by id via api
   * @param string $postid user id
   * @return Response message
   */
  public function deletePostById($postId)
  {
    $deletedUserId = 1;
    $msg = $this->postInterface->deletePostById($postId, $deletedUserId);
    return response(['message' => $msg]);
  }

  /**
   * To create post via API
   * @param PostCreateAPIRequest $request request via API
   * @return Response json created user
   */
  public function createPost(PostCreateAPIRequest $request)
  {
    // validation for request values
    $validated = $request->validated();
    $post = $this->postInterface->savePostAPI($validated);
    return response()->json($post);
  }

  /**
   * To Update post via API
   * @param PostEditAPIRequest $request request via API
   * @param string $postId post id
   * @return Response json updated post.
   */
  public function updatePost(Request $request, $postId)
  {
    // validation for request values
    // $validated = $request->validated();
    // $post = $this->postInterface->updatedPostByIdAPI($validated, $postId);
    $post = Post::find($postId);
    $post->title = $request->title;
    $post->description = $request->description;
    $post->save();
    return response()->json($post);
  }

  /**
   * To get post by id via API
   * @param string $postId post id
   * @return Response json post object
   */
  public function getPostById($postId)
  {
    $post = $this->postInterface->getPostById($postId);
    return response()->json($post);
  }

  public function uploadPostCSVFile(PostUploadRequest $request)
  {
    $validated = $request->validated();
    $uploadedUserId = 1;
    $content = $this->postInterface->uploadPostCSV($validated, $uploadedUserId);
    if (!$content['isUploaded']) {
      return response()->json(['error' => $content['message']], JsonResponse::HTTP_BAD_REQUEST);
    } else {
      return response()->json(['message' => $content['message']]);
    }
  }
}

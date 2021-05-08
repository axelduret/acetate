<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentCollection;
use App\Http\Traits\RespondsWithHttpStatus;

class CommentController extends Controller
{
  // Import custom response trait.
  use RespondsWithHttpStatus;

  /**
   * Display the list of all comments.
   *
   * @return CommentCollection
   */
  public function index()
  {
    //
  }

  /**
   * Display the specified comment.
   *
   * @param  int  $id
   * @return Response
   */
  public function show(int $id)
  {
    // Check if the comment exists.
    $comment = Comment::find($id);
    if (!$comment) {
      return $this->failure('Comment ' . $id . ' not found.', 404);
    }
    // Success message.
    $message = 'OK';
    // Returns the comment data with success message.
    return $this->success($message, new CommentResource($comment), 200);
  }

  /**
   * Update the specified comment.
   *
   * @param  int  $id
   * @param  Request  $request
   * @return Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified comment.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(int $id)
  {
    $comment = Comment::find($id);
    // Check if the comment exists.
    if (!$comment) {
      return $this->failure('Comment ' . $id . ' not found.', 404);
    }
    $comment->event()->dissociate();
    $comment->delete();
    // Success message.
    $message = 'Comment ' . $id . ' removed successfully.';
    // Returns success message.
    return $this->success($message, null, 200);
  }

  /**
   * Validators.
   *
   * @param  bool $update
   * @return array
   */
  protected function validators($update = false)
  {
    // TODO
    $validatorRules = [];
    // Validator rules for all submitted fields.
    $validatorRules = [];
    // Validate id when update method is requested.
    if ($update) {
      $validatorRules['id'] = 'required|integer|digits_between:1,20';
    }
    return $validatorRules;
  }
}

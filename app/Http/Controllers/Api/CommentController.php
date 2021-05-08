<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentCollection;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\RespondsWithHttpStatus;

class CommentController extends Controller
{
  // Import custom response trait.
  use RespondsWithHttpStatus;

  /**
   * Response messages.
   *
   * @var array
   */
  protected $messages = [];

  /**
   * Warning messages.
   *
   * @var array
   */
  protected $warning = [];

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
  public function update(int $id, Request $request)
  {
    // Validation.
    $validatorRules = $this->validators(false, true);
    $validator = Validator::make($request->all(), $validatorRules);
    // If validation fails, returns error messages.
    if ($validator->fails()) {
      $errors = $validator->errors();
      return $this->failure($errors);
    }
    // Success message.
    $this->messages[] = 'Comment ' . $id . ' edited successfully.';
    // Load the comment.
    $comment = Comment::find($id);
    // Check if the comment exists.
    if (!$comment) {
      return $this->failure('Comment ' . $id . ' not found.', 404);
    }
    // Update the comment's fields.
    $comment->text = $request->input('text');
    // Save the comment.
    $comment->save();
    // Add warning messages to the response.
    if ($this->warning != null) {
      $this->messages[] = $this->warning;
    }
    // Returns the edited comment data with response messages.
    return $this->success($this->messages, new CommentResource(Comment::find($id)), 200);
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
   * @param  bool $comment
   * @return array
   */
  protected function validators($update = false, $comment = false)
  {
    $validatorRules = [];
    // Validator rules for all submitted fields.
    $validatorRules = [
      'text' => 'required|string|min:10|max:255',
      'user_id' => 'required|integer|digits_between:1,20',
    ];
    // Validate id when update method is requested.
    if ($update) {
      $validatorRules['id'] = 'required|integer|digits_between:1,20';
    }
    return $validatorRules;
  }
}

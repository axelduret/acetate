<?php

namespace App\Http\Traits;

use App\Models\File;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\RespondsWithHttpStatus;

trait FileTrait
{
  use RespondsWithHttpStatus;

  /**
   * Define $file property.
   *
   * @var object
   */
  protected $file = null;

  // TODO Swagger

  /**
   * Store a newly created file in database.
   *
   * @param  string  $controller
   * @param  Request  $request
   * @return Response
   */
  protected function storeFile($controller, Request $request)
  {

    // Validating fields.
    $validatorRules = $this->validateFile();
    $validator = Validator::make($request->all(), $validatorRules);

    // If validation fails
    // Return error messages and exit.
    if ($validator->fails()) {
      $errors = $validator->errors();
      return $this->failure($errors);
    }

    // If validation succeeds
    // Store fields in the database.

    $upload = $request->file('upload');
    $current = Carbon::now()->format('Ymd-His_');
    $clean_filename = preg_replace("/[^A-Za-z0-9\_\-\.]/", '_', $upload->getClientOriginalName());
    $file_name =  $current . $clean_filename;

    // Create a file model with status 0.
    $this->file = new File([
      'name' => $request->input('name'),
      'encoding' => mb_detect_encoding($upload, mb_list_encodings(), true),
      'mimetype' => $upload->getClientMimeType(),
      'path' => 'temp/' . $file_name,
      'size' => $upload->getSize(),
      'user_id' => $request->input('user_id')
    ]);
    $this->file->save();

    // Create $controller folder if doesn't exist
    if (!Storage::directories($controller)) {
      Storage::makeDirectory($controller);
    }

    // Store the file.
    $upload->storeAs($controller, $file_name);

    return $this->file;
  }

  /**
   * Validate a file.
   *
   * @return array
   */
  protected function validateFile()
  {
    $validatorRules = [];

    // Validating fields.
    $validatorRules = [
      'upload' => 'required|file',
      'filename' => 'required|string|max:128',
      'user_id' => 'required|integer|digits_between:1,20',
      'uuid' => 'string|max:32'
    ];

    return $validatorRules;
  }
}

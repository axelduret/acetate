<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait Entity
{
  /**
   * Create new controller's entities.
   *
   * @param  object  $controller
   * @param  string  $entities
   * @param  object  $model
   * @param  Request  $request
   * @return Response
   */
  protected function storeEntity($controller, $entities, $model, Request $request)
  {
    // Check if controller's entities are submitted.
    if ($request->input($entities)) {
      // Create new entities.
      $array = [];
      foreach ($request->input($entities) as $entity) {
        $array[] = new $model($entity);
      }
      // Attach entities to the controller.
      $controller->$entities()->saveMany($array);
    }
  }

  /**
   * Update specified controller's entities.
   *
   * @param  object  $controller
   * @param  string  $entities
   * @param  object  $model
   * @param  Request  $request
   * @return Response
   */
  protected function updateEntity($controller, $entities, $model, Request $request)
  {
    // Delete current entities from controller.
    $this->deleteEntity($controller, $entities);
    // Check if controller's entities are submitted.
    if ($request->input($entities)) {
      // Create new entities.
      $array = [];
      foreach ($request->input($entities) as $entity) {
        $array[] = new $model($entity);
      }
      // Attach new entities to the controller.
      $controller->$entities()->saveMany($array);
    }
  }

  /**
   * Attach specified controller's entities.
   *
   * @param  object  $controller
   * @param  string  $entities
   * @param  string  $name
   * @param  object  $model
   * @param  Request  $request
   * @return Response
   */
  protected function attachEntity($controller, $entities, $name, $model, Request $request)
  {
    // Check if controller's entities are submitted.
    if ($request->input($entities)) {
      // Collect entities.
      $array = [];
      foreach ($request->input($entities) as $entity) {
        $warning = false;
        // Check if the entity exists.
        $id = $entity['id'];
        // Load the entity.
        $entity = $model::find($id);
        if (!$entity) {
          $warning = true;
          $this->warning[] = $name . ' ' . $id . ' not found.';
        }
        if ($warning == false) {
          $array[] = $entity;
        }
      }
      // Attach entities to the controller.
      if ($array != null) {
        $controller->$entities()->saveMany($array);
      }
    }
  }

  /**
   * Detach specified controller's entities.
   *
   * @param  object  $controller
   * @param  string  $method
   * @param  string  $entities
   * @return Response
   */
  protected function detachEntity($controller, $method, $entities)
  {
    // Detach current entities from the controller.
    foreach ($controller->$entities as $entity) {
      $entity->$method()->dissociate()->save();
    }
  }

  /**
   * Delete specified controller's entities.
   *
   * @param  object  $controller
   * @param  string  $entities
   * @return Response
   */
  protected function deleteEntity($controller, $entities)
  {
    // Delete current entities only if it has no other attached relationship.
    foreach ($controller->$entities as $entity) {
      if (!$entity->user && !$entity->event && !$entity->person && !$entity->venue) {
        $entity->delete();
      }
    }
  }
}

<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait EntityTrait
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
        // Check if entity exists.
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
    // Detach entities from the controller.
    foreach ($controller->$entities as $entity) {
      $entity->$method()->dissociate()->save();
    }
  }

  /**
   * Delete specified controller's entities.
   *
   * @param  object  $controller
   * @param  array  $related
   * @param  string  $entities
   * @return Response
   */
  protected function deleteEntity($controller, $related, $entities)
  {
    // Delete entities only if it has no other attached relationships.
    foreach ($controller->$entities as $entity) {
      $relation_1 = $related[0];
      $relation_2 = $related[1];
      $relation_3 = $related[2];
      $relation_4 = $related[3];
      if (!$entity->$relation_1 && !$entity->$relation_2 && !$entity->$relation_3 && !$entity->$relation_4) {
        $entity->delete();
      }
    }
  }
}

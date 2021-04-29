<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'type',
    'category',
    'sub_category',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  public function events()
  {
    return $this->belongsToMany(Event::class);
  }

  public function venues()
  {
    return $this->belongsToMany(Venue::class);
  }

  public function people()
  {
    return $this->belongsToMany(Person::class);
  }
}

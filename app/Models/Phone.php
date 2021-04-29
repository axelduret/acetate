<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'type',
    'number',
    'firstname',
    'lastname',
    'company',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function event()
  {
    return $this->belongsTo(Event::class);
  }

  public function person()
  {
    return $this->belongsTo(Person::class);
  }

  public function venue()
  {
    return $this->belongsTo(Venue::class);
  }

  public function ticket()
  {
    return $this->belongsTo(Ticket::class);
  }
}

<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class Product extends Model
  {
      use HasFactory;

      protected $fillable = [
          'name',
          'price',
          'image',
          // Add other attributes here if needed
      ];

      // Define the relationship to the Order model (if needed)
      public function orders()
      {
          return $this->hasMany(Order::class);
      }
  }

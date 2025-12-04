<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
      use HasApiTokens, HasFactory, Notifiable;

      public function profile()
      {
          return $this->hasOne(AdminProfile::class);
      }

      public function socialLinks()
      {
          return $this->hasMany(AdminSocialLink::class);
      }

}

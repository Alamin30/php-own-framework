<?php

namespace app\Models;

class User extends Model
{
    protected $table = "users";
    protected $fillable = ["name", "email", "password"];

}
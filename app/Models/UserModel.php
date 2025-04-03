<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';  // Your table name
    protected $primaryKey = 'id';     // Your primary key
    protected $allowedFields = ['email', 'name', 'password', 'created_at'];  // Fields to be inserted/updated
    protected $useTimestamps = false; // Because you are manually adding 'created_at' in the controller
}

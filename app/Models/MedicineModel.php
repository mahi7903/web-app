<?php
namespace App\Models;

use CodeIgniter\Model;

class MedicineModel extends Model
{
    protected $table = 'medicines';
    protected $allowedFields = ['name', 'purpose', 'side_effects', 'image_url'];
    protected $useTimestamps = true;
}
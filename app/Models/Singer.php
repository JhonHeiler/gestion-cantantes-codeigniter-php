<?php 
namespace App\Models;

use CodeIgniter\Model;

class Singer extends Model{
    protected $table      = 'cantante';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','fecha_nacimiento','biografia','foto','genero'];
}
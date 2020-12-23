<?php 
namespace App\Models;

use CodeIgniter\Model;

class NotesModel extends Model
{
    protected $table = 'notes';
    
    protected $allowedFields = ['title', 'note'];
}
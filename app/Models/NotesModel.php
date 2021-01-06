<?php 
namespace App\Models;

use CodeIgniter\Model;

class NotesModel extends Model
{
    protected $table = 'notes';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id','title', 'note','image','colour','archive','trash','created'];
}
?>
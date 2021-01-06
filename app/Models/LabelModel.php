<?php 
namespace App\Models;

use CodeIgniter\Model;

class LabelModel extends Model
{
    protected $table = 'label';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['userid','labelname','created'];
}
?>
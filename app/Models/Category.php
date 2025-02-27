<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $table='category';
    protected $primaryKey='id';
    public $timestamps=true;

    protected $fillable=[
        'name',
        
    ];
    public function products(){
        return $this->hasMany(Product::class);  
    }
    
    
}

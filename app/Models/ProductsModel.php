<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
   	protected $table = 'products';
    protected $fillable = [ 'product_name','product_price','product_desccription','created_at', 'updated_at'];

}

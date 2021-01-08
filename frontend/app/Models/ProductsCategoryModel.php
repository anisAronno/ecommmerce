<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsCategoryModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table= 'products_category';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;


    public function parent() {
        return $this->belongsTo(ProductsCategoryModel::class,'parent_id');
    }

    public function children() {
        return $this->hasMany(ProductsCategoryModel::class,'parent_id');
    }

    public function products()
    {
      return $this->hasMany(product_table::class);
    }
    
    public static function ParentOrNotCategory($parent_id, $child_id)
    {
      $categories = ProductsCategoryModel::where('id', $child_id)->where('parent_id', $parent_id)->get();
      if (!is_null($categories)) {
        return true;
      }else {
        return false;
      }
    }


}

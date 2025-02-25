<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'name',
            'parent_id',
        ];

//    tạo quan hệ

        public function parent(){
            return $this->belongsTo(Categories::class,'parent_id');
        }

        public function children(){
            return $this->hasMany(Categories::class,'parent_id');
        }
        public function getParentNameAttribute(){
            return optional($this->parent)->name;
        }

        public function getParents(){
            return Categories::whereNull('parent_id')->get(['id','name']);
        }
}

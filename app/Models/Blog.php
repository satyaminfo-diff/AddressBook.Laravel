<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory,SoftDeletes;

    public $table = 'blogs';
    
    protected $hidden=['deleted_at'];
    

    public $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'tags',    
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'status' => 'integer',
        'tags' => 'string',
    ];

     /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|min:2',
        'description' => 'required|string|max:255',
        'tags' => 'required|string',
    ];
}

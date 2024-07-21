<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'fk_department',
        'fk_designation',
        'phone_number'
    ];
    public function department(){
        return $this->belongsTo(Department::class,'fk_department');
    }
    public function designation(){
        return $this->belongsTo(Designation::class,'fk_designation');
    }
    public function scopeInfo($query)
    {
        return $query->with(['department', 'designation']);
    }
    public function scopeSearch($query, $search)
    {
        return $query->with(['department', 'designation'])
            ->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhereHas('department', function($q) use ($search) {
                      $q->where('name', 'like', "%$search%");
                  })
                  ->orWhereHas('designation', function($q) use ($search) {
                      $q->where('name', 'like', "%$search%");
                  });
            });
    }
}

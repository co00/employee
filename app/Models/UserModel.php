<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'employee_user';
	public $timestamps = true;
	
     protected $fillable = ['name', 'email', 'dob', 'address'];

    public function store()
    {
    	$fillable = ['name', 'email', 'dob', 'address'];
    	//return static::create($input);
    }

    public function getData()
    {
        return static::orderBy('created_at','desc')->get();
    }

    public function findData($id)
    {
        return static::find($id);
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }

}

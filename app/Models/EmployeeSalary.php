<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    protected $table = 'employee_salary';
	public $timestamps = true;
	
    protected $fillable = ['user_id', 'salary_type', 'start_date', 'end_date','salary_amount','deductions','description','total_day','total_salary','total_deductions','net_total'];

    public function store($input)
    {
    	return static::create($input);
    }

    public function getData($id)
    {

        return static::where(['user_id'=>$id])->orderBy('created_at','desc')->get();
    }

}

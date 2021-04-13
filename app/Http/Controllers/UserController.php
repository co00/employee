<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\UserModel;
use App\Models\EmployeeSalary;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use \Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Auth::logout();
        // echo Auth::logout();die();
        return view('user/index');
    }

    public function add()
    {
        return view('user/add');
    }

    public function store(Request $request, UserModel $usermodel)
    {
        $storeData = $validated = $request->validate([
                        'name' => 'required',
                        'email' => 'required|unique:employee_user',
                        'dob' => 'required',
                        'address' => 'required',
                    ]);


        $is_success = UserModel::create($storeData);


       // echo '<pre>'; print_r($is_success); die();

        session(['response' => 'success','response' => 'Record added successfully']);

        return redirect('/user');

    }

    public function datatable(Request $request, UserModel $usermodel)
    {
        $data = $usermodel->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<a href="user/edit/'.$data->id.'" class="btn btn-success btn-sm">Edit</a> <br><br> <a href="user/delete/'.$data->id.'" class="btn btn-danger btn-sm">Delete</a>';
            })
            ->addColumn('Salary', function($data) {
                return '<button class="btn btn-warning btn-sm addSalarybtn" data-toggle="modal" data-target="#addSalaryModal" data-id="'.$data->id.'">Add Salary</button> <br><br> <a href="user/showsalary/'.$data->id.'" class="btn btn-primary btn-sm">View Salary</a>';
            })
            ->rawColumns(['Salary','Actions'])
            ->make(true);
    }

    public function edit($id)
    {
        $usermodel = new UserModel;
        $data['data'] = $usermodel->findData($id);

        return view('user/edit',$data);
    }

    public function update(Request $request, UserModel $usermodel)
    {
        $storeData = $validated = $request->validate([
                        'id' => 'required',
                        'name' => 'required',
                        'email' => 'required',
                        'dob' => 'required',
                        'address' => 'required',
                    ]);

        $usermodel->updateData($storeData['id'], $storeData);
        return redirect('/user');
    }

    public function delete($id)
    {
        $usermodel = new UserModel;
        $usermodel->deleteData($id);

        return redirect('/user');

        // return response()->json(['success'=>'Article deleted successfully']);
    }

    public function addsalary(Request $request)
    {



        $storeData = $validated = $request->validate([
                        'user_id' => 'required',
                        'salary_type' => 'required',
                        'start_date' => 'required',
                        'end_date' => 'required',
                        'salary_amount' => 'required',
                        'deductions' => 'required',
                        'description' => 'required',
                        'total_day' => 'required',
                        'total_salary' => 'required',
                        'total_deductions' => 'required',
                        'net_total' => 'required',
                    ]);


        $employee_salary = new EmployeeSalary;
        $employee_salary->store($storeData);

        return response()->json(['statuscode'=>true,'msg'=>'Recourd insert successfully.!']);

        //echo '<pre>'; print_r($storeData); die();
    }

    public function showsalary($id)
    {
        $data['id'] = $id;

        return view('user/showsalary',$data);
    }

    public function salary_datatable(Request $request,EmployeeSalary $employee_salary,$id)
    {
       
        $data = $employee_salary->getData($id);
        return \DataTables::of($data)
            ->addColumn('start_date', function($data) {
                        return date("d-M-Y", strtotime($data->start_date));
                    })
            ->addColumn('Actions', function($data) {
                return '<b>-</b>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }
}

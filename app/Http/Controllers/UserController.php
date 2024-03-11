<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\UserDataTable;
use DataTables;

class UserController extends Controller
{
    //
    public function index(UserDataTable $dataTable){
        if(request()->ajax()){
            $data = User::latest()->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return $dataTable->render('users.list');
    }
    public function datatables(UserDataTable $dataTable)
    {
        
        return $dataTable->ajax();
    }
    
}

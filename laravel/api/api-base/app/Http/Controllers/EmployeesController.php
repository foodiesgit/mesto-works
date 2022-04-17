<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
class EmployeesController extends Controller
{
    public  function getEmployees (){
        $getEmployees = Employees::all();
        if($getEmployees->count() < 1){
            return response()->json(['message' => 'Data not found!'],200);
        }
        // return response()->json($getEmployees, 200);
        // return response($getEmployees, 200);
        return $getEmployees;//all the same
    }

    public  function detailsEmployee ($id){
        $detailsEmployee = Employees::find($id);
        if(is_null($detailsEmployee)){
            return response()->json(['message' => 'Data not found!'],200);
        }
        return $detailsEmployee;
    }

    public  function addEmployee (Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'salery' => 'numeric|required|gt:3000|lte:100000'
        ]);
        $addEmployee = Employees::create($request->all());
        return $addEmployee;
    }

    public  function updateEmployee (Request $request, $id){
        $request->validate([
            'name' => 'required|min:3|max:100',
            'salery' => 'numeric|required|gt:3000|lte:100000'
        ]);
        $updateEmployee = Employees::find($id);
        if(is_null($updateEmployee)){
            return response()->json(['message' => 'Data not found!'],200);
        }
        return $updateEmployee->update($request->all());
    }

    public  function deleteEmployee (Request $request, $id){
        $deleteEmployee = Employees::find($id);
        if(is_null($deleteEmployee)){
            return response()->json(['message' => 'Data not found!'],200);
        }
        return $deleteEmployee->delete();
    }

    public function searchEmployees($name)
    {
        $searchEmployees = Employees::where('name', 'LIKE', '%'.$name.'%')->get();
        if($searchEmployees->count() < 1){
            return response()->json(['message' => 'Data not found!'],200);
        }
        return Employees::where('name', 'LIKE', '%'.$name.'%')->get();
    }
}

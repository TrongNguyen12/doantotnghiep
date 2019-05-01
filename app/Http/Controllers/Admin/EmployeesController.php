<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employees;
use DateTime;
class EmployeesController extends Controller
{
    //
    public function getEmployees()
    {
        $data['listEmployees'] = Employees::orderBy('em_id', 'DESC')->get();
    	return view('pages.employees.employees', $data);
    }
    public function getAddEmployees()
    {
    	return view('pages.employees.addEmployees');
    }
    // chua bat loi
    public function postAddEmployees(Request $request)
    {
        if($request->hasFile('img')){
            $filename = $request->img->getClientOriginalName();
            $filename = time().'_'.$filename;
            $request->img->move('public/uploads/avatarEmployees' , $filename);
        }else {
            $filename= null;
        }
    	$employees = new Employees;
    	$employees->em_name = $request->name;
    	$employees->em_sex = $request->sex;
    	$employees->em_birthday = date( 'Y/m/d', strtotime($request->date));
    	$employees->em_phone = $request->phone;
    	$employees->em_email = $request->email;
    	$employees->em_title = $request->emtitle;
    	$employees->em_address = $request->add;
    	$employees->em_img = $filename;
    	$employees->em_status = 1;
    	$employees->created_at = new DateTime();
        $employees->updated_at = null;
    	$employees->save();
    	return redirect('admin/employees')->with('Tsuccess', 'Thêm mới nhân viên thành công !');
    }
    public function getDeleteEmployees($id)
    {
       Employees::destroy($id);
       return back()->with('Tsuccess', 'Xóa nhân viên thành công !');
    }
    public function getEditEmployees($id)
    {
        $data['employees'] = Employees::find($id);
        return view('pages.employees.editEmployees', $data);
    }
    public function postEditEmployees($id, Request $request)
    {
        if($request->hasFile('img')){
            $filename = $request->img->getClientOriginalName();
            $filename = time().'_'.$filename;
            $request->img->move('public/uploads/avatarEmployees' , $filename);
        }else {
            $filename= null;
        }
        $employees = Employees::find($id);
        $employees->em_name = $request->name;
        $employees->em_sex = $request->sex;
        $employees->em_birthday = date( 'Y/m/d', strtotime($request->date));
        $employees->em_phone = $request->phone;
        $employees->em_email = $request->email;
        $employees->em_title = $request->emtitle;
        $employees->em_address = $request->add;
        if($filename !=null){
            $employees->em_img = $filename;
        }
        $employees->em_status = 1;
        $employees->created_at = new DateTime();
        $employees->updated_at = null;
        $employees->save();
        return redirect('admin/employees')->with('Tsuccess', 'Sửa thông tin nhân viên thành công !');
    }
    public function getLockEmployees($id)
    {
        $employees = Employees::find($id);
        $employees->em_status = 0;
        $employees->save();
        return back()->with('Tsuccess', 'Khóa nhân viên thành công !');
    }
}

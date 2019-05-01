<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use DateTime;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
class CategoryController extends Controller
{
    //
    public function getCate()
    {
    	$data['listcate'] = Category::all();
    	return view('pages.category.category', $data);
    }
    public function postCate(AddCategoryRequest $request)
    {
    	if($request->status == 'active'){
    		$status = 1;
    	}else {
    		$status = 0;
    	}
    	$category = new Category;
    	$category->cate_name = $request->name;
    	$category->cate_slug = str_slug($request->name);
    	$category->cate_parentID = $request->parentID;
    	$category->cate_status = $status;
    	$category->created_at = new DateTime();
    	$category->save();
    	return back()->with('Tsuccess', 'Thêm danh mục thành công !');
    }
    public function getDeleteCate($id)
    {
        $parent = Category::where('cate_parentID', $id)->count();
        if($parent == 0 ){
            Category::destroy($id);
            return back()->with('Tsuccess', 'Xóa danh mục thành công !');
        }else {
            return back()->with('Terror', 'Không thể xóa danh mục này !');
        }
    }
    public function getEditCate($id)
    {
        $data['data'] = Category::find($id);
        $data['parent'] = Category::all();
        return view('pages.category.editCategory', $data);
    }
    public function postEditCate(EditCategoryRequest $request, $id)
    {
        if($request->status == 'active'){
            $status = 1;
        }else {
            $status = 0;
        }
        $category = Category::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->cate_parentID = $request->parentID;
        $category->cate_status = $status;
        $category->updated_at = new DateTime();
        $category->save();
        return redirect('admin/category')->with('Tsuccess', 'Sửa danh mục thành công !');
    }
}

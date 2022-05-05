<?php

namespace App\Http\Controllers\Admin;
use App\Repositories\Products\ProductsRepositories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class ProductsController extends Controller
{
    public function __construct(ProductsRepositories $category_repo)
    {
    	$this->ProductsRepositories = $category_repo;
    }
    public function index($slug=false,$id=false,Request $request)
    {
    	$data = $this->ProductsRepositories->index($slug,$id,$request);
    	return view('admin/template')->with($data);  
    }
     public function getRecords(Request $request)
    {
        $data = $this->ProductsRepositories->getRecords($request);
        return $data;
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_name'             => 'required',
            'product_price'             => 'required',
            'product_desccription'             => 'required'
        ]);
       
        if(isset($request->product_id) && $request->product_id!='')
        $result = $this->ProductsRepositories->update($request->product_id,$request);
        else
        $result = $this->ProductsRepositories->store($request);

        return redirect('admin/products')->withError('Product deleted successfully'); 
    }
    public function edit($id)
    {
        $data = $this->ProductsRepositories->edit($id);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        $request->validate([
            'product_name'             => 'required',
            'product_price'             => 'required',
            'product_desccription'             => 'required'
        ]);

        $result = $this->ProductsRepositories->update($id,$request);
         return redirect('admin/products')->withError('Product updated successfully'); 
    }
    public function delete($id)
    {
        $data = $this->ProductsRepositories->delete($id);
        return redirect('admin/products')->withError('Category deleted successfully'); 
    }

}

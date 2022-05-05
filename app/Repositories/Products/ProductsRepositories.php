<?php

namespace App\Repositories\Products;
use App\Models\User as UserModel;
use App\Models\ProductsModel;
use App\Models\ProductImagesModel;
use Illuminate\Support\Str;
use Auth;
use DataTables;
use DB;

class ProductsRepositories
{
    public function __construct(UserModel $user,ProductsModel $ProductsModel,ProductImagesModel $images)
    {
        $this->UserModel           = $user;
        $this->ProductsModel     = $ProductsModel;
        $this->ProductImagesModel     = $images;
    }
    public function index($slug,$id,$request)
    {
        $data['middleContent']    = 'admin/products/index';
        $data['pageTitle']        = 'News';
        return $data;
    }
     public function getRecords($request)
    {
        $arrData  =  $final_array=[]; 
        $column = '';

        $keyword = $request->input('search')['value'];  

        if ($request->input('order')[0]['column'] == 1) 
        $column = "product_name";


        if ($request->input('order')[0]['column'] == 2) 
        $column = "product_price";

        if ($request->input('order')[0]['column'] == 3) 
        $column = "product_desccription";


        $order = strtoupper($request->input('order')[0]['dir']);           

        $obj_data =  DB::table('products');

        if (isset($keyword) && $keyword!= '') 
        $obj_data = $obj_data->whereRaw('(product_name LIKE "%'.$keyword.'%")');  

        $count = $obj_data->get()->count();
        if($order =='ASC' && $column=='')
        {
          $obj_data  = $obj_data->orderBy('id','DESC')->limit($request->input('length'))->offset($request->input('start'));
        }
        if( $order !='' && $column!='' )
        {
          $obj_data = $obj_data->orderBy($column,$order)->limit($request->input('length'))->offset($request->input('start'));
        }

        $arrData = $obj_data->get();
        $resp['recordsTotal'] = $count;
        $resp['recordsFiltered'] = $count;
        $build_active_btn='' ; 
        
        if(count($arrData)>0)
        {
            $i=0;
            foreach($arrData as $key => $row)
            {
                $build_view_action ='<div class="d-flex align-items-center gap-3 fs-6">'; 

                 $build_view_action .= '<a href="" data-bs-toggle="modal" data-bs-target="#addProductModal" onclick="editProduct(this)" class="text-warning" data-id="'.$row->id.'" title="Update Story" aria-label="Update"><ion-icon name="pencil-sharp"></ion-icon></a>'; 
                
                $build_view_action .= '&nbsp;<a href="'.url('/').'/admin/products/delete/'.base64_encode($row->id).'" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" onclick="return confirm_action(this,event,\'Do you really want to delete this record ?\')" title="" data-bs-original-title="Delete" aria-label="Delete"><ion-icon name="trash-sharp"></ion-icon></a>';

                $build_view_action .= '</div>';

                $final_array[$i][0] = $key+1;
                $final_array[$i][1] = $row->product_name;
                $final_array[$i][2] = $row->product_price;
                $final_array[$i][3] = $row->product_desccription;
                $final_array[$i][4] = $build_view_action;
                $i++;
            }
        }
        $resp['data'] = $final_array;
        echo str_replace("\/", "/",  json_encode($resp));exit; 
    } 
    public function store($request)
    {
        $formData = $request->all();
        
        $insertData['product_name']             = $formData['product_name'];
        $insertData['product_price']            = $formData['product_price'];
        $insertData['product_desccription']     = $formData['product_desccription'];

       
        $result = $this->ProductsModel->create($insertData);
        
        if (isset($request->files)) 
        {
            $arrFiles = $request->file('files');
            foreach ($arrFiles as $key => $photo) 
            {
                $destinationPath = public_path('uploads/products/'.$result->id);
                $name       = $photo->getClientOriginalName();
                $imageName  = 'product_image_'.$key.$result->id.'.'.$photo->extension();  
                $photo->move($destinationPath, $imageName);

                $imageData['product_id']  =  $result->id;
                $imageData['image']       =  $imageName;
                $this->ProductImagesModel->create($imageData);
            }
        }
        return $result;
    }
    public function edit($id)
    {
        $data       = $this->ProductsModel->where('id',$id)->first();
        return $data;
    }
    public function update($id,$request)
    {
        $formData = $request->all();
        $updateData['product_name']             = $formData['product_name'];
        $updateData['product_price']            = $formData['product_price'];
        $updateData['product_desccription']     = $formData['product_desccription'];
        $result = $this->ProductsModel->where('id',$id)->update($updateData);
      
        if (isset($request->files) && count($request->files)>0) 
        {
            $arrFiles = $request->file('files');
            foreach ($arrFiles as $key => $photo) 
            {
                $destinationPath = public_path('uploads/products/'.$id);
                $name       = $photo->getClientOriginalName();
                $imageName  = 'product_image_'.$key.$id.'.'.$photo->extension();  
                $photo->move($destinationPath, $imageName);

                $imageData['product_id']  =  $id;
                $imageData['image']       =  $imageName;
                $this->ProductImagesModel->create($imageData);
            }
        }

        return $result;
    }
    public function delete($id)
    {  
        $result = $this->ProductsModel->where('id',base64_decode($id))->delete();
        return $result;
    }
}

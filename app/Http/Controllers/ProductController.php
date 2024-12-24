<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('product.list', compact('products'));
    }
    

    public function create(){
     return view ('product.create');   
    }
    public function store(Request $request){
    $rule =[ 
    'name'=>'required|min:3',
    'sku'=>'required|min:3',
    'price'=>'required|numeric',
    ];

    if ($request->image !=""){
        $rule['image'] = 'image';
    }
       $validator = Validator::make($request->all(),$rule);

      if ($validator->fails())
       {
        return redirect()->route('product.create')
        ->withinput()
        ->withErrors($validator);  
        
    }
    //product in db
    $product=new Product();
    $product->name = $request->name;
    $product->sku = $request->sku;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->save();
    
    if ($request->image != ""){
       
    //store in images
    $image = $request->image;
    $ext = $image->getClientOriginalExtension();
    $imageName = time().'.'.$ext;
    //save image product directory
    $image->move(public_path('upload/product'),$imageName);
    //save image db
    $product->image = $imageName;
    $product->save();
    }

    return redirect()->route('product.index')->with('success','Product added successfully.');
    
}
    public function edit($id){
        $product = Product::findOrFail($id);
        return view ('product.edit',['product'=>$product]);

        
    }
    public function update($id,Request $request){
        $product = Product::findOrFail($id);
        $rule =[ 
            'name'=>'required|min:3',
            'sku'=>'required|min:3',
            'price'=>'required|numeric',
            ];
        
            if ($request->image !=""){
                $rule['image'] = 'image';
            }
               $validator = Validator::make($request->all(),$rule);
        
              if ($validator->fails())
               {
                return redirect()->route('product.edit',$product->id)
                ->withinput()
                ->withErrors($validator);  
                
            }
            //product in db
    
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->save();
            
            if ($request->image != ""){
             
                file::delete(public_path('upload/product/'.$product->image));
            //store in images
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            //save image product directory
            $image->move(public_path('upload/product'),$imageName);
            //save image db
            $product->image = $imageName;
            $product->save();
            }
        
            return redirect()->route('product.index')->with('success','Product update successfully.');  
        
    }
    public function destroy($id){
        $product = Product::findOrFail($id);
        File::delete(public_path('upload/product/'.$product->image));
        $product->delete();

        return redirect()->route('product.index')->with('success','Product delete successfully.'); 

    }
    
}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Simple Laravel 11 Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Simple Laravel 11 Crud</h3>
    </div>
    <div class="container">
    <div class="row justify-content-center mt-4">
<div class="d-flex justify-content-end">
<a href="{{ route('product.index') }}" class="btn btn-dark small-btn">Back</a>
</div>
      </div>
     <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card borde-0 shadow-lg my-4">
                <div class="card-header bg-dark">
                    <h3 class="text-white">Edit Product</h3>
        
                </div>
                <form enctype="multipart/form-data" action="{{route('product.update',$product->id)}}"method="post">
                  @method('PUT')
                    @csrf
                <div class="card-body">

                    <div class="mb-3">
                       <label for=""class="form-label">Name</label>
                       <input value="{{old('name',$product ->name)}}" type="text"class="form-control form-control-lg @error('name') is-invalid @enderror"placeholder="Name"name="name">
                       @error('name')
                       <p class="invalid-feedback">{{ $message }}</p>
                       @enderror
                    </div>

                    <div class="mb-3">
                       <label for=""class="form-label">sku</label>
                       <input value="{{old('sku',$product->sku)}}"  type="text"class="form-control form-control-lg  @error('sku') is-invalid @enderror"placeholder="sku"name="sku">
                       @error('sku')
                       <p class="invalid-feedback">{{ $message }}</p>
                       @enderror
                    </div>

                    <div class="mb-3">
                       <label for=""class="form-label">Price</label>
                       <input value="{{old('price',$product->price)}}" type="text"class="form-control form-control-lg  @error('price') is-invalid @enderror"placeholder="Price"name="price">
                       @error('price')
                     <p class="invalid-feedback">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="mb-3">
                       <label for=""class="form-label">Desription</label>
                      <textarea class="form-control" name="description" cols="30"rows="5" >{{old('sku',$product->description)}}</textarea>
                    </div>

                    <div class="mb-3">
                       <label for=""class="form-label">Image</label>
                       <input type="file"class="form-control form-control-lg"placeholder="image"name="image">

                       @if ($product->image != "")
                        <img class="w-50 my-3" src="{{asset('upload/product/'.$product->image)}}" alt="">
                        @endif

                    </div>
                    <div class="d-grid">
                        <button class="btn btn-dark btn dark">Update</button>

                    </div>
                </div>
                </form>
            </div>
        </div>
     </div>   
    </div>
  </body>
</html>
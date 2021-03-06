@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
@stop
@section('admin')



    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Create Product</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.save.product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Name</label>
                                <input type="text" name="product_name" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Old Price (if have)</label>
                                <input type="number" name="product_old_price" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product New Price</label>
                                <input type="number" name="product_new_price" class="form-control" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product Main Category</label>
                                <select class="form-control" name="top_cat_id">
                                    <option value="0">select any</option>
                                    @foreach($top_cats as $tcat)
                                        <option value="{{$tcat->id}}">{{$tcat->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product Mid Category</label>
                                <select class="form-control" name="mid_cat_id">
                                    <option value="0">select any</option>
                                    @foreach($mid_cats as $mcat)
                                        <option value="{{$mcat->id}}">{{$mcat->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product End Category</label>
                                <select class="form-control" name="end_cat_id">
                                    <option value="0">select any</option>
                                    @foreach($end_cats as $ecat)
                                        <option value="{{$ecat->id}}">{{$ecat->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product Brand (if have)</label>
                                <select class="form-control" name="brand_id">
                                    <option value="0">select any</option>
                                    @foreach($brand as $brd)
                                        <option value="{{$brd->id}}">{{$brd->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Product Color (if have)</label>
                                <select class="form-control" multiple name="color_id[]">
                                    @foreach($color as $cl)
                                        <option value="{{$cl->id}}">{{$cl->color_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Product Size (if have)</label>
                                <select class="form-control" multiple name="size_id[]">
                                    @foreach($size as $sz)
                                        <option value="{{$sz->id}}">{{$sz->size_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Main Image</label>
                                <input type="file" name="main_image" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Image 1 (optional)</label>
                                <input type="file" name="image_one" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Image 2 (optional)</label>
                                <input type="file" name="image_two" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Image 3 (optional)</label>
                                <input type="file" name="image_three" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Image 4 (optional)</label>
                                <input type="file" name="image_four" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Image 5 (optional)</label>
                                <input type="file" name="image_five" class="form-control" >
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Product Sort Description</label>
                                <textarea type="text" cols="5" rows="5" name="sort_des" class="form-control" ></textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Product Long Description</label>
                                <textarea type="text" cols="5" rows="5" name="long_des" class="form-control" ></textarea>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Is Hot Deal</label>
                                <select class="form-control" name="is_hot_deal">
                                    <option value="0">select any</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Is Today Offer</label>
                                <select class="form-control" name="is_today_offer">
                                    <option value="0">select any</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Status</label>
                                <select class="form-control" name="status">
                                    <option value="0">select any</option>
                                    <option value="1">Publish</option>
                                    <option value="2">Un-Publish</option>
                                </select>
                            </div>


                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop
@section('js')
    <script type="text/javascript" src="{{asset('assets/admin/js/nicEdit-latest.js')}}"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

@endsection

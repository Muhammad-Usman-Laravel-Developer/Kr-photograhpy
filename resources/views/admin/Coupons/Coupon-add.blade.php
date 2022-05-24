@extends('admin.layouts.main')
@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin_Coupon')}}">Coupon-List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Coupon-Add</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Coupon Add</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-5 mb-4 ml-4">
                <div class="card border-light shadow-sm components-section">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-12 col-sm-12">
                                <!-- Form -->
                                @if(Session::has('success'))
                                    <div class="alert alert-success mb-4" id="success-alert">
                                        <center><span class="text-white">{{Session::get('success')}}</span></center>
                                    </div>
                                @endif
                                <form action="{{route('admin_Coupon_add_edit')}}" method="POST" >
                                    @csrf
                                    <div class="mb-4">
                                        <label for="title">Code</label>
                                        <input type="text" class="form-control"  name="code" placeholder="Enter code...">
                                    </div>
                                    <sqan style="color: crimson">@error('code'){{$message}}@enderror</sqan>
                                    <div class="my-4">
                                        <label for="textarea">Discount</label>
                                        <input type="number" class="form-control"  name="discount" placeholder="Enter discount...">
                                    </div>
                                    <sqan style="color: crimson">@error('discount'){{$message}}@enderror</sqan>
                                    <div class="my-4">
                                        <label for="textarea">Quantity</label>
                                        <input type="number" class="form-control"  name="quantity" placeholder="Enter quantity...">
                                    </div>
                                    <sqan style="color: crimson">@error('quantity'){{$message}}@enderror</sqan>
                                    <fieldset class="my-4">
                                        <legend class="h6">Status</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked="">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Inactive
                                            </label>
                                        </div>
                                    </fieldset>
                                    <div class="my-4">
                                        <button class="btn btn-pill btn-outline-success" type="submit">Submit</button>
                                    </div>

                                </form>
                                <!-- End of Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

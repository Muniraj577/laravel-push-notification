@extends('layouts.admin.app')
@section('title','General Information')
@section('gif','active')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    @include('layouts.admin.snippets.msg')
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-body">
                                        @if(count($generalsettings) > 0)
                                            @foreach($generalsettings as $generalsetting)
                                                <div id="newLogoImage">
                                                    <img
                                                        src="{{asset('images/general/'.$generalsetting->company_logo)}}"
                                                        class="img-fluid d-block mx-auto"
                                                        alt="">
                                                </div>
                                                <div class="text-center">
                                                    <i class="fa fa-building"></i> <span id="cname"
                                                                                         class="font-weight-bold"
                                                                                         style="font-size: 1.5rem">
                                                        {{$generalsetting->company_name}}
                                                    </span>
                                                </div>
                                                <p class="mt-2 text-center"><i class="fa fa-envelope"></i>
                                                    <span id="cemail">{{$generalsetting->company_email}}</span></p>
                                                <p class="mt-2 text-center"><i class="fa fa-phone"></i>
                                                    <span id="cphone">{{$generalsetting->company_phone}}</span>
                                                </p>
                                                <p class="mt-2 text-center"><i class="fa fa-phone"></i>
                                                    <span id="cphone1">{{$generalsetting->company_phone1}}</span>
                                                </p>
                                                <p class="mt-2 text-center"><i class="fa fa-map-marker"></i>
                                                    <span id="caddress">{{$generalsetting->company_address}}</span>
                                                </p>
                                                <form class="text-center"
                                                      action="{{route('general.delete', $generalsetting->id)}}"
                                                      method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-header">
                                        General Information
                                    </div>
                                    <div class="card-body">
                                        @if(count($generalsettings)==0)
                                            <form action="{{route('general.store')}}" method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="alert-form form-group">
                                                    <label for="company_name">Company Name</label>
                                                    <input type="text" name="company_name" class="form-control"
                                                           placeholder="Enter company name">
                                                    @if($errors->has('company_name'))
                                                        <p class="error alert alert-danger">{{$errors->first('company_name')}}</p>
                                                    @endif
                                                </div>
                                                <div class="alert-form form-group">
                                                    <label for="company_email">Company email</label>
                                                    <input type="email" name="company_email" class="form-control"
                                                           placeholder="Enter company email">
                                                    @if($errors->has('company_email'))
                                                        <p class="error alert alert-danger">{{$errors->first('company_email')}}</p>
                                                    @endif
                                                </div>
                                                <div class="alert-form form-group">
                                                    <label for="company_address">Company Address</label>
                                                    <input type="text" name="company_address" class="form-control"
                                                           placeholder="Enter company address">
                                                    @if($errors->has('company_address'))
                                                        <p class="error alert alert-danger">{{$errors->first('company_address')}}</p>
                                                    @endif
                                                </div>
                                                <div class="alert-form form-group">
                                                    <label for="company_phone">Company Phone</label>
                                                    <input type="text" name="company_phone" class="form-control"
                                                           placeholder="Enter company phone">
                                                    @if($errors->has('company_phone'))
                                                        <p class="error alert alert-danger">{{$errors->first('company_phone')}}</p>
                                                    @endif
                                                </div>
                                                <div class="alert-form form-group">
                                                    <label for="company_phone1">Company Phone</label>
                                                    <input type="text" name="company_phone1" class="form-control"
                                                           placeholder="Enter company phone">
                                                    @if($errors->has('company_phone1'))
                                                        <p class="error alert alert-danger">{{$errors->first('company_phone1')}}</p>
                                                    @endif
                                                </div>
                                                <div class="alert-form form-group">
                                                    <label for="company_slogan">Company Slogan</label>
                                                    <input type="text" name="company_slogan" class="form-control"
                                                           placeholder="Enter company slogan">
                                                    @if($errors->has('company_slogan'))
                                                        <p class="error alert alert-danger">{{$errors->first('company_slogan')}}</p>
                                                    @endif
                                                </div>
                                                <div class="alert-form form-group">
                                                    <label for="company_desc">Company Description</label>
                                                    <textarea name="company_desc" id="desc" cols="30" rows="10">{{old('company_desc')}}</textarea>
                                                    @if($errors->has('company_desc'))
                                                        <p class="error alert alert-danger">{{$errors->first('company_desc')}}</p>
                                                    @endif
                                                </div>
                                                <div class="alert-form form-group">
                                                    <label for="company_logo">Company Logo</label>
                                                    <input type="file" name="company_logo" class="form-control"
                                                           id="img">
                                                    <img src="" id="imgPreview" alt="">
                                                    @if($errors->has('company_logo'))
                                                        <p class="error alert alert-danger">{{$errors->first('company_logo')}}</p>
                                                    @endif
                                                </div>
                                                <div class="alert-form form-group">
                                                    <button type="submit" class="btn btn-outline-success">Submit
                                                    </button>
                                                </div>
                                            </form>
                                        @elseif(count($generalsettings) > 0)
                                            @foreach($generalsettings as $generalsetting)
                                                <input type="hidden" id="idVal" value="{{$generalsetting->id}}"
                                                       name="id">
                                                <form class="updateForm">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label for="cname" class="font-weight-bold pt-2">Company
                                                                Name</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="text" name="company_name"
                                                                   value="{{$generalsetting->company_name}}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="col-2">
                                                            <button class="btn btn-success updateButton">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form class="updateForm">
                                                    <div class="row mt-4">
                                                        <div class="col-3">
                                                            <label for="cname" class="font-weight-bold pt-2">Company
                                                                Email</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="text" name="company_email"
                                                                   value="{{$generalsetting->company_email}}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="col-2">
                                                            <button class="btn btn-success updateButton">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form class="updateForm">
                                                    <div class="row mt-4">
                                                        <div class="col-3">
                                                            <label for="cname" class="font-weight-bold pt-2">Company
                                                                Address</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="text" name="company_address"
                                                                   value="{{$generalsetting->company_address}}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="col-2">
                                                            <button class="btn btn-success updateButton">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form class="updateForm">
                                                    <div class="row mt-4">
                                                        <div class="col-3">
                                                            <label for="cname" class="font-weight-bold pt-2">Company
                                                                Phone</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="text" name="company_phone"
                                                                   value="{{$generalsetting->company_phone}}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="col-2">
                                                            <button class="btn btn-success updateButton">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form class="updateForm">
                                                    <div class="row mt-4">
                                                        <div class="col-3">
                                                            <label for="cname" class="font-weight-bold pt-2">Company
                                                                Phone1</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="text" name="company_phone1"
                                                                   value="{{$generalsetting->company_phone1}}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="col-2">
                                                            <button class="btn btn-success updateButton">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form class="updateForm">
                                                    <div class="row mt-4">
                                                        <div class="col-3">
                                                            <label for="cname" class="font-weight-bold pt-2">Company
                                                                Slogan</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="text" name="company_slogan"
                                                                   value="{{$generalsetting->company_slogan}}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="col-2">
                                                            <button class="btn btn-success updateButton">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form class="updateForm">
                                                    <div class="row mt-4">
                                                        <div class="col-3">
                                                            <label for="cname" class="font-weight-bold pt-2">Company
                                                                Logo</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <input type="file" name="company_logo" class="form-control"
                                                                   id="logo">
                                                            <img id="logoPreview"
                                                                 src="{{asset('images/general/'.$generalsetting->company_logo)}}"
                                                                 class="img-fluid" alt="">
                                                        </div>
                                                        <div class="col-2">
                                                            <button class="btn btn-success updateButton">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form action="" class="updateForm">
                                                    <div class="row mt-4">
                                                        <div class="col-12">
                                                            <label for="">About us</label>
                                                            <textarea name="company_desc" id="desc" cols="30"
                                                                      rows="10">{{$generalsetting->company_desc}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button class="btn btn-success updateButton">Update</button>
                                                    </div>
                                                </form>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $(".updateForm").submit(function (e) {
                e.preventDefault();
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                let id = $("#idVal").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "general-information/update/" + id,
                    method: "POST",
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: new FormData(this),
                    success: function (data) {
                        var firstkey = Object.keys(data.datas)[0];
                        var fvalue = data.datas[firstkey];
                        console.log(data.datas[firstkey]);
                        if (firstkey == 'company_name') {
                            $("#cname").text(fvalue);
                            toastr.success('Company name updated successfully.');
                        } else if (firstkey == 'company_email') {
                            $("#cemail").text(fvalue);
                            toastr.success('Company email updated successfully.');
                        } else if (firstkey == 'company_address') {
                            $("#caddress").text(fvalue);
                            toastr.success('Company address updated successfully.');
                        } else if (firstkey == 'company_phone') {
                            $("#cphone").text(fvalue);
                            toastr.success('Company phone updated successfully.');
                        } else if (firstkey == 'company_phone1') {
                            $("#cphone1").text(fvalue);
                            toastr.success('Company phone updated successfully.');
                        } else if (firstkey == 'company_slogan') {
                            // $("#cslogan").text(fvalue);
                            toastr.success('Company slogan updated successfully.');
                        } else if (firstkey == 'company_logo') {
                            let newLogo = `<img src="{{asset('images/general/')}}/` + fvalue + `"
                        alt="" class="img-fluid d-block mx-auto">`;
                            $("#newLogoImage").html(newLogo);
                            toastr.success('Company logo updated successfully.');
                        } else if (firstkey == 'company_desc') {
                            toastr.success('Company description updated successfully.');
                        }

                    },
                });
            });
        });
    </script>
@endsection

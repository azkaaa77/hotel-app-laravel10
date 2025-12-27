<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title"><strong>Update Booking Kamar</strong></div>
                            <div class="block-body">
                                <form action="{{ url('update_booking', $data->id) }}" method="Post"
                                    enctype="multipart/form-data" class="form-horizontal">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Id Kamar</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="id" class="form-control"
                                                value="{{ $data->room_id }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ $data->nama }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $data->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Telepon</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="telepon" class="form-control"
                                                value="{{ $data->telepon }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Status</label>
                                        <div class="col-sm-9">
                                            <select name="status" class="form-control mb-3">
                                                <option selected value="{{ $data->status }}">{{ $data->status }}
                                                </option>
                                                <option value="Ready">Ready</option>
                                                <option value="Waiting">Waiting</option>
                                                <option value="Booked">Booked</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Tanggal Check in</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="check_in" class="form-control"
                                                value="{{ $data->check_in }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Tanggal Check Out</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="check_out" class="form-control"
                                                value="{{ $data->check_out }}">
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-9 ml-auto">
                                            <button type="submit" value="" class="btn btn-primary" <input
                                                type="file" name="gambar" class="form-control">Update
                                                Kamar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
            <!-- JavaScript files-->
            @include('admin.js')
</body>

</html>

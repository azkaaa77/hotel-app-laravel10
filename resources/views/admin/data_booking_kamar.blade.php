<!DOCTYPE html>

<head>
    @include('admin.css')
    <style>
        th {
            color: rgb(255, 255, 255);
        }
        .description-container {
            position: relative;
        }
        .description-summary {
            display: block;
        }
        .description-text {
            display: none;
            /* Sembunyikan teks lengkap secara default */
        }
        .read-more {
            display: block;
            color: rgb(205, 205, 216);
            cursor: pointer;
            text-decoration: underline;
        }
        .read-more.active {
            color: red;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var readMoreLinks = document.querySelectorAll('.read-more');
    
            readMoreLinks.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var container = this.parentElement;
                    var text = container.querySelector('.description-text');
                    var summary = container.querySelector('.description-summary');
    
                    if (text.style.display === 'none') {
                        text.style.display = 'block';
                        summary.style.display = 'none';
                        this.textContent = 'Read Less';
                    } else {
                        text.style.display = 'none';
                        summary.style.display = 'block';
                        this.textContent = 'Read More';
                    }
                });
            });
        });
    </script>
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <table class="table">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Room Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Status</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->room_id}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->telepon}}</td>
                            <td>{{$data->status}}</td>
                            <td>{{$data->check_in}}</td>
                            <td>{{$data->check_out}}</td>
                            <td>
                                <a class="btn btn-outline-warning" href="{{ url('halaman_update_booking', $data->id) }}">Update</a>
                            </td>
                            <td>
                                <a onclick="return confirm('Apakah Anda Ingin Menghapus Kamar?')" 
                                class="btn btn-outline-danger" href="{{url('delete_booking',$data->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    @include('admin.footer')
    @include('admin.js')
</body>
</html>
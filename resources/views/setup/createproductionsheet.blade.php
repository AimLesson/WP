@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Production Sheet</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('file') }}">File</a></li>
                            <li class="breadcrumb-item active">Add Production Sheet</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Production Sheet</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputNama">Order number</label>
                                        <input type="text" name="ordernumber" class="form-control" id="exampleInputName"
                                            placeholder="Order number" required>
                                        @error('name')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Customer</label>
                                        <input type="text" name="customer" class="form-control" id="exampleInputUsername"
                                            placeholder="Customer" required>
                                        @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Product</label>
                                        <input type="text" name="product" class="form-control" id="exampleInputEmail"
                                            placeholder="Product" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">SO No.</label>
                                        <input type="text" name="so_no" class="form-control"
                                            id="exampleInputPassword" placeholder="So No." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Date of Delivery</label>
                                        <input type="text" name="dod" class="form-control"
                                            id="exampleInputPassword" placeholder="Date of Delivery." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Assy drawing</label>
                                        <input type="text" name="assydrawing" class="form-control"
                                            id="exampleInputPassword" placeholder="Assy drawing" required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">PO (ref)</label>
                                        <input type="text" name="po(ref)" class="form-control"
                                            id="exampleInputPassword" placeholder="PO (ref)" required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">No of Product</label>
                                        <input type="text" name="no_prod" class="form-control"
                                            id="exampleInputPassword" placeholder="No of Product" required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Item Number</label>
                                        <input type="text" name="no_item" class="form-control"
                                            id="exampleInputPassword" placeholder="So No." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Drawing Number</label>
                                        <input type="text" name="so_no" class="form-control"
                                            id="exampleInputPassword" placeholder="So No." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Date Wanted</label>
                                        <input type="date" name="so_no" class="form-control"
                                            id="exampleInputPassword" placeholder="So No." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">No of Piece</label>
                                        <input type="text" name="so_no" class="form-control"
                                            id="exampleInputPassword" placeholder="So No." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Material</label>
                                        <input type="text" name="so_no" class="form-control"
                                            id="exampleInputPassword" placeholder="So No." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">No of blank</label>
                                        <input type="text" name="so_no" class="form-control"
                                            id="exampleInputPassword" placeholder="So No." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Weight</label>
                                        <input type="text" name="so_no" class="form-control"
                                            id="exampleInputPassword" placeholder="So No." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Blank Size</label>
                                        <input type="text" name="so_no" class="form-control"
                                            id="exampleInputPassword" placeholder="So No." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Item Name</label>
                                        <input type="text" name="so_no" class="form-control"
                                            id="exampleInputPassword" placeholder="So No." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Rack</label>
                                        <input type="text" name="so_no" class="form-control"
                                            id="exampleInputPassword" placeholder="So No." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Issued</label>
                                        <input type="text" name="so_no" class="form-control"
                                            id="exampleInputPassword" placeholder="So No." required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- Pastikan Anda telah menyertakan SweetAlert di proyek Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Fungsi untuk memeriksa apakah unit dan role telah dipilih
        function validateForm() {
            var unit = document.getElementById('exampleInputUnit').value;
            var role = document.getElementById('exampleInputRole').value;

            if (unit === 'pilihunit' || role === 'pilihrole') {
                alert('Silakan pilih Unit dan Role sebelum menambahkan pengguna!');
                return false; // Mencegah pengiriman formulir
            }

            return true; // Lanjutkan pengiriman formulir jika unit dan role telah dipilih
        }

        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Add Production Sheet');
    </script>
@endsection

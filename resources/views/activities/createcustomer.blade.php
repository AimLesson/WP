@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Customer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('file') }}">File</a></li>
                            <li class="breadcrumb-item active">Add Customer</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('activities.storecustomer') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Customer Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputCompany">Customer No.</label>
                                                <input type="text" name="customer_no" class="form-control"
                                                    id="exampleInputCompany" placeholder="Insert Customer No" value="{{ old('customer_no') }}"
                                                    oninput="this.value = this.value.toUpperCase()" required>
                                                @error('customer_no')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputCompany">Company</label>
                                                <input type="text" name="company" class="form-control"
                                                    id="exampleInputCompany" placeholder="Insert Company" value="{{ old('company') }}"
                                                    oninput="this.value = this.value.toUpperCase()" required>
                                                @error('company')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    id="exampleInputName" placeholder="Insert Name"
                                                    oninput="capitalizeName(this)" value="{{ old('name') }}" required>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputAddress">Address</label>
                                                <textarea name="address" class="form-control" id="exampleInputAddress" placeholder="Insert Address"
                                                    oninput="capitalizeName(this)" value="{{ old('address') }}" required></textarea>
                                                @error('address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputCity">City</label>
                                                <input type="text" name="city" class="form-control"
                                                    id="exampleInputCity" placeholder="Insert City" value="{{ old('city') }}"
                                                    oninput="capitalizeCity(this)">
                                                @error('city')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputCity">Province</label>
                                                <input type="text" name="province" class="form-control"
                                                    id="exampleInputCity" placeholder="Insert Province" value="{{ old('province') }}"
                                                    oninput="capitalizeCity(this)">
                                                @error('province')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputCity">Zip Code</label>
                                                <input type="text" name="zipcode" class="form-control"
                                                    id="exampleInputCity" placeholder="Insert Zip Code" value="{{ old('zipcode') }}"
                                                    oninput="capitalizeCity(this)">
                                                @error('zipcode')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputCity">Country</label>
                                                <input type="text" name="country" class="form-control"
                                                    id="exampleInputCity" placeholder="Insert country" value="{{ old('country') }}"
                                                    oninput="capitalizeCity(this)">
                                                @error('country')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPhone">Phone</label>
                                                <input type="text" name="phone" class="form-control"
                                                    id="exampleInputPhone" placeholder="Insert Phone" value="{{ old('phone') }}" required>
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFax">Fax</label>
                                                <input type="text" name="fax" class="form-control"
                                                    id="exampleInputFax" placeholder="Insert Fax" value="{{ old('fax') }}">
                                                @error('fax')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    id="exampleInputEmail" placeholder="Insert Email" value="{{ old('email') }}">
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputNPWP">NPWP</label>
                                                <input type="text" name="npwp" class="form-control"
                                                    id="exampleInputNPWP" placeholder="__.___.___._-___.___" value="{{ old('npwp') }}">
                                                @error('npwp')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputTaxAddress">Tax Address</label>
                                                <textarea name="tax_address" class="form-control" id="exampleInputTaxAddress" placeholder="Insert Tax Address"
                                                    oninput="capitalizeName(this)" required></textarea>
                                                @error('tax_address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputShipment">Shipment</label>
                                                <textarea name="shipment" class="form-control" id="exampleInputShipment" placeholder="Insert Shipment"
                                                    oninput="capitalizeName(this)"></textarea>
                                                @error('shipment')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputCity">Contact Person</label>
                                                <input type="text" name="cp" class="form-control"
                                                    id="exampleInputCity" placeholder="Insert Contact Person" value="{{ old('cp') }}"
                                                    oninput="capitalizeCity(this)">
                                                @error('cp')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputCity">Web Page</label>
                                                <input type="text" name="webpage" class="form-control"
                                                    id="exampleInputCity" placeholder="Insert webpage" value="{{ old('webpage') }}"
                                                    oninput="capitalizeCity(this)">
                                                @error('webpage')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-custom">Add Customer</button>
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
        // Fungsi ini mengonversi nama menjadi awal huruf kapital pada setiap kata
        function capitalizeName(input) {
            input.value = input.value.replace(/\w\S*/g, function(txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        }

        function capitalizeCity(input) {
            input.value = input.value.toUpperCase();
        }

        // Mendapatkan elemen input NPWP
        const npwpInput = document.getElementById("exampleInputNPWP");

        // Menambahkan event listener untuk memvalidasi input
        npwpInput.addEventListener("input", function() {
            // Hapus semua karakter non-digit dari input
            let npwpValue = npwpInput.value.replace(/\D/g, "");

            // Batasi input hanya menerima 15 digit angka
            if (npwpValue.length > 15) {
                npwpValue = npwpValue.slice(0, 15);
            }

            // Format input sesuai dengan "99.999.999.9-999.999"
            const formattedNPWP = npwpValue.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})/,
                "$1.$2.$3.$4-$5.$6");

            // Setel nilai input yang diformat
            npwpInput.value = formattedNPWP;
        });

        // Mendapatkan elemen input alamat (address)
        const addressInput = document.getElementById("exampleInputAddress");
        // Mendapatkan elemen input tax address
        const taxAddressInput = document.getElementById("exampleInputTaxAddress");
        // Mendapatkan elemen input shipment
        const shipmentInput = document.getElementById("exampleInputShipment");

        // Menambahkan event listener pada input alamat
        addressInput.addEventListener("input", function() {
            const addressValue = addressInput.value;

            // Menggunakan nilai alamat sebagai nilai awal untuk inputan tax address dan shipment
            taxAddressInput.value = addressValue;
            shipmentInput.value = addressValue;
        });

        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Add Customer');
    </script>
@endsection

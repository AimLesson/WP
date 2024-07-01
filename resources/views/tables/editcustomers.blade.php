@extends('tables.tables')
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
                            <li class="breadcrumb-item active">Edit Customer</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('tables.updatecustomers', ['id' => $customer->id]) }}" method="POST"
                    enctype="multipart/form-data" onsubmit="return validateForm();">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Customer Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="InputCustomerNo">Customer No.</label>
                                                <input type="text" name="customer_no" class="form-control"
                                                    id="InputCustomerNo" placeholder="Insert Customer No" required
                                                    value="{{ old('customer_no', $customer->customer_no) }}">
                                                @error('customer_no')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="CustomerName">Customer Name</label>
                                                <input type="text" name="customer_name" class="form-control"
                                                    id="InputCustomerName" placeholder="Insert Customer Name"
                                                    oninput="this.value = this.value.toUpperCase()" required
                                                    value="{{ old('customer_name', $customer->customer_name) }}">
                                                @error('customer_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="Address">Address</label>
                                                <textarea name="address" class="form-control" id="InputAddress" placeholder="Insert Address"
                                                    oninput="capitalizeName(this)" required>{{ old('address', $customer->address) }}</textarea>
                                                @error('address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="InputTaxAddress">Tax Address</label>
                                                <textarea name="tax_address" class="form-control" id="InputTaxAddress" placeholder="Insert Tax Address"
                                                    oninput="capitalizeName(this)" required>{{ old('tax_address', $customer->tax_address) }}</textarea>
                                                @error('tax_address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="InputCity">City</label>
                                                <input type="text" name="city" class="form-control" id="InputCity"
                                                    placeholder="Insert City" oninput="capitalizeName(this)" required
                                                    value="{{ old('city', $customer->city) }}">
                                                @error('city')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="InputProvince">Province</label>
                                                <input type="text" name="prov" class="form-control"
                                                    id="InputProvince" placeholder="Insert Province"
                                                    oninput="capitalizeName(this)"
                                                    value="{{ old('prov', $customer->prov) }}">
                                                @error('province')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="InputZipCode">Zip Code</label>
                                                <input type="text" name="zip" class="form-control" id="InputZipCode"
                                                    placeholder="Insert Zip Code" oninput="capitalizeName(this)"
                                                    value="{{ old('zip', $customer->zip) }}">
                                                @error('zip_code')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="InputCountry">Country</label>
                                                <input type="text" name="country" class="form-control" id="InputCountry"
                                                    placeholder="Insert Country" oninput="capitalizeName(this)"
                                                    value="Indonesia" required>
                                                @error('country')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="InputPhone">Phone</label>
                                                <input type="text" name="phone" class="form-control"
                                                    id="InputPhone" placeholder="Insert Phone" required
                                                    value="{{ old('phone', $customer->phone) }}">
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="InputFax">Fax</label>
                                                <input type="text" name="fax" class="form-control" id="InputFax"
                                                    placeholder="Insert Fax" value="{{ old('fax', $customer->fax) }}">
                                                @error('fax')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="InputContactPerson">Contact Person</label>
                                                <input type="text" name="contact_person" class="form-control"
                                                    id="InputContactPerson" placeholder="Insert Contact Person"
                                                    oninput="capitalizeName(this)" required
                                                    value="{{ old('contact_person', $customer->contact_person) }}">
                                                @error('contact_person')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="InputEmail">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    id="InputEmail" placeholder="Insert Email"
                                                    value="{{ old('email', $customer->email) }}">
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="InputWebPage">Web Page</label>
                                                <input type="text" name="web_page" class="form-control"
                                                    id="InputWebPage" placeholder="Insert Web Page"
                                                    value="{{ old('web_page', $customer->web_page) }}">
                                                @error('web_page')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Customer</button>
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

        // Mendapatkan elemen input alamat (address)
        const addressInput = document.getElementById("InputAddress");
        // Mendapatkan elemen input tax address
        const taxAddressInput = document.getElementById("InputTaxAddress");

        // Menambahkan event listener pada input alamat
        addressInput.addEventListener("input", function() {
            const addressValue = addressInput.value;

            // Menggunakan nilai alamat sebagai nilai awal untuk inputan tax address dan shipment
            taxAddressInput.value = addressValue;
        });

        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Edit Customer');
    </script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Input Barcode') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @php
                        $dbcode = DB::table('barcodes')->latest('created_at')->first();
                    @endphp

                    <form id="myForm" method="POST" action="{{ route('store_barcode') }}">
                        @csrf

                        <div class="row mb-1">
                            <label for="no_box" class="col-md-4 col-form-label text-md-end">{{ __('NO BOX') }}</label>

                            <div class="col-md-6">
                                <input id="no_box" type="number" class="input-field form-control @error('no_box') is-invalid @enderror" name="no_box" value="{{ empty($dbcode) ? 1 : $dbcode->no_box }}" required autocomplete="no_box">

                                @error('no_box')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-1">
                            <label for="no_bal" class="col-md-4 col-form-label text-md-end">{{ __('NO BAL') }}</label>

                            <div class="col-md-6">
                                <input id="no_bal" type="number" class="input-field form-control @error('no_bal') is-invalid @enderror" name="no_bal" value="{{ empty($dbcode) ? 1 : $dbcode->no_bal }}" required autocomplete="no_bal">

                                @error('no_bal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-1">
                            <label for="barcode" class="col-md-4 col-form-label text-md-end">{{ __('BARCODE') }}</label>

                            <div class="col-md-6">
                                <input id="barcode" type="text" class="input-field form-control @error('barcode') is-invalid @enderror" name="barcode" value="{{ old('barcode') }}" required autocomplete="barcode" autofocus>

                                @error('barcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submit-btn">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php
        $no = 1;
        $dbbarcode = DB::table('barcodes')->latest('created_at')->get();
    @endphp
    <div class="d-flex">
        <a href="" class="btn btn-success me-3">export</a>
        <a href="{{ route('preview') }}" class="btn btn-primary">preview</a>
    </div>
    <div class="table-container mt-1">
        <div class="table-wrapper">
          <table>
            <thead>
              <tr>
                <th style="width: 10px;">No</th>
                <th style="width: 10px;">Nama</th>
                <th style="width: 10px;">Lokasi</th>
                <th style="width: 60px;">No Box</th>
                <th style="width: 60px;">No Bal</th>
                <th style="width: 60px;">Barcode</th>
                <th style="width: 60px;">Kelompok</th>
                <th style="width: 60px;">No Kelompok</th>
                <th style="width: 60px;">Tgl Input</th>
              </tr>
            </thead>
            <tbody>
                @if ($dbbarcode->count() > 0)
                   @foreach ($dbbarcode as $barcode)
                   <tr>
                       <td style="width: 10px;">{{ $no++ }}</td>
                       <td style="width: 60px;">{{ $barcode->nama }}</td>
                       <td style="width: 60px;">{{ $barcode->lokasi }}</td>
                       <td style="width: 60px;">{{ $barcode->no_box }}</td>
                       <td style="width: 60px;">{{ $barcode->no_bal }}</td>
                       <td style="width: 60px;">{{ $barcode->barcode }}</td>
                       <td style="width: 60px;">{{ $barcode->kelompok }}</td>
                       <td style="width: 60px;">{{ $barcode->kelompokno }}</td>
                       <td style="width: 60px;">{{ $barcode->created_at }}</td>
                     </tr>
                   @endforeach
               @else
                     <tr>
                       tidak ada data
                     </tr>
               @endif
            </tbody>
          </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Mendapatkan referensi ke button yang ingin diklik secara otomatis
    const submitBtn = document.getElementById('submit-btn');

    // Mendapatkan referensi ke semua input field yang harus diisi
    const inputFields = document.querySelectorAll('.input-field');

    // Mengecek apakah semua input field sudah terisi
    function checkInputs() {
    let allFilled = true;

    inputFields.forEach(function(inputField) {
        if (inputField.value === '') {
        allFilled = false;
        }
    });

    return allFilled;
    }

    // Memeriksa input fields setiap kali input berubah
    inputFields.forEach(function(inputField) {
    inputField.addEventListener('input', function() {
        if (checkInputs()) {
        submitBtn.click(); // Mengklik button secara otomatis
        }
    });
    });
</script>
@endsection

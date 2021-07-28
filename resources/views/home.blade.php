@extends('layouts.master')

@section('content')
    <form method="POST">
        <input type="file" class="d-none" name="selected_file"/>

        <div class="form-group">
            <label>Choose File you want to encrypt/decrypt:</label>
            <input type="text" class="form-control d-inline-block mt-3" 
                placeholder="Select File ..." readonly />
        </div>
        <div class="row mt-3">
            <div class="col-md-6 col-6">
                <button class="btn-custom upload" data-url="files/encrypt">
                    Encrypt
                </button>
            </div>
            <div class="col-md-6 col-6">
                <button class="btn-custom upload" data-url="files/decrypt">
                    Decrypt
                </button>
            </div>
        </div>
    </form>

    <div class="row mx-0">
        <div class="col-md-4 mx-auto my-3 text-center">
            <p class="text-info message"></p>
            <a href="" class="btn-custom text-center d-none" id="download-button" download>
                Download Your File
            </a>
        </div>
    </div>
@endsection
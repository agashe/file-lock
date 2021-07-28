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
                <button class="btn-custom" data-url="files/encrypt">
                    Encrypt
                </button>
            </div>
            <div class="col-md-6 col-6">
                <button class="btn-custom" data-url="files/decrypt">
                    Decrypt
                </button>
            </div>
        </div>
    </form>
@endsection
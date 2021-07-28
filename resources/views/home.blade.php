@extends('layouts.master')

@section('content')
    <form>
        <!-- [The real form] -->
        <input type="file" class="d-none" name="selected_file"/>
        <input type="hidden"name="operation"/>

        <div class="form-group">
            <label>Choose File you want to encrypt/decrypt:</label>
            <input type="text" class="form-control d-inline-block w-75 mt-3" 
                placeholder="Select File ..." readonly />

            <button class="btn btn-primary">Submit</button>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 col-6">
                <button class="btn-custom">
                    Encrypt <i class="gg-check-o"></i>
                </button>
            </div>
            <div class="col-md-6 col-6">
                <button class="btn-custom">
                    Decrypt <i class="gg-check-o"></i>
                </button>
            </div>
        </div>
    </form>
@endsection
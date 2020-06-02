@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Success') }}</div>

                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                                <span>Your Registration Successfully</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

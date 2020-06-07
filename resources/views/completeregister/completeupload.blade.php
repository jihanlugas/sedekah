@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Success Upload</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('completeregistration.completeupload') }}">
                            <input type="hidden" value="{{ Auth::user()->id }}">
                            <div class="form-group text-center">
                                <label for="">Success, Anda sekarang Lv 5</label>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Oke</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

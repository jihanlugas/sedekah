@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Bukti</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('requested') }}">
                            @csrf
                            <div class="form-group">
                                <label>Bukti 1</label>
                                <input type="text" class="form-control @error('requested_by') is-invalid @enderror"
                                       placeholder="Upload Bukti 1" name="invitation_code"
                                       value="{{ old('invitation_code') }}" autofocus>
                                @error('invitation_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Bukti 1</label>
                                <input type="file" class="form-control-file @error('requested_by') is-invalid @enderror"
                                       placeholder="Upload Bukti 1" name="invitation_code"
                                       value="{{ old('invitation_code') }}" autofocus>
{{--                                <input type="text" class="form-control @error('requested_by') is-invalid @enderror"--}}
{{--                                       placeholder="Upload Bukti 1" name="invitation_code"--}}
{{--                                       value="{{ old('invitation_code') }}" autofocus>--}}
                                @error('invitation_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        {{--                        <div class="form-group row">--}}
                        {{--                            <label for="email" class="col-md-4 col-form-label text-md-right">Invitation Code</label>--}}

                        {{--                            <div class="col-md-6">--}}
                        {{--                                <input id="requested_by" type="requested_by" class="form-control @error('requested_by') is-invalid @enderror"--}}
                        {{--                                       name="requested_by" value="{{ old('requested_by') }}" required autofocus>--}}

                        {{--                                @error('requested_by')--}}
                        {{--                                <span class="invalid-feedback" role="alert">--}}
                        {{--                                        <strong>{{ $message }}</strong>--}}
                        {{--                                    </span>--}}
                        {{--                                @enderror--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

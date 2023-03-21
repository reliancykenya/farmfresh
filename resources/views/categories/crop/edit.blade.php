@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Crop</div>

                <div class="card-body">
                    <form method="POST" action="{{route('crop.update',$crop->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$crop->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>

                                </div>
                                
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="duration" class="col-md-4 col-form-label text-md-end">{{ __('Duration') }}</label>

                            <div class="col-md-6">
                                <input id="duration" type="number" class="form-control @error('duration') is-invalid @enderror" value="{{$crop->duration}}" name="duration">

                                @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="acerage" class="col-md-4 col-form-label text-md-end">{{ __('Acerage') }}</label>

                            <div class="col-md-6">
                                <input id="acerage" type="number" class="form-control @error('acerage') is-invalid @enderror" value="{{$crop->acerage}}" name="acerage" >

                                @error('acerage')
                                
                                   <div class="alert alert-danger">
                                   <strong>{{ $message }}</strong>
                                   </div>
                                
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="note" class="col-md-4 col-form-label text-md-end">Farmer's Notes</label>

                            <div class="col-md-6">
                                <textarea class="form-control form-control @error('note') is-invalid @enderror" name="note" id="note" rows="10">
                                {{$crop->name}}
                                </textarea>
                                @error('note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    update Crop
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
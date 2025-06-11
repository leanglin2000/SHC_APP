@extends('layout.app')
@section('title', 'tag edit')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="d-flex justify-content-between mb-2">
                <h3>Edit tag</h3>
                <a class="btn btn-success" href="{{ route('admin.tag.index') }}" role="button">Back</a>
            </div>
            <!-- Blog entries-->
            <div class="col-lg-12">
                <div class="card p-3">
                    <form method="post" action="{{ route('admin.tag.update', ['id' => $tag->id]) }}">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">tag</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $tag->name }}" />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
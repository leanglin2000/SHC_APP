@extends('layout.app')
@section('title', 'tag list')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="d-flex justify-content-between mb-2">
                <h3>tag List</h3>
                <a class="btn btn-success" href="{{ route('admin.tag.create') }}" role="button">Create</a>
            </div>
            <!-- Blog entries-->
            <div class="col-lg-12">
                <div class="card p-3">
                    <table id="datatable" class="table table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tag</th>
                                <th style="width: 25px">Edit</th>
                                <th style="width: 25px">Delete</th>
                            </tr>
                        </thead>    
                        <tbody>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.tag.edit', ['id' => $tag->id]) }}" role="button">Edit </a>

                                    </td>       
                                    <td>       
                                        <form method="post" action="{{ route('admin.tag.destroy', ['id' => $tag->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" role="button" type="submit">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tag</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
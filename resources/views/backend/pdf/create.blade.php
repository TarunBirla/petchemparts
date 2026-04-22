@extends('backend.layouts.master')
@section('main-content')

<div class="container-fluid">

    <h4 class="mb-3">Add PDF</h4>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('pdf.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>PDF Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter title" required>
                </div>

                <div class="form-group">
                    <label>Upload PDF</label>
                    <input type="file" name="file" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Save PDF</button>
                <a href="{{ route('pdf.index') }}" class="btn btn-secondary">Back</a>

            </form>

        </div>
    </div>

</div>

@endsection
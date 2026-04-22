@extends('backend.layouts.master')
@section('main-content')

<div class="container-fluid">

    <h4 class="mb-3">Edit PDF</h4>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('pdf.update',$pdf->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="form-group">
                    <label>PDF Title</label>
                    <input type="text" name="title" value="{{ $pdf->title }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Current File</label><br>
                    <a href="{{ asset($pdf->file) }}" target="_blank" class="btn btn-info btn-sm">
                        View Current PDF
                    </a>
                </div>

                <div class="form-group">
                    <label>Change PDF (optional)</label>
                    <input type="file" name="file" class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $pdf->status=='active'?'selected':'' }}>Active</option>
                        <option value="inactive" {{ $pdf->status=='inactive'?'selected':'' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update PDF</button>
                <a href="{{ route('pdf.index') }}" class="btn btn-secondary">Back</a>

            </form>

        </div>
    </div>

</div>

@endsection
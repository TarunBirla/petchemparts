@extends('backend.layouts.master')
@section('main-content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h4>PDF List</h4>
        <a href="{{ route('pdf.create') }}" class="btn btn-primary">+ Add PDF</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>File</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pdfs as $key => $pdf)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $pdf->title }}</td>
                        <td>
                            <a href="{{ asset($pdf->file) }}" target="_blank" class="btn btn-sm btn-info">
                                View PDF
                            </a>
                        </td>
                        <td>
                            <span class="badge badge-{{ $pdf->status == 'active' ? 'success' : 'danger' }}">
                                {{ ucfirst($pdf->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('pdf.edit',$pdf->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('pdf.destroy',$pdf->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this PDF?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if($pdfs->count()==0)
                        <tr>
                            <td colspan="5" class="text-center">No PDF Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
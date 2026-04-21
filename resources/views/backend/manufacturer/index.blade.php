@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3  mt-20">
        <h4>Manufacturers</h4>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addManufacturer">
            + Add Manufacturer
        </button>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($manufacturers as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m->name }}</td>
                    <td>{{ $m->phone ?? '-' }}</td>
                    <td>
                        <span class="badge badge-{{ $m->status=='active' ? 'success':'danger' }}">
                            {{ ucfirst($m->status) }}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-info"
                                data-toggle="modal"
                                data-target="#editManufacturer{{ $m->id }}">
                            Edit
                        </button>

                        <form action="{{ route('manufacturer.destroy',$m->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this manufacturer?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>

                {{-- EDIT MODAL --}}
                <div class="modal fade" id="editManufacturer{{ $m->id }}">
                    <div class="modal-dialog">
                        <form method="POST"
                              action="{{ route('manufacturer.update',$m->id) }}">
                            @csrf @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5>Edit Manufacturer</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <input name="name" class="form-control mb-2"
                                           value="{{ $m->name }}" required>

                                    <input name="email" class="form-control mb-2"
                                           value="{{ $m->email }}">

                                    <input name="phone" class="form-control mb-2"
                                           value="{{ $m->phone }}">

                                    <textarea name="address" class="form-control mb-2">{{ $m->address }}</textarea>

                                    <select name="status" class="form-control">
                                        <option value="active" {{ $m->status=='active'?'selected':'' }}>Active</option>
                                        <option value="inactive" {{ $m->status=='inactive'?'selected':'' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @empty
                <tr>
                    <td colspan="5" class="text-center">No Manufacturers Found</td>
                </tr>
                @endforelse
                </tbody>
            </table>



           
           
        </div>
    </div>
</div>

{{-- ADD MODAL --}}
<div class="modal fade" id="addManufacturer">
    <div class="modal-dialog">
        <form action="{{ route('manufacturer.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add Manufacturer</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input name="name" class="form-control mb-2" placeholder="Name" required>
                    <input name="email" class="form-control mb-2" placeholder="Email">
                    <input name="phone" class="form-control mb-2" placeholder="Phone">
                    <textarea name="address" class="form-control mb-2" placeholder="Address"></textarea>
                    <select name="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

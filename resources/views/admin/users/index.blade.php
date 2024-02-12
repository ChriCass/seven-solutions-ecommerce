@extends('admin.layouts.top', ['useViteAssets' => true])

@section('content')
    {{-- Display success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Create a New Course?</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">

                    <li class="ms-auto"> <a name="" id="" class="btn btn-success"
                            href="{{ url('/admin/courses/create') }}" role="button">Create</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">Courses</h3>
                    <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                        <select class="form-select shadow-none row border-top">
                            <option>March 2021</option>
                            <option>April 2021</option>
                            <option>May 2021</option>
                            <option>June 2021</option>
                            <option>July 2021</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">first name </th>
                                <th class="border-top-0">last name</th>
                                <th class="border-top-0">email </th>
                                <th class="border-top-0">role </th>
                                <th class="border-top-0">password </th>
                                <th class="border-top-0">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="{{ $user->role == 'admin' ? 'text-warning fw-bold' : 'text-info' }}">
                                        {{ $user->role }}
                                    </td>
                                    <td><strong>encripted</strong></td>
                            
                                    
                                    <td class="d-flex">
                                        <!-- Botón de editar -->
                                        <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" class="btn btn-warning text-light">
                                            Edit
                                        </a>
                                        <!-- Botón de borrar -->
                                        <form action="{{ url('/admin/users/' . $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-3">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
       
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
@endsection

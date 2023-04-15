<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @if(session()->has('errormsg'))
            <div class="alert alert-danger">
                {{ session()->get('errormsg') }}
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <form action="{{ url('add_employee')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                      <label for="first_name" class="form-label">First Name</label>
                                      <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name')}}">
                                      @error('first_name')
                                        <div style="color:red;">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name')}}">
                                        @error('last_name')
                                          <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                      </div>
                                      <div class="mb-3">
                                        <label for="company" class="form-label">Company Id</label>
                                        <input type="text" class="form-control" id="company" name="company" value="{{ old('company')}}">
                                        @error('company')
                                          <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                      </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Id</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
                                        @error('email')
                                        <div style="color:red;">{{ $message }}</div>
                                      @enderror
                                      </div>
                                      <div class="mb-3">
                                        <label for="phone" class="form-label">Phone No</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone')}}">
                                        @error('phone')
                                        <div style="color:red;">{{ $message }}</div>
                                      @enderror
                                      </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Company Id</th>
                                        <th>Email Id</th>
                                        <th>Phone No</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee as $item)
                                        <tr>
                                            <td>{{$item->first_name}}</td>
                                            <td>{{$item->last_name}}</td>
                                            <td>{{$item->company}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>
                                                <a href="{{ url('edit-employee/'.$item->id)}}" class="btn btn-success">Edit</a>
                                                <form action="{{ url('delete-employee/'.$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $employee->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
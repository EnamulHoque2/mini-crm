<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session()->has('errormessage'))
            <div class="alert alert-danger">
                {{ session()->get('errormessage') }}
            </div>
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <form action="{{ url('add_company')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                      <label for="name" class="form-label">Name</label>
                                      <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
                                      @error('name')
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
                                        <label for="logo" class="form-label">Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo">
                                        @error('logo')
                                        <div style="color:red;">{{ $message }}</div>
                                      @enderror
                                      </div>
                                      <div class="mb-3">
                                        <label for="website" class="form-label">Website Name</label>
                                        <input type="text" class="form-control" id="website" name="website" value="{{ old('website')}}">
                                        @error('website')
                                        <div style="color:red;">{{ $message }}</div>
                                      @enderror
                                      </div>
                                    
                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email Id</th>
                                        <th>Logo</th>
                                        <th>Website</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($company as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            
                                            <td><img src="{{ asset('/storage/'.$item->logo)}}" alt=""></td>
                                            <td>{{$item->website}}</td>
                                            <td>
                                                <a href="{{ url('edit-company/'.$item->id)}}" class="btn btn-success">Edit</a>
                                                <form action="{{ url('delete-company/'.$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                
                                            </td>
                                        
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $company->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
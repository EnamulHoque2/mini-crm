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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card">
                                <form action="{{ url('update_company/'.$company->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                      <label for="name" class="form-label">Name</label>
                                      <input type="text" class="form-control" id="name" name="name" value="{{$company->name}}">
                                      @error('name')
                                        <div style="color:red;">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Id</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{$company->email}}">
                                        @error('email')
                                        <div style="color:red;">{{ $message }}</div>
                                      @enderror
                                      </div>
                                      <div class="mb-3">
                                        <label for="logo" class="form-label">Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo" value="">
                                        <img src="{{ asset('/storage/'.$company->logo)}}" alt="" width="150px" height="100px">
                                        @error('logo')
                                        <div style="color:red;">{{ $message }}</div>
                                      @enderror
                                      </div>
                                      <div class="mb-3">
                                        <label for="website" class="form-label">Website Name</label>
                                        <input type="text" class="form-control" id="website" name="website" value="{{$company->website}}">
                                        @error('website')
                                        <div style="color:red;">{{ $message }}</div>
                                      @enderror
                                      </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
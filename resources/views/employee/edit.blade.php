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
                        <div class="col-md-8">
                            <div class="card">
                                <form action="{{ url('update_employee/'.$employee->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                      <label for="first_name" class="form-label">First Name</label>
                                      <input type="text" class="form-control" id="first_name" name="first_name" value="{{$employee->first_name}}">
                                      @error('first_name')
                                        <div style="color:red;">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$employee->last_name}}">
                                        @error('last_name')
                                          <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                      </div>
                                      <div class="mb-3">
                                        <label for="company" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="company" name="company" value="{{$employee->company}}">
                                        @error('company')
                                          <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                      </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Id</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{$employee->email}}">
                                        @error('email')
                                        <div style="color:red;">{{ $message }}</div>
                                      @enderror
                                      </div>
                                      <div class="mb-3">
                                        <label for="phone" class="form-label">Phone No</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}">
                                        @error('phone')
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
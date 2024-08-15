<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
<div class="container mb-4">
    <div class="row mt-3 pt-4">
        <div class="col-lg-12">
             <h1 class=" h4 border-bottom border-dark-subtle">Create User</h1>
        </div>
    </div>
    <div class="row mt-2 mb-4">
        <div class="col-lg-12">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"  name="name" class="form-control" required>
                    @error('name')
                        <div class="mt-3 mb-3 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required>
                    @error('email')
                        <div class="mt-3 mb-3 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                        <div class="mt-3 mb-3 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                    @error('password_confirmation')
                        <div class="mt-3 mb-3 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="mt-3 mb-3 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Create</button> 
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>

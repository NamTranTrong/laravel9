@extends('layouts.admin')

@section('content')
    @include('partials.content-header',['name' => 'Category','key' => 'Edit'])
    <div class="content">
        <div class="container">
            <form method="POST" action="">
                @csrf
                <div class="form-group">
                  <label>Enter Name</label>
                  <input class="form-control" name="name" placeholder="Ex: Quần, Áo, Nón,...">
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
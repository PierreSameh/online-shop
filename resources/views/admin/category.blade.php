@extends('layouts.admin.dashboard')

@section("content")
<div class="main-panel">
    <div class="content-wrapper">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @elseif (session()->has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('success')}}
            </div>
        @endif
        <div style="text-align:center;padding:40px 0;">
        <h1>Add Category</h1>
            <div style="display:flex;justify-content: center;margin:30px">
            <form action="{{route('category.store')}}" method="POST"
             style="width:50%;">
                @csrf
                <input type="text" name="category_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                 style="color:#FFFFFF;">
                 <button type="submit" class="btn btn-success" style="padding:10px;margin-top:20px;">Add Category</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
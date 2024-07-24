@extends('layouts.admin.dashboard')

@section("content")
        {{-- Show Validation Errors for non-accepted entry --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        {{-- When Category Added to DB --}}
        @elseif (session()->has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('success')}}
            </div>
        @elseif (session()->has('delete'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('delete')}}
            </div>
        @endif
        {{-- Category Add Form --}}
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
        {{-- Show DB Categories in Table --}}
        <div style="display: flex;align-items: center;justify-content: center;">
            <table style="width: 50%;
            border-collapse: collapse;
            color: #FFFFFF;">
                <thead>
                    <tr>
                        <th style="12px 15px;text-align: center;border: 2px solid #ddd;padding:8px;">Category</th>
                        <th style="12px 15px;text-align: center;border: 2px solid #ddd;padding:8px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td style="8px 10px;text-align: center;border: 1px solid #ddd;padding:8px;">
                            {{$category->category_name}}
                        </td>
                        <td style="8px 10px;text-align: center;border: 1px solid #ddd;padding:8px;">
                            <form action="{{route('category.delete', $category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                 <button type="submit" class="btn btn-danger"
                                  onclick="return confirm('Are You Sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
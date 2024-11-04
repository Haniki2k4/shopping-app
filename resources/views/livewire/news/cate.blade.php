@extends('layouts.app')

@section('heading', 'Quản lý Chuyên Mục')
@section('content')
<div class="container-fluid">
  <div class="app-content-header"> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Category
                    </li>
                </ol>
            </div>
        </div> 
    </div> 
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách Chuyên Mục</h3>
        </div> 
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th style="width: 120px">Created By</th>
                        <th style="width: 160px">Modified Date</th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($categories))
                @foreach($categories as $index => $item)
                    <tr class="align-middle">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['title']}}</td>
                        <td>{{ $item['description']}}</td>
                        <td><span class="badge text-bg-danger">{{ $item['created_by']}}</span></td>
                        <td><span class="badge text-bg-primary">{{ $item['updated_at']}}</span></td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div> <!-- /.card-body -->
      </div>
    </div>
  </div>  
</div>
@endsection
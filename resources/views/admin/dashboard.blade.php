@extends('admin.layouts.master')

@section('title')

CRM_and_Store

@endsection

@section('content')

{{-- <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Simple Table</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=@extends('layouts.master') --}}

              
              
             
              
              <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title"> Admin Users</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead class=" text-primary">
                              <th> Name </th>
                              <th>  Email  </th>
                              <th>  Update</th>
                              <th > Delete </th>
                            </thead>
                            <tbody>
                              
                                @foreach ($users as $user)
                                    
                                <tr>
                                <td> {{ $user->name }}</td>
                                <td>   {{ $user->email }}  </td>
                                <td>   <a class="btn btn-danger" href="/admin/{{ $user->id }}/edit">Edit</a></td>
                                <td> <a class="btn btn-danger" href="/admin/{{ $user->id }}/deleteadmin">delete</a> </td>
                              </tr>
                                @endforeach
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              @endsection
              
              @section('scripts')
              
              
              @endsection
              
             





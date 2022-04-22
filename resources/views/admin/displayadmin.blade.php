@extends('layouts.master')

@section('title')

Registered roles

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Register Role</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th> Name </th>
                <th>  Email  </th>
                <th> EDIT </th>
                <th > DELETE </th>
              </thead>
              <tbody>
                <tr>
                  <td> name</td>
                  <td>   email@gmail.com </td>
                  {{-- <td>  Dakota Rice</td> --}}
                  <td> 
                      <a href="#" class="btn btn-success">EDIT</a>
                  </td>
                  <td> 
                        <a href="#" class="btn btn-success">DELETE</a>
                </td>
                  
                </tr>
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





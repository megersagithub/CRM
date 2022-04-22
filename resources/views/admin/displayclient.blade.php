@extends('admin.layouts.master')

@section('title')

Store Client list

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Store Client list </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th> Name </th>
                <th>  Email  </th>
                <th> Created at </th>
              </thead>
              <tbody>
                @foreach ($users as $user)
                    <tr>
                  <td> {{$user->name}}</td>
                  <td>  {{$user->email}} </td>
                  {{-- <td>  Dakota Rice</td> --}}
                  <td> 
                      {{$user->created_at}}
                  </td> 
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





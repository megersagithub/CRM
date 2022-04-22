@extends('client.layouts.master')

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
                        <h4 class="card-title"> Product List</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead class=" text-primary">
                              <th> Product Name </th>
                              <th>  Description  </th>
                              <th>  Category</th>
                              <th > Quantity </th>
                              <th > Price </th>

                            </thead>
                            <tbody>
                          @if(count($products)>0)
                            @foreach ($products as $product)
                              <tr>
                                <td> {{$product->name}}</td>
                                <td>   {{$product->description}} </td>
                                <td>  {{$product->category}}</td>
                                <td> {{$product->quantity}}</td>
                                <td> {{$product->price_per_unit}}</td>
                              </tr>
                              @endforeach
                              @else
                                  <h1>no product found</h1>
                              @endif
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
              
             





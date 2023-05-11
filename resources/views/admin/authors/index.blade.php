@extends('layouts/contentNavbarLayout')

@section('title', 'Royal Apps | Authors')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Authors List<button
  onclick="window.location = '{{url('gfadmin/authors/create')}}'" type="submit" class="btn btn-dark "
  style="float:right">Create </button></h4>
<!--  Basic Bootstrap Table -->
<div class="card">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    <div class="table-responsive text-nowrap">
         <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthday</th>
                    <th>Gender</th>
                    <th>Place Of Birth</th>
                    <th>Action</th>
                  </tr>
             </thead>
            <tbody class="table-border-bottom-0">
              <?php
              if (empty($data['items'])) { ?>
              <tr><td colspan="5" style="text-align: center;"> Oopps! No Data Found!</td></tr>
              <?php
              }else{ ?>
                @foreach($data['items'] as $value)
                <tr>
                    <td>{{$value['id']}}</td>
                    <td>{{$value['first_name']}}</td>
                    <td>{{$value['last_name']}}</td>
                    <td>{{ \Carbon\Carbon::parse($value['birthday'])->format('Y-m-d') }}</td>
                    <td>{{$value['gender']}}</td>
                    <td>{{$value['place_of_birth']}}</td>
                    <td>
                      <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                              data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                          <div class="dropdown-menu">

                              <a class="dropdown-item" href="{{url('gfadmin/authors/view-author/').'/'.$value['id']}}"><i
                                      class="bx bx-show me-1"></i>
                                  View</a>
                              <a class="dropdown-item" href="{{url('gfadmin/authors/destroy/').'/'.$value['id']}}"><i class="bx bx-trash me-1"></i>
                                  Delete</a>
                          </div>
                      </div>
                  </td>
                </tr>
                @endforeach
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!--/ Basic Bootstrap Table -->

@endsection

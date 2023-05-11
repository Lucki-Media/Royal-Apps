@extends('layouts/contentNavbarLayout')

@section('title', 'Royal Apps | Books')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Books List<button
  onclick="window.location = '{{url('gfadmin/books/create')}}'" type="submit" class="btn btn-dark "
  style="float:right">Create </button></h4>

<!--  Basic Bootstrap Table -->
<div class="card">
    <div class="table-responsive text-nowrap">
         <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Release Date</th>
                    <th>isbn</th>
                </tr>
             </thead>
            <tbody class="table-border-bottom-0">
              <?php
              if (empty($data)) { ?>
              <tr><td colspan="5" style="text-align: center;"> Oopps! No Data Found!</td></tr>
              <?php
              }else{ ?>
                @foreach($data['items'] as $value)
                <tr>
                    <td>{{$value['id']}}</td>
                    <td>{{$value['title']}}</td>
                    <td>{{ \Carbon\Carbon::parse($value['release_date'])->format('Y-m-d') }}</td>
                    <td>{{$value['isbn']}}</td>
                </tr>
                @endforeach
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!--/ Basic Bootstrap Table -->

@endsection

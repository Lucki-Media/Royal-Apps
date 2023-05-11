@extends('layouts/contentNavbarLayout')

@section('title', 'Royal Apps | View Author')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Author / </span> View<button
  onclick="window.location = '{{url('gfadmin/authors')}}'" type="submit" class="btn btn-dark "
  style="float:right">Back </button>
</h4>
  <div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12 col-12 mb-md-0 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="col-lg-12">
              <div class="demo-inline-spacing mt-3">
                <ul class="list-group">
                  <li class="list-group-item d-flex align-items-center">
                    <i class="bx bx-rename me-2"></i>
                     Name : {{$data['name']}}
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                    <i class="bx bxs-calendar me-2"></i>
                    Birth Date : {{$data['birthday']}}
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                    <i class="bx bxl-wikipedia me-2"></i>
                    Biography : {{$data['biography']}}
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                    <i class="bx bx-user me-2"></i>
                    Gender : {{$data['gender']}}
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                    <i class="bx bxs-map-pin me-2"></i>
                    Place Of Birth : {{$data['place_of_birth']}}
                  </li>
                </ul>
              </div>
              <h5 class="card-header-books"><i class="bx bxs-book me-2"></i>My Books</h5>
              <div class="table-responsive text-nowrap">
                <table class="table">
                   <thead>
                       <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Release Date</th>
                          <th>isbn</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                   <tbody class="table-border-bottom-0">
                     <?php
                     if (empty($data['books'])) { ?>
                     <tr><td colspan="5" style="text-align: center;"> Oopps! No Data Found!</td></tr>
                     <?php
                     }else{ ?>
                       @foreach($data['books'] as $book)
                       <tr>
                           <td>{{$book['id']}}</td>
                           <td>{{$book['title']}}</td>
                           <td>{{\Carbon\Carbon::parse($book['release_date'])->format('Y-m-d')}}</td>
                           <td>{{$book['isbn']}}</td>
                           <td>
                            <a class="dropdown-item" href="{{url('gfadmin/books/destroy/'.$data['id'].'/'.$book['id'])}}"><i class="bx bx-trash me-1"></i>
                            </a>
                          </td>
                       </tr>
                       @endforeach
                       <?php } ?>
                   </tbody>
               </table>
           </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

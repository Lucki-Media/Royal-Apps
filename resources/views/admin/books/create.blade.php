@extends('layouts/contentNavbarLayout')

@section('title', 'Royal Apps | Add Book')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Create / </span>Book<button
  onclick="window.location = '{{url('gfadmin/books')}}'" type="submit" class="btn btn-dark "
  style="float:right">Back </button></h4>

<!-- Basic Layout -->
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">

                <!-- <small class="text-muted float-end">Merged input group</small> -->
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{url('gfadmin/books/add-book')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Select Author</label>
                      <select name="author_id" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option value="" selected>Please select author</option>
                        @foreach($data['items'] as $value)
                          <option  value="{{ $value['id'] }}">{{ $value['first_name'] . ' ' . $value['last_name'] }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Title</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-heading"></i></span>
                            <input type="text" class="form-control" name="title" id="basic-icon-default-fullname"
                                placeholder="Please enter Title" aria-label="John Doe"
                                aria-describedby="basic-icon-default-fullname2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Description</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bxs-info-circle"></i></span>
                            <input type="text" id="basic-icon-default-company" class="form-control" name="description"
                                placeholder="Please enter Description" aria-label="ACME Inc."
                                aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-company">Release Date</label>
                      <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text"><i class='bx bxs-calendar'></i></span>
                          <input type="date" id="basic-icon-default-company" class="form-control" placeholder="Release Date"
                              name="release_date" aria-describedby="basic-icon-default-company2" />
                      </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">ISBN</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bxs-book"></i></span>
                            <input type="text" id="basic-icon-default-company" class="form-control" name="isbn"
                                placeholder="Please add ISBN" aria-label="ACME Inc."
                                aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Format</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bxs-file-txt"></i></span>
                            <input type="text" id="basic-icon-default-company" class="form-control" name="format"
                                placeholder="Please add Format" aria-label="ACME Inc."
                                aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Number Of Pages</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-first-page"></i></span>
                            <input type="text" id="basic-icon-default-company" class="form-control" name="number_of_pages"
                                placeholder="Please add Number Of Pages" aria-label="ACME Inc."
                                aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

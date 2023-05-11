@extends('layouts/contentNavbarLayout')

@section('title', 'Royal Apps | Add Author')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Create / </span>Author<button
  onclick="window.location = '{{url('gfadmin/authors')}}'" type="submit" class="btn btn-dark "
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
                <form action="{{url('gfadmin/authors/add-author')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">First Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-rename"></i></span>
                            <input type="text" class="form-control" name="first_name" id="basic-icon-default-fullname"
                                placeholder="Please enter First Name" aria-label="John Doe"
                                aria-describedby="basic-icon-default-fullname2" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Last Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-rename"></i></span>
                            <input type="text" id="basic-icon-default-company" class="form-control" name="last_name"
                                placeholder="Please enter Last Name" aria-label="ACME Inc."
                                aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-company">Birthday</label>
                      <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text"><i class='bx bxs-calendar'></i></span>
                          <input type="date" id="basic-icon-default-company" class="form-control" placeholder="Expiry Date"
                              name="birthday" aria-describedby="basic-icon-default-company2" />
                      </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Biography</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bxl-wikipedia"></i></span>
                            <input type="text" id="basic-icon-default-company" class="form-control" name="biography"
                                placeholder="Please add Biography" aria-label="ACME Inc."
                                aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-company">Gender</label>

                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" value="male" id="defaultRadio1"
                          checked  />
                          <label class="form-check-label" for="defaultRadio1">
                              Male
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" value="female" id="defaultRadio2"
                              />
                          <label class="form-check-label" for="defaultRadio2">
                              Female
                          </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="other" id="defaultRadio3"
                            />
                        <label class="form-check-label" for="defaultRadio3">
                            Other
                        </label>
                    </div>
                  </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Place Of Birth</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bxs-map-pin"></i></span>
                            <input type="text" id="basic-icon-default-company" class="form-control" name="place_of_birth"
                                placeholder="Please enter Place of Birth" aria-label="ACME Inc."
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

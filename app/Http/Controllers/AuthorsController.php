<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Carbon\Carbon;

class AuthorsController extends Controller
{
  public function index(){
    $token_data = User::first();
    $url = "https://symfony-skeleton.q-tests.com/api/v2/authors?orderBy=id&direction=DESC&limit=100";
    $data = self::getCurlWithToken($url,$token_data['token_key']);
    return view('admin.authors.index')->with('data', $data);
  }

  public function viewAuthor($authorId){
    $token_data = User::first();
    $authors_url = "https://symfony-skeleton.q-tests.com/api/v2/authors/".$authorId;
    $data = self::getCurlWithToken($authors_url,$token_data['token_key']);
    $final_data = [];
    $final_data = [
      'id'              => $data['id'],
      'name'            => $data['first_name'].' '.$data['last_name'],
      'birthday'        => \Carbon\Carbon::parse($data['birthday'])->format('d, M Y'),
      'biography'       => $data['biography'],
      'place_of_birth'  => $data['place_of_birth'],
      'gender'          => ucwords($data['gender']),
      'books'           => $data['books'],
    ];
    return view('admin.authors.show')->with('data', $final_data);
  }

  public function create(){
    return view('admin.authors.create');
  }

  public function addAuthor(Request $request){
    $token_data = User::first();
    $url = "https://symfony-skeleton.q-tests.com/api/v2/authors";
    $request->validate([
      'first_name'      => 'required',
      'last_name'       => 'required',
      'birthday'       => 'required',
      'biography'       => 'required',
      'place_of_birth'  => 'required',
    ], [
        'first_name.required'       => 'First Name field is required.',
        'last_name.required'        => 'Last Name field is required.',
        'birthday.required'         => 'Birth Date field is required.',
        'biography.required'        => 'Biography field is required.',
        'place_of_birth.required'   => 'Place Of Birth field is required.',
    ]);
    $data = array();
    $data = [
      'first_name'      => $request->first_name,
      'last_name'       => $request->last_name,
      'birthday'        => \Carbon\Carbon::parse($request->birthday)->format('Y-m-d\TH:i:s.v\Z'),
      'biography'       => $request->biography,
      'place_of_birth'  => $request->place_of_birth,
      'gender'          => $request->gender,
    ];
    $data_string = json_encode($data);
    $authors_data = self::postCurlWithToken($data_string,$url,$token_data['token_key']);
    return redirect(route('gfadmin.authors-index'))->with('success',"Author created successfully!");
  }

  public function destroy($authorId){
    $token_data = User::first();
    $authors_url = "https://symfony-skeleton.q-tests.com/api/v2/authors/".$authorId;

    $authors_data = self::getCurlWithToken($authors_url,$token_data['token_key']);
    // echo '<pre>';print_r($authors_data);exit;
    if(!empty($authors_data['books'])){
      return redirect(route('gfadmin.authors-index'))->with('error',"You can't delete this author!");
    }
    $author_delete = self::deleteCurlWithToken($authors_url,$token_data['token_key']);
    return redirect(route('gfadmin.authors-index'))->with('success',"Author deleted successfully!");
  }
}
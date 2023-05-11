<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Carbon\Carbon;

class BooksController extends Controller
{
  public function index(){
    $token_data = User::first();
    $url = "https://symfony-skeleton.q-tests.com/api/v2/books?orderBy=id&direction=ASC&limit=100";

    $data = self::getCurlWithToken($url,$token_data['token_key']);
          // echo '<pre>';print_r($data);exit;

    return view('admin.books.index')->with('data', $data);
  }

  public function create(){
    $token_data = User::first();
    $url = "https://symfony-skeleton.q-tests.com/api/v2/authors?orderBy=id&direction=DESC&limit=100";
    $data = self::getCurlWithToken($url,$token_data['token_key']);
    return view('admin.books.create')->with('data', $data);
  }

  public function addBook(Request $request){
    $token_data = User::first();
    $url = "https://symfony-skeleton.q-tests.com/api/v2/books";
    $request->validate([
      'author_id'         => 'required',
      'title'             => 'required',
      'description'       => 'required',
      'release_date'      => 'required',
      'isbn'              => 'required',
      'number_of_pages'   => 'required|numeric',
      'format'            => 'required',
    ], [
        'author_id.required'        => 'Please select Author.',
        'title.required'            => 'Title field is required.',
        'description.required'      => 'Description field is required.',
        'release_date.required'     => 'Release Date field is required.',
        'isbn.required'             => 'ISBN field is required.',
        'number_of_pages.required'  => 'Number Of Pages field is required.',
        'format.required'           => 'Format field is required.',
    ]);
    $data = array();
    $data = [
      'author'            => [ 'id'  =>  intval($request->author_id) ],
      'title'             => $request->title,
      'description'       => $request->description,
      'release_date'      => \Carbon\Carbon::parse($request->release_date)->format('Y-m-d\TH:i:s.v\Z'),
      'isbn'              => $request->isbn,
      'number_of_pages'   => intval($request->number_of_pages),
      'format'            => $request->format,
    ];
    $data_string = json_encode($data);
    $books_data = self::postCurlWithToken($data_string,$url,$token_data['token_key']);
    // echo '<pre>';print_r($books_data);exit;
    return redirect(route('gfadmin.books-index'))->with('success',"Book created successfully!");
  }

  public function destroy($authorId,$bookId){
    $token_data = User::first();
    $books_url = "https://symfony-skeleton.q-tests.com/api/v2/books/".$bookId;

    $book_delete = self::deleteCurlWithToken($books_url,$token_data['token_key']);
    return redirect(url('gfadmin/authors/view-author/'.$authorId))->with('success',"Book deleted successfully!");
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function postCurl($data_string,$urlPost){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
      $url = $urlPost;
      // echo '<pre>';print_r($url);exit;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
      $server_output = curl_exec($ch);
      $response = json_decode($server_output,true);
      return $response;
    }

    public static function postCurlWithToken($data_string,$urlPost,$token){
      $authorization = "Authorization: Bearer ".$token;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
      curl_setopt($ch, CURLOPT_URL,$urlPost);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type:application/json',
      $authorization));
      $server_output = curl_exec($ch);
      $response = json_decode($server_output,true);
      return $response;
    }

    public static function getCurlWithToken($urlGet,$token){
      $authorization = "Authorization: Bearer ".$token;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
      // echo '<pre>';print_r($url);exit;
      curl_setopt($ch, CURLOPT_URL,$urlGet);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER,array(
        'Content-Type:application/json',
		    $authorization));
      $server_output = curl_exec($ch);
      $response = json_decode($server_output,true);
      return $response;
    }

    public static function deleteCurlWithToken($urlGet,$token){
      $authorization = "Authorization: Bearer ".$token;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
      // echo '<pre>';print_r($url);exit;
      curl_setopt($ch, CURLOPT_URL,$urlGet);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER,array(
        'Content-Type:application/json',
		    $authorization));
      $server_output = curl_exec($ch);
      $response = json_decode($server_output,true);
      return $response;
    }
}

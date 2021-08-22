<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;

class MediaController extends Controller
{
  private static $file_types;

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index( Request $request )
  {
    //
    if( $request->get( 'type' ) ){
      if( $request->get( 'type' ) === 'other' ) {
        $media = Media::where( 'type', 'other' )->orWhere( 'type', null )->get();
      } else {
        $media = Media::where( 'type', $request->get( 'type' ) )->get();
      }
      $media = $media->sortByDesc( 'id' )->values()->toArray();
      return response()->json( $media, 200, [], JSON_UNESCAPED_UNICODE);
    }
    return response()->json( Media::all()->sortByDesc( 'id' )->values()->toArray(), 200, [], JSON_UNESCAPED_UNICODE);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store( Request $request )
  {
    //
//      return  response()->json( $request->get('files') );
    /**
     * @var \Illuminate\Http\UploadedFile[] $files
     */
    $_files = $request->file( 'files' );
    $res = [];
    $files = [];

    foreach ( $_files as $file ) {
      $files[] = $file;

    }

    foreach ( $files as $file ) {
      $media = new Media();
      $media->title = $file->getClientOriginalName();
      $media->media_type = $file->getClientMimeType();
      $media->author = Auth::user()->id;
      $media->type = self::getTypeForFile( $file );
      File::ensureDirectoryExists( 'app/media/' .  date("Y") . '/' .  date("m" ), 0775 );
      $media->filename =  $file->storeAs( 'media/' .  date("Y") . '/' .  date("m" ) ,
        Str::random(40) . '.' . $file->getClientOriginalExtension(),
        ['disk' => 'public'] );

      if ($file->getClientOriginalExtension() == "heic") {
        $media->title = explode('.', $file->getClientOriginalName())[0] . '.jpg';
        $media->media_type = "image/jpeg";
        $media->author = Auth::user()->id;
        $media->type = "image";
        $media->filename = self::storeHeicToJpeg( $file );
      }

      $path = Storage::path( 'public/' . $media->filename );
      $ext = pathinfo( $path, PATHINFO_EXTENSION );
      if( $ext === 'svg' ){
        $svg = file_get_contents( $path );
        $svg = simplexml_load_string( $svg );
        $media->width = ( string ) data_get( $svg->attributes(), 'width', 150 );
        $media->height = ( string ) data_get( $svg->attributes(), 'height', 150 );
      } else {
        $size = getimagesize( $path );
        $media->width = data_get( $size, '0', 0 );
        $media->height = data_get( $size, '1', 0 );
      }

      $media->main_color = getMainColor( $path );
      $media->url =  Storage::url( $media->filename );
      $media->save();
      $res[] = $media;
    }
    $res = array_reverse( $res );
    return response()->json( $res, 200, [], JSON_UNESCAPED_UNICODE);

  }
  /**
   * Store a newly created resource in storage. From front-app
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store_from_frontend( Request $request )
  {

    /**
     * @var \Illuminate\Http\UploadedFile[] $files
     */
    $_files = $request->file( 'files' );
    $res = [];
    $files = [];

    foreach ( $_files as $file ) {
      $files[] = $file;
    }

    foreach ( $files as $file ) {
      $media = new Media();
      $media->title = $file->getClientOriginalName();
      $media->media_type = $file->getClientMimeType();
      if(Auth::user()){
        $media->author = Auth::user()->id;
      } else {
        $media->guest_token = $request->session()->token();
      }
      $media->type = self::getTypeForFile( $file );
      File::ensureDirectoryExists( 'app/media/' .  date("Y") . '/' .  date("m" ), 0775 );
      $media->filename =  $file->storeAs( 'media/' .  date("Y") . '/' .  date("m" ) ,
        Str::random(40) . '.' . $file->getClientOriginalExtension(),
        ['disk' => 'public'] );

      if ($file->getClientOriginalExtension() == "heic") {
        $media->title = explode('.', $file->getClientOriginalName())[0] . '.jpg';
        $media->media_type = "image/jpeg";
        $media->author = Auth::user()->id;
        $media->type = "image";
        $media->filename = self::storeHeicToJpeg( $file );
      }

      $path = Storage::path( 'public/' . $media->filename );
      $ext = pathinfo( $path, PATHINFO_EXTENSION );
      if( $ext === 'svg' ){
        $svg = file_get_contents( $path );
        $svg = simplexml_load_string( $svg );
        $media->width = ( string ) data_get( $svg->attributes(), 'width', 150 );
        $media->height = ( string ) data_get( $svg->attributes(), 'height', 150 );
      } else {
        $size = getimagesize( $path );
        $media->width = data_get( $size, '0', 0 );
        $media->height = data_get( $size, '1', 0 );
      }

      $media->main_color = getMainColor( $path );
      $media->url =  Storage::url( $media->filename );
      $media->save();
      $res[] = $media;
    }
    $res = array_reverse( $res );
    return response()->json( $res, 200, [], JSON_UNESCAPED_UNICODE);

  }

  /**
   * Display the specified resource.
   *
   * @param Media $media
   * @return \Illuminate\Http\Response
   */
  public function show( $id, Media $media )
  {
    //
    $media = $media->find( $id );
    return response()->json( $media->toArray() );

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit( $id, Request $request )
  {
    //
    $media = Media::find( $id );

    if( ! $media ){
      return response()->json( ['success' => false,], 404, [], JSON_UNESCAPED_UNICODE);
    }
    $media->fill( $request->all() );
    $media->save();
    return response()->json( ['success' => true,], 200, [], JSON_UNESCAPED_UNICODE);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function update( Request $request, $id )
  {
    //
    $media = Media::find( $id );
    if( ! $media ){
      return response()->json( ['success' => false,], 404, [], JSON_UNESCAPED_UNICODE);
    }
    $media->fill( $request->all() );
    $media->save();
    return response()->json( ['success' => true,], 200, [], JSON_UNESCAPED_UNICODE);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Media $media
   * @param string $id
   * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
   * @throws \Exception
   */
  public function destroy( Media $media, $id )
  {
    //
    $media = $media->find($id);

    if( ! $media ){
      return response()->json( ['success' => false, 'message'=> 'Media not found' ], 404 );
    }
    if( Storage::delete( 'public/' . $media->filename ) ){
      if( $media->delete() ){
        return response()->json( ['success' => true] );
      }
      return response()->json( ['success' => false, 'message'=> 'Error deleting media' ], 500 );
    }
    return response()->json( ['success' => false, 'message'=> 'Error deleting file' ], 500 );
  }

  /**
   * Remove the specified resource from storage. From front-app
   *
   * @param Media $media
   * @param string $id
   * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
   * @throws \Exception
   */
  public function destroy_from_frontend( Media $media, $id )
  {
    /**
     * @var Media $media
     */
    $media = $media->find($id);
    if( ! $media ){
      return response()->json( ['success' => false, 'message'=> 'Media not found' ], 404 );
    }
    $user = Auth::user();
    if( ! $user && session()->token() !== $media->guest_token ){
      return response()->json( ['success' => false, 'message'=> 'Not Access to deleting media' ], 403 );
    }
    if( $user && ! $user->hasRole( 'admin' ) && $user->id !== $media->author ){
      return response()->json( ['success' => false, 'message'=> 'Not Access to deleting media' ], 403 );
    }
    if( Storage::delete( 'public/' . $media->filename ) ){
      if( $media->delete() ){
        return response()->json( ['success' => true] );
      }
      return response()->json( ['success' => false, 'message'=> 'Error deleting media' ], 500 );
    }
    return response()->json( ['success' => false, 'message'=> 'Error deleting file' ], 500 );
  }

  /**
   * Получить тип файла для сохранения в БД
   * @param \Illuminate\Http\UploadedFile $file
   * @return string
   */
  public static function getTypeForFile( $file ){
    $extension_loaded = $file->getClientOriginalExtension();

    $type = '';
    $file_types = self::getFileTypes();
    foreach ( $file_types as $file_type ){
      if( ( ! $type ) &&  array_search($extension_loaded, $file_type['extensions'] ) !== false ){
        $type = $file_type['name'];
      }
    }
    if( ! $type ){
      $type = 'other';
    }
    return $type;
  }

  /**
   * @return []
   */
  public static function getFileTypes(){
    if( ! self::$file_types ){
      $file_types = file_get_contents( base_path( 'config/file-types.json' ) );
      $file_types = json_decode( $file_types, true);
      self::$file_types = $file_types;
    }
    return  self::$file_types;
  }

  /**
   * Converting and store HEIC file to JPG
   * @param \Illuminate\Http\UploadedFile $file
   * @return string
   */
  public static function storeHeicToJpeg( $file ){

    ImageManagerStatic::configure(["driver" => "imagick"]);

    $source = $file->getRealPath();

    $image = new \Imagick($source);
    $image->setImageFormat("jpeg");
    $image->setImageCompressionQuality(100);

    $store_directory = storage_path('app/public/media') . '/' .  date("Y") . '/' .  date("m") . '/';
    $filename = Str::random(40) . ".jpg";

    $image->writeImage($store_directory . $filename);

    $media_filename = '/media/' .  date("Y") . '/' .  date("m") . '/' . $filename;

    return $media_filename;
  }
}

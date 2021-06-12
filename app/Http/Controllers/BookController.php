<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response; 
use Illuminate\Http\Request; 
// use App\Models\User;
use App\Traits\ApiResponser; 
use DB;
use App\Services\BooksService;


Class BookController extends Controller {

 use ApiResponser;

 /**
 * The service to consume the User1 Microservice
 * @var User1Service
 */

public $BooksService;

 /**
 * Create a new controller instance
 * @return void
 */

public function __construct(BooksService $BooksService){

 $this->BooksService =  $BooksService;
   
 }

 public function index()
 {

 return $this->successResponse($this->BooksService->obtainBooks()); 

 }


 
 public function add(Request $request ){

   return $this->successResponse(

      $this->BooksService->createBooks($request->all(), Response::HTTP_CREATED)

      );
   }

  public function show($id)
 {
 return $this->successResponse($this->BooksService->obtainBook($id));
 
 }

 public function update(Request $request,$id){

   return $this->successResponse($this->BooksService->editBooks($request->all(), $id));
   
  }
  

  public function delete($id){
   
   return $this->successResponse($this->BooksService->deleteBooks($id));
   
 }



}
?>
 
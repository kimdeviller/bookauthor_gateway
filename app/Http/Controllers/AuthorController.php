<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response; 
use Illuminate\Http\Request; 
// use App\Models\User;
use App\Traits\ApiResponser; 
use DB;
use App\Services\AuthorsService;


Class AuthorController extends Controller {

 use ApiResponser;

 /**
 * The service to consume the User1 Microservice
 * @var User1Service
 */

public $AuthorsService;

 /**
 * Create a new controller instance
 * @return void
 */

public function __construct(AuthorsService $AuthorsService){

 $this->AuthorsService =  $AuthorsService;
   
 }

 public function index()
 {

 return $this->successResponse($this->AuthorsService->obtainAuthors()); 

 }


 
 public function add(Request $request ){

   return $this->successResponse(

      $this->AuthorsService->createAuthors($request->all(), Response::HTTP_CREATED)

      );
   }

  public function show($id)
 {
 return $this->successResponse($this->AuthorsService->obtainAuthor($id));
 
 }

 public function update(Request $request,$id){

   return $this->successResponse($this->AuthorsService->editAuthors($request->all(), $id));
   
  }
  

  public function delete($id){
   
   return $this->successResponse($this->AuthorsService->deleteAuthors($id));
   
 }



}
?>
 
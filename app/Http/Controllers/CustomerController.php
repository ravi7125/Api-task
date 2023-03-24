<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//one to one perform
use App\Models\Mobile;
use App\Models\Customer;
//one to many perform
use App\Models\Author;
use App\Models\Post;
//has one through perform
use App\Models\Car;
use App\Models\Owner;
use App\Models\Mechanic;
//Many to Many perform
use App\Models\Song;
use App\Models\Singer;

class CustomerController extends Controller
{
    // insert data in data table relationship
   public function add_customer(){
     $mobile = new Mobile();
     $mobile->model = "lg200";

     $customer = new Customer();
     $customer->name ='sonu';
     $customer->email = 'sonu@zignuts.com';
     $customer->save();
//mobile to save customer to mobile save because customer rela.... 
     $customer->mobile()->save($mobile);  

   }
   // save data retrive to mobile base
   public function show_mobile($id){
    $mobile = Customer::find($id)->mobile;
    return $mobile;
   }


//<-----------------one to many perform ----------------->
 
public function add_author(){
  $author = new Author();
  $author->username ='jay patel';
  $author->password = '411321';
  $author->save();
}
//add to post
public function add_post($id){
  $author = Author::find($id);
  $post = new Post();
  $post->title = "title 2";
  $post->cat ='cat 2';
  $author->post()->save($post);
}
 //get data  post based on authe id .

 public function show_post($id){
    $post = Author::find($id)->post;
    return $post;
 }

 //get data author base on post id

 public function show_author($id){
  $author = Post::find($id)->author;
  return $author;
 }
 //<---------Has one through Relationship-------->

//insert mechanic...

 public function add_mechanic(){
  $mechanic = new Mechanic();
  $mechanic->name ='ravi patel';
  $mechanic->save();
 }

 // insert car
public function add_car($id){
  $mechanic = Mechanic::find($id);
  $car = new Car();
  $car->model = 'i20';
  $mechanic->car()->save($car);
 }

 //insert owner
 public function add_owner($id){
  $car = Car::find($id);
  $owner = new Owner();
  $owner->name = 'sonu';
  $car->owner()->save($owner);
 }

// get owner based on mecchanic id 
public function show_owner($id){
   $owner = Mechanic::find($id)->car->owner;
   return $owner;
   }

 //<--------- Many to Many Relationship-------->
   
//Insert SONG
    public function add_song(){ 
      $song = new Song();
      $song->title = 'hello';
      $song->save();
     }
      //Insert Singer

      public function add_singer(){ 
        $singer = new Singer();
        $singer->name = 'toni';
        $singer->save();

        $songids = [1 ,2];
        $singer->songs()->attach( $songids );
       }
      
       //get song based on singer id
       public function show_song($id){
        $song = Singer::find($id)->song;
        return $song;
        }
    
      //get singer based on song id
     public function show_singer($id){
      $singer = Song::find($id)->singers;
      return $singer;
      }
}
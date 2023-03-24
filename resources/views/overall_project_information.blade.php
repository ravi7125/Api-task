*Learning to Api

youtube link learning Api : https://youtu.be/UIjBbc7Z0nI

how to get data in database

method:- 
post: this method is used save to data in database
get: this method is used only get data 

* create a database in env file
ex:->
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=usersystem
DB_USERNAME=root
DB_PASSWORD=ztlab147

* your database any insert data table name to same name model create in your project
  ex:- php artisan make:model Accounts  

* after create a controller and import to controller in move_uploaded_file
  ex:-php artisan make:controller Devicecontroller
  class Devicecontroller extends Controller

  {
 // get data in accounts tables in data base api
    function list(){
        return Accounts::all();
    }
}

* next step to create a route and import tocontroller name. 
  import ex:-use App\Http\Controllers\Devicecontroller;
  create route:-Route::get("list",[Devicecontroller::class,'list']);

  run to server and after call api  
  ex:http://127.0.0.1:8000/api/routename/

  step 2

  id throw show to data in data table 

  *sem as first create controller, model,and route

  controller:
   this cmd type

  public function iddata($id){
        return Accounts::Find($id);
    }

route:-Route::get("iddata/{id}",[Devicecontroller::class,'iddata']);

call to post man url:-http://127.0.0.1:8000/api/iddata/1
(1- is a id and iddata is route name)

step 3
 
 any id check function
 sem as all create step 1

 controller:- 

 public function data($id = null){
        return $id?Accounts::find($id):Account::all();
    }

   *route:-Route::get("data/{id?}",[Devicecontroller::class,'data']);
   * call to post man url:-http://127.0.0.1:8000/api/data/1


   #######post method :- how to data save in database

   how to data story in data base  
   
     1>open to post man application 
     2>select to post method 
     3>select to body after select row and then after select text in json.
     4>then after check to data base name after database table name show to table field and enter 
       post men field .(enter to insert table name and table field)
     5>insert to controller query and create route,,,,
     
    step 4  search to name throw data in database....... 

    controller:- 
    // name throw search data  in data base
    function search($bankname)
    {
       return Accounts::where("bankname",$bankname)->get();
    }

    info:(search is function name)
    info:($bankname is data show bank name)
    info:(account is table and model name) 
    info:("bankname", $bankname...it is a show data name enter)

    route:
    // Name throw search data in data base
    Route::get("searchdata/{bankname}",[Devicecontroller::class,'search']);

    * call to post man url:-http://127.0.0.1:8000/api/searchdata/bob
    (search is route name and after show data name)


    step 5 

    delete data in database:


    controller: 

    function delete($id){
        $account = Accounts::find($id);
        $result = $account->delete();
  
        if($result){
            return["return"=>"data hase been delete"];
           
        }else{
            return["return"=>"data not delete"];
           
        }
    }
    info: ($id -> it is a select to user id)
    info: (Accounts it is modeland data base table name)
    info: ($result is only pass tp notifiation show ...)

    *then after create to route
    Route::delete("delete/{id}",[Devicecontroller::class,'Delete']);
  * postman url create : http://127.0.0.1:8000/api/delete/1
  * Then after show your database table your id is deleted Sucessfully done...

  #validation in Api............  

  controller:- 

step 6 ...
  //Validation create.....
    function validation(Request $req){
     $rules = array(
        "bankname"=>"required"
     );
     $validator = Validator::make($req->all().$rules);
   if($validator->fails()){
   return response()->jason($validator->error() , 401);
   }else{

    return ["data"=> "correct"];
  
   }
 
  }    


  then after create a route:
  Route:
  //validation route........
   Route::post("validate",[Devicecontroller::class,'validation']);

   how to right in Postman url
   Example: http://127.0.0.1:8000/api/validate
   
   step 7 ... 

   Resources api  


   this is all of completed created in controller function..... 

   show to client controller and used to only 1 rpute create all work function ...   
   it is a best option in api .......   

  *Api Authntication in sanctum...... 

  *This link all step in Authntication :- https://github.com/anil-sidhu/laravel-sanctum 
  *//THIS IS A STEP BY STEP SHOW YOUTUBE VIDEO THEN AFTER SUCCESSFULL AUTHANTICATION COMPLITED.... 
  
  YOUTUBE LINK:- https://youtu.be/_2-8LaT4inA
  
  start to step (1) database connection

  step 8
 
  *<--------------------Eqlivelante relashionship--------------------->

Learning to youtube link:- https://youtu.be/mQT8BLEZaWA

  *learning to relashionship in web link :- https://laraveljsonapi.io/docs/1.0/schemas/relationships.html 
   * one to one relashionship... 

   -> first of all create a models and controller this vs cmd.
     ex:php artisan make:model Customer -mc

   ->second model and controller create sem as ... 
     ex:php artisan make:model Mobile -mc
   ->after create a migration file.... 
      . customers table to relashionship mobiles table .... 
    -> create a customers table...  
    ex:  $table->id();
            $table->string('name');
            $table->string('email');
            $table->timestamps();
    ->create a mobile table..... 
    Schema::create('mobiles', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->timestamps();
          //how to create a forgin key 
          $table->unsignedBigInteger('customer_id');
          $table->foreign('customer_id')->references('id')->on('customers');
        });    
  this table information ..... 
      forgin create first of all create colum ..this type. 
     * $table->unsignedBigInteger('customer_id');
                   next
      create foreign key... this type...             
     
      $table->foreign('customer_id')->references('id')->on('customers');
  => info:('customer_id') is a table colome name
  =>info: ref..table id 
  =>info:('customers')->this is a table name

  #after completed model work in customer 

  class Customer extends Model
{
    use HasFactory;
    public function mobile(){
        return $this->hasone(Mobile::class);
    }
}
info: mobile->this name is jeni jode relashionshop bannanu hoy te 
info: (Mobile::class)-> this is a model name and class  

#after insert data in controller throw.... 
 
customercontroller open.. 
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
     *create a route:- 
     //relashionship.........route(customercontroller)
      Route::get("add_customer",[CustomerController::class,'add_customer']);

   ## how to retrive save data in dtabase table .....(customercontroller)
   // save data retrive to mobile base
   public function show_mobile($id){
    $mobile = Customer::find($id)->mobile;
    return $mobile;
   }
   *create a route:- 
   // save data show route ... 
    Route::get("show_mobile/{id}",[CustomerController::class,'show_mobile']); 

    <--------------------ONE TO MANY------------------> 

    Syntex:- hasmany(Model_class,'foreign_key','local_key')

    create a model and controller database 
    this cmd:- php artisan make:model Author -mc
    same as second create 
    create a model and controller database 
    this cmd:- php artisan make:model Post -mc
    => first of all create a migration file 

    <-------------author migration--------------->
       
    Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');

            $table->timestamps();
        });
        <-------------post migration--------------->

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cat');
            $table->timestamps();
            //create a foreign key
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('authors');
        });


<-------------- create model auther-------------->

       public function post(){
       return $this->hasmany(post::class);
    }

    #after create model (Author.php)..... 
    public function post(){
       return $this->hasmany(post::class);
    }

    #after create model (post.php)..... 
    public function author(){
        return $this->belongsTo(Author::class);
    }


    #create controller data inter (customercontroller)
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


  <--------------Has one through relationship-------------->
     show to all data in customercontroller and three model owner,mechanics,car all information has one through

 
 
   <------------------------------------------------laravel Authntication--------------------------------------------->

   step by step youtube link :Laravel Default Authentication | Laravel Default Login | What Authentication Does Laravel Use | Auth 
                             : https://www.youtube.com/watch?v=pECM8AN4TCQ
step 1 :project cmd enter this cmd :-> composer require laravel/ui
step 2 :after completed insert this cmd :-> php artisan ui vue --auth      
step 3 :next insert this cmd :-> npm install && npm run dev   
step 4 : php artisan serve 

setup is completed...... 

<------------------------------------------laravel mail notification ------------------------------------>

youtube link : https://youtu.be/ZWzH6SOzjhI


step 1:first step is open to mailtrap..
step 2:mail trape create account after then select to laravel 7 then after code is copy and set to env project file mail lines   
step 3:add to line is registation controller    

        # iMPORT THIS LINE IS REGISTATION CONTROLLER...... 

        -> use App\Notifications\WelcomeEmailNotification;
<---NEXT STEP IS -->     
        Registation controller add to same as.......
        
        {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->notify(new WelcomeEmailNotification());

        return $user;
    }
}
after project terminal past cmd..... 
step 4 : php artisan make:notification WelcomeEmailNotification

done notification ..... 

<----------------------job and queue----------------------->


step by step youtube link:-> https://youtu.be/M-jEtrOtI3o


<----------------------Middleware----------------------->

 global middleware youtube link:- https://youtu.be/PAYF4mvb2Ws
 route middleware youtube link:- https://youtu.be/GFl9treG81g
 step 1  php artisan make:middleware webGuard   
 
 then after inser to middleware/kernal.php file .....(group middleware)  
 ->\App\Http\Middleware\webGuard::class

 thene after project terminal insert this cmd ....  
 ->php artisan config:cache 

 next step ...... created file (webguard.php) inser this condition....  


 public function handle(Request $request, Closure $next): Response
    
 {
      if($request->age <18){
            echo "YOU ARE NOT ALLOW TO ACCESS THE PAGE";
            die;
        }
        return $next($request);
    }
  




 
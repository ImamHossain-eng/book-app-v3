<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Feedback;
use App\Models\Type;
use App\Models\Book;
use App\Models\Varsity;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Account;
use App\Models\Recharge;
use App\Models\Post;


use Image;
use File;
use Auth;


class BackController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    //manage admins
    public function admin_index(){
        if(Auth::user()->id == 1){
            $users = User::orderBy('created_at', 'desc')->where('is_admin', 1)->paginate(10);
            return view('admin.super.admins', compact('users'));
        }else{
            return redirect()->route('admin.route')->with('error', 'You are not the Super Admin');
        }
    }
    public function admin_create(){
        if(Auth::user()->id == 1){
            return view('admin.super.admin_create');
        }else{
            return redirect()->route('admin.route')->with('error', 'You are not the Super Admin');
        }
    }
    public function admin_store(Request $request){
        if(Auth::user()->id == 1){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);
            $pass = $request->input('password');
            $password = Hash::make($pass);
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $password;
            $user->is_admin = 1;
            $user->save();
            return redirect()->route('admin.admin_index')->with('success', 'Successfully Created new Admin');
        }else{
            return redirect()->route('admin.route')->with('error', 'You are not the Super Admin');
        }
    }
    public function varsity_index(){
        $varsities = Varsity::latest()->get();
        return view('admin.super.varsity_index', compact('varsities'));
    }
    public function varsity_create(){
        return view('admin.super.varsity_create');
    }
    public function varsity_store(Request $request){
        $this->validate($request, [
            'name'=>'required|max:191',
            'address'=>'required|max:191',
            'contact'=>'required|max:11'
        ]);
        Varsity::create($request->all());
        return redirect()->route('admin.varsity_index')->with('success', 'Successfully Created');
    }
    public function varsity_edit($id){
        $varsity = Varsity::find($id);
        return view('admin.super.varsity_edit', compact('varsity'));
    }
    public function varsity_update(Request $request, $id){
        $varsity = Varsity::find($id);
        $varsity->name = $request->input('name');
        $varsity->address = $request->input('address');
        $varsity->contact = $request->input('contact');
        $varsity->save();
        return redirect()->route('admin.varsity_index')->with('warning', 'Successfully Updated');
    }
    public function varsity_destroy($id){
        Varsity::find($id)->delete();
        return redirect()->route('admin.varsity_index')->with('error', 'Successfully Removed');

    }
    public function admin_edit($id){
        if(Auth::user()->id == 1){
            $user = User::find($id);
            return view('admin.super.admin_edit', compact('user'));
        }else{
            return redirect()->route('admin.route')->with('error', 'You are not the Super Admin');
        }
    }
    public function admin_update(Request $request, $id){
        if(Auth::user()->id == 1){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required'
            ]);
            $password = $request->input('password');
            if($password != ''){
                $pass = Hash::make($password);
            }else{
                $pass = $request->input('pass');
            }
            $user = User::find($id);
            $oldType = $user->is_admin;
            $newType = $request->input('is_admin');
            if($newType != 'null'){
                $type = $newType;
            }else{
                $type = $oldType;
            }
            
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $pass;
            $user->is_admin = $type;
            $user->save();
            return redirect()->route('admin.admin_index')->with('success', 'Successfully Created new Admin');
        }else{
            return redirect()->route('admin.route')->with('error', 'You are not the Super Admin');
        }
        
    }
    public function admin_destroy($id){
        $user = User::find($id);
        if($user->id !== 1){
            $user->delete();
            return redirect()->route('admin.admin_index')->with('error', 'Removed Done');
        }else{
            return redirect()->route('admin.admin_index')->with('error', 'You are master admin.');
        }
    }
    //User SHow
    public function user_index(){
        $users = User::where('is_admin', null)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.super.users', compact('users'));
    }
    public function user_destroy($id){
        $user = User::find($id);
        if($user->is_admin !== 1){
            $books = Book::where('user', $id)->get();
            foreach($books as $book){
                if($book->user == $user->id){
                    $book->delete();
                }
            }
            $posts = $user->posts;
            foreach($posts as $post){
                $post->delete();
            }
            $user->delete();
            return redirect()->route('admin.user_index')->with('error', 'Removed Done');
        }else{
            return redirect()->route('admin.user_index')->with('error', 'Failed User type admin.');
        }
    }
    public function user_edit($id){
        $user = User::find($id);
        return view('admin.super.user_edit', compact('user'));
    }
    public function user_update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        //validation of user types
        $user = User::find($id);
        $newConf = $request->input('config');
        $oldConf = $user->config;
        if($newConf !== 'null'){
            $conf = $newConf;
        }else{
            $conf = $oldConf;
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->config = $conf;
        $user->save();
        return redirect()->route('admin.user_index')->with('warning', 'Successfully Updated');

    }
    
    //Books Request
    
   
   
    public function feedback_index(){
        $feedbacks = Feedback::all();
        //return $feedbacks;
        return view('admin.feedback_index', compact('feedbacks'));
    }
    public function feedback_destroy($id){
        Feedback::find($id)->delete();
        return redirect()->route('admin.feedback')->with('error', 'Removed Successfully');
    }
    public function feedback_show($id){
        $feedback = Feedback::find($id);
        return view('admin.feedback_show', compact('feedback'));
    }

    //Book Category start from here
    public function book_type(){
        $types = Type::all();
        return view('admin.book_type', compact('types'));
    }
    public function type_create(){
        return view('admin.type_create');
    }
    public function type_store(Request $request, Type $type){
        $this->validate($request, [
            'type' => 'required'
        ]);
        Type::create($request->all());
        return redirect()->route('admin.book_type')->with('success', 'Successfully Created');
    }
    public function type_destroy($id){
        Type::find($id)->delete();
        return redirect()->route('admin.book_type')->with('error', 'One Record Removed');
    }
    public function book_index(){
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.book.index', compact('books'));
    }
    public function book_create(){
        $types = Type::all();
        return view('admin.book.create', compact('types'));
    }
    public function book_store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'number' => 'required|max:11|min:10'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(700, 400)->save(public_path('/contents/images/book/'.$file_name));
        }else{
            $file_name = 'no_image.png';
        }
        $book = new Book;
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->price = $request->input('price');
        $book->number = $request->input('number');
        $book->category = $request->input('category');
        $book->description = $request->input('description');
        $book->image = $file_name;
        $book->varsity = 0;
        $book->user = Auth::user()->id;
        $book->confirmed = 1;
        $book->save();
        return redirect()->route('admin.book_index')->with('success', 'Successfully Created');
    }
    public function book_destroy($id){
        $book = Book::find($id);
        $oldImg = $book->image;
        if($oldImg != 'no_image.png'){
            File::delete(public_path('/contents/images/book/'.$oldImg));
        }
        $book->delete();
        return redirect()->route('admin.book_index')->with('error', 'Removed');
    }
    public function book_edit($id){
        $book = Book::find($id);
        $types = Type::all();
        //return [$book, $type];
        return view('admin.book.edit', compact('book', 'types'));
    }
    public function book_update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'confirmed' => 'required',
            'number' => 'required|max:11|min:10'
        ]);
        
        //validation for new book
        $book = Book::find($id);
        $oldImg = $book->image;
        $oldType = $book->category;
        $newType = $request->input('category');
        if($newType !== 'null'){
            $type = $newType;
        }else{
            $type = $oldType;
        }
        
        //Confirmed validation 
        $conf = $request->input('confirmed');
        $oldConf = $book->confirmed;
        if($conf !== 'null'){
            $confirm = $conf;
        }else{
            $confirm = $oldConf;
        }
        //image validation
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(700, 400)->save(public_path('/contents/images/book/'.$file_name));
            if($oldImg != 'no_image.png'){
                File::delete(public_path('/contents/images/book/'.$oldImg));
            }
        }else{
            $file_name = $oldImg;
        }

        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->price = $request->input('price');
        $book->description = $request->input('description');
        $book->category = $type;
        $book->image = $file_name;
        $book->confirmed = $confirm;
        $book->save();
        return redirect()->route('admin.book_index')->with('warning', 'Successfully Updated');
    }
    public function book_show($id){
        $book = Book::find($id);
        return view('admin.book.show', compact('book'));
    }
    public function post_index(){
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('admin.super.post_index', compact('posts'));
    }
    public function post_show($id){
        $post = Post::find($id);
        return view('admin.super.post_show', compact('post'));
    }
    public function post_destroy($id){
        Post::find($id)->delete();
        return redirect()->route('admin.post_index')->with('error', 'Removed a post successfully');
    }
}

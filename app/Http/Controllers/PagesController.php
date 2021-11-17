<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Feedback;
use App\Models\Book;
use App\Models\Type;
use App\Models\User;
use App\Models\Varsity;
use App\Models\Post;


use Auth;

class PagesController extends Controller
{
    public function user_register(){
        $varsities = Varsity::all();
        return view('auth.register', compact('varsities'));
    }
    public function user_post(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $varsity = $request->input('varsity');
        if($varsity != 'null'){
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->varsity = $varsity;
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect()->route('login')->with('success', 'Successfully Registered');
        }else{
            return redirect()->route('registration')->with('error', 'You did not select your University');
        }

    }
    public function index(){
        $boks = Book::orderby('created_at', 'desc')->where('confirmed', true)->get();
        $books = Book::orderby('created_at', 'desc')->where('confirmed', true)->take(3)->get();
        return view('pages.homepage', compact('boks', 'books'));
    }
    public function contact(){
        return view('visitor.contact');
    }
    public function feedback(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);
        $feedback = new Feedback;
        $feedback->name = $request->input('name');
        $feedback->email = $request->input('email');
        $feedback->phone = $request->input('phone');
        $feedback->message = $request->input('message');
        $feedback->save();
        return redirect()->route('homepage')->with('success', 'Successfully sent the Message');
    }
    public function book_show($id){
        $book = Book::find($id);
        if(Auth::check()){
            if(Auth::user()->is_admin == 1){
                return view('admin.book.show', compact('book'));
                
            }else{
                return view('user.book_show', compact('book'));
            }

        }else{
            return view('visitor.book_show', compact('book'));
        }
    }
    public function book_index(){
        $books = Book::orderBy('created_at', 'desc')->where('confirmed', true)->paginate(6);
        $types = Type::all();
        $varsities = Varsity::all();
        return view('visitor.book_index', compact('books', 'types', 'varsities'));
    }
    public function book_search(Request $request){
        $this->validate($request, [
            'search' => 'required'
        ]);
        $search = $request->input('search');
        $books = Book::where('name', 'LIKE', '%' . $search . '%')->orWhere('author', 'LIKE', '%' . $search . '%')->paginate(10);
        $types = Type::all();
        $varsities = Varsity::all();
        return view('visitor.book_index', compact('books', 'types', 'varsities'))->with('success', 'Search by Name');

        
    }
    public function book_find(Request $request){
        $this->validate($request, [
            'type' => 'required',
            'varsity' => 'required'
        ]);
        $newType = $request->input('type');
        $newVar = $request->input('varsity');
        $types = Type::all();
        $varsities = Varsity::all();
        if($newType !== 'null' && $newVar == 'null'){
            $books = Book::orderBy('created_at', 'desc')->where('category', $newType)->where('confirmed', true)->paginate(50);
            return view('visitor.book_index', compact('books', 'types', 'varsities'))->with('success', 'Filtered by Category');
        }elseif($newType == 'null' && $newVar !== 'null'){
            $books = Book::orderBy('created_at', 'desc')->where('varsity', $newVar)->where('confirmed', true)->paginate(50);
            return view('visitor.book_index', compact('books', 'types', 'varsities'))->with('success', 'Filtered by University');
        }elseif($newType !== 'null' && $newVar !== 'null'){
            $books = Book::orderBy('created_at', 'desc')->where('varsity', $newVar)->where('confirmed', true)->where('category', $newType)->paginate(50);
            return view('visitor.book_index', compact('books', 'types', 'varsities'))->with('success', 'Filtered by University and Book Category');
        }else{
            return redirect()->route('visitor.book_index')->with('error', 'Select a group of book');
        }
        /*if(Auth::user()){
                return view('user.books_index', compact('books', 'types'))->with('success', 'Filtered by Type');
            }else{
                return view('visitor.book_index', compact('books', 'types'))->with('success', 'Filtered by Type');
            } */
        
    }
    public function post_index(){
        $posts = Post::latest()->paginate(10);
        return view('visitor.post_index', compact('posts'));
    }
    public function post_show($id){
        $post = Post::find($id);
        $posts = Post::latest()->take(4)->get();
        if(Auth::check()){
            if(Auth::user()->is_admin == 1){
                return view('admin.super.post_show', compact('post'));
            }
            return view('user.post_show', compact('post'));
        }else{
            return view('visitor.post_show', compact('post', 'posts'));
        }
        
    }
    public function post_search(Request $request){
        $this->validate($request, [
            'book' => 'required'
        ]);
        $search = $request->input('book');
        $posts = Post::where('book_name', 'LIKE', '%' . $search . '%')->orWhere('author', 'LIKE', '%' . $search . '%')->paginate(10);
        return view('visitor.post_index', compact('posts'));           
    }
}

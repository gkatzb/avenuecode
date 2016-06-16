<?php
/**
 * Created by Gabriela Katz
 */
namespace App\Http\Controllers;

use App\Book;
use App\Editor;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{

    protected $bookId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        if(Auth::check()) {
            $userId = Auth::user()->id;
            $this->user = Auth::loginUsingId($userId);
        } else {
            return Redirect::guest(route('login'))->withErrors('Realize o login para acessar o sistema');
        }
    }

   public function index(){
       $books = new Book();
       $editor = new Editor();

       $data = $books->listBooks();
       $editors = $editor->listEditors();
       return view('books')->with(['data' => $data, 'editors' => $editors]);
   }

    public function getBook(Book $book, $bookId){
        $books = $book->getBook($bookId);
        return $books;
    }

    public function insertBook(Request $request){
        $data = [
            'title' => Input::get('title'),
            'editor_id' => Input::get('editor_id'),
            'year' => Input::get('year'),
            'edition' => Input::get('edition')
        ];

        $book = new Book();
        $book = $book->insertBook($data);

        if($book)
            return json_encode(true);
        return json_encode(false);
    }

    public function updateBook(Request $request){
        $bookId = Input::get('book_id');
        $data = [
            'title' => Input::get('title'),
            'editor_id' => Input::get('editor_id'),
            'year' => Input::get('year'),
            'edition' => Input::get('edition')
        ];
        $book = new Book();
        $book = $book->updateBook($data, $bookId);

        if($book)
            return json_encode(true);
        return json_encode(false);
    }

    public function deleteBook(Request $request){
        $bookId = Input::get('book_id');
        $book = new Book();
        $book = $book->deleteBook($bookId);

        if($book)
            return json_encode(true);
        return json_encode(false);
    }
}

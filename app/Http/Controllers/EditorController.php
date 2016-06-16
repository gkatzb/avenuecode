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

class EditorController extends Controller
{

    protected $editorId;

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
        $editors = new Editor();
        $books = new Book();
        $books = $books->listBooks();

        $data = $editors->listEditors();
        return view('editors')->with([
            'data' => $data,
            'books' => $books
        ]);
    }

    public function getEditor(Editor $editor, $editorId){
        $editors = $editor->getEditor($editorId);
        return $editors;
    }

    public function insertEditor(Request $request){
        $data = [
            'name' => Input::get('name')
        ];

        $editor = new Editor();
        $editor = $editor->insertEditor($data);

        if($editor)
            return json_encode(true);
        return json_encode(false);
    }

    public function updateEditor(Request $request){
        $editorId = Input::get('editor_id');
        $data = [
            'editor_id' => Input::get('editor_id'),
            'name' => Input::get('name')
        ];
        $editor = new Editor();
        $editor = $editor->updateEditor($data, $editorId);

        if($editor)
            return json_encode(true);
        return json_encode(false);
    }

    public function deleteEditor(Request $request){
        $editorId = Input::get('editor_id');
        $editor = new Editor();
        $editor = $editor->deleteEditor($editorId);

        if($editor)
            return json_encode(true);
        return json_encode(false);
    }
}

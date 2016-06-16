<?php
/**
 * Created by Gabriela Katz
 */

namespace database;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomModel extends Model
{
    /** Check user by login **/
    protected function checkUserByLogin($params){
        $user = DB::table($this->table)
            ->where('login', '=', $params['login'])
            ->first();
        return $user;
    }

    /** Get an editor by id **/
    protected function getEditorById($userId)
    {
        $user = DB::table($this->table)
            ->where('id', '=', $userId)
            ->get();
        return $user;
    }

    /** Get all books **/
    protected function getBooks()
    {
        $books = DB::table('book')
            ->join('editor', 'editor.id', '=', 'book.editor_id')
            ->select('editor.id as editor_id', 'editor.editor as editor_name', 'book.id as book_id', 'book.title as book_title', 'book.edition as book_edition', 'book.year as book_year')
            ->get();
        return $books;
    }

    /** Get all editors **/
    protected function getEditors(){
        $editors = DB::table('editor')
            ->get();
        return $editors;
    }

    /** Get a book by id **/
    protected function getBookById($cpId){
        $book = DB::table($this->table)
            ->where('book.id','=',$cpId)
            ->get();
        return $book;
    }
}
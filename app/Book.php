<?php
/**
 * Created by Gabriela Katz
 */
namespace App;

use database\CustomModel as Model;

class Book extends Model
{

    protected $table      = 'book';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'editor_id', 'year', 'edition',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function listBooks(){
        $book = $this->getBooks();
        return $book;
    }

    public function getBook($bookId){
        $book = $this->getBookById($bookId);
        return $book;
    }

    public function insertBook($params){
        $book = $this->create($params);
        $book = (object)$book;

        return $book;
    }

    public function updateBook($params, $bookId){
        $book = $this->find($bookId);

        $bookData = [
            'name' => $params['name']
        ];

        $book->update($bookData);
        $book = (object)$book;

        return $book;
    }

    public function deleteBook($bookId){
        $book = $this->find($bookId);
        $book->delete($book);
        return $book;
    }
}

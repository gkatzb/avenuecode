<?php
/**
 * Created by Gabriela Katz
 * Date: 05/05/2016
 */
namespace App;

use database\CustomModel as Model;

class Editor extends Model
{

    protected $table      = 'editor';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function listEditors(){
        $editor = $this->getEditors();
        return $editor;
    }

    public function getEditor($editorId){
        $editor = $this->getEditorById($editorId);
        return $editor;
    }

    public function insertEditor($params){
        $editor = $this->create($params);
        $editor = (object)$editor;

        return $editor;
    }

    public function updateEditor($params, $editorId){
        $editor = $this->find($editorId);
        $bookId = $params['book_id'];

        $data = [
            'book_id' => $bookId,
            'name' => $params['name']
        ];

        $editor->update($data);
        $editor = (object)$editor;

        return $editor;
    }

    public function deleteEditor($editorId){
        $editor = $this->find($editorId);
        $editor->delete($editor);
        return $editor;
    }
}

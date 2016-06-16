<?php
/**
 * Created by Gabriela Katz


 */
?>
<div class="books-table">
    <table id="books-table" class="table table-hover">
        <thead>
        <tr class="table-title">
            <th class="Nome">Title</th>
            <th>Editor</th>
        </tr>
        </thead>
        <tbody>
        @if(count($data))
            @foreach($data as $bookKey => $book)
                <tr>
                    <td>
                        <a class="Nomes" data-toggle="modal" data-target="#modal-book-details"
                           data-book-id="{!! $book->book_id !!}" data-name="{!! $book->book_name !!}"
                           data-editor-id="{!! $book->editor_id !!}">
                            {!! $book->book_name !!}
                        </a>
                    </td>
                    <td class="table-title tbl-nome-empresa">
                        {!! $book->editor_name !!}
                        <a class="btn label btn-prev btn-delete-book pull-right" data-token="{!! csrf_token() !!}" data-book-id="{!! $book->book_id !!}"
                                                          data-editor-id="{!! $book->editor_id !!}">
                            <img class="ico_delete ico_delete_book" src="/img/ico-del.png" alt="">
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="Nomes">
                <td colspan="6" class="text-center">No records found</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
<?php

use App\Route;
use DB\MyQueryBuilder;

Route::get('/', function() {
    $db = new MyQueryBuilder(DB);

    $db->select()->from('books');

    $books = $db->execute();

    return view('books', ['books' => $books]);
});

Route::get('/<int:book_id>', function($book_id) {

    $db = new MyQueryBuilder(DB);

    $db->select()->from('books')->where('id', '=', $book_id);

    $book = $db->execute();

    return view('read', ['book' => $book[0]]);
});

Route::get('/add', function() {
    return view('add');
});

Route::post('/add', function() {
    $errors = [];

    if ( !isset($_REQUEST['title']) || empty($_REQUEST['title']) ) {
        $errors[] = ['msg' => 'Title field is empty'];
        return view('add', ['errors' => $errors]);
    }

    if ( !isset($_FILES['file']) 
        || 
        empty($_FILES['file']) 
        || 
        $_FILES['file']['error'] != 0 ) 
    {
        $errors[] = ['msg' => 'File was not gotten'];
        return view('add', ['errors' => $errors]);
    }

    $db = new MyQueryBuilder(DB);

    $filepath = basename($_FILES['file']['name']);
    $uploadfile = 'media/' . $filepath;

    $db->insertInto('books', 
        [
            'title' => $_REQUEST['title'], 
            'description' => $_REQUEST['description'],
            'path' => $filepath,
        ]);

    $result = $db->execute();

    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
    
    return redirect('/books/add');
});


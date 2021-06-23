<?php
    $title = 'read ' . $book['name'];
    include 'includes/head.php';
?>
<body>
    <div class="container text-center">
    <div class="row">
            <a class="btn btn-primary col m-3" href="/" role="button">books</a>
            <a class="btn btn-info col m-3" href="/add" role="button">add new</a>
        </div>
        <object width="1200" height="800" type="application/pdf" data="/media/<?= $book['path'] ?>">
            <p>error of loading the file</p>
        </object>
    </div>
</body>
</html>
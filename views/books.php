<?php
    $title = 'main';
    include 'includes/head.php';
?>
<body>
    <div class="container text-center">
        <a href="/add" class="btn btn-success border">add new</a>

        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>№</th>
                    <th>name</th>
                    <th>description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr onclick="window.location.href='/<?= $book['id'] ?>'; return false" 
                    style="cursor:pointer;">
                        <td scope="row"><?= $book['id'] ?></td>
                        <td><?= $book['title'] ?></td>
                        <td><?= short_string($book['description'], 200) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</body>
</html>
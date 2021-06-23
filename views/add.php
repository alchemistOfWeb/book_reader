<?php
    $title = 'add book';
    include 'includes/head.php';
?>
<body>
    
    <div class="container text-center">
        <div class="row">
            <a class="btn btn-primary col m-3" href="/" role="button">books</a>
        </div>

        <?php if ($errors): ?>
            <?php foreach($errors as $error): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error['msg'] ?>
                </div>
            <?php endforeach ?>
        <?php endif ?>
        
        <form class="text-center" style="max-width: 400px;" action="/add" method="post" enctype="multipart/form-data">

            <div class="input-group mb-3">  
                <input type="text" name="title" class="form-control" id="input_title" placeholder="book title" aria-label="book title" aria-describedby="basic-addon1">
            </div>

            <div class="form-group mb-3"> 
                <label for="description-form" class="form-label">description</label>
                <textarea class="form-control" name="description" id="description-form" rows="3"></textarea>

                <!-- <input type="text" name="description" class="form-control" id="input_description" placeholder="book description" aria-label="book description" aria-describedby="basic-addon1"> -->
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">выберите файл с расширением .pdf</label>
                <input type="file" name="file" class="form-control" id="formFile">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
        
    </div>
    
</body>
</html>
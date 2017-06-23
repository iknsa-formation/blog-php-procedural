<main class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" class="form-control" id="content"></textarea>
        </div>

        <div class="form-group">
            <input type="submit">
        </div>
    </form>
</main>
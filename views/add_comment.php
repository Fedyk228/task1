<?php

if(isset($_POST['add_btn']))
    Actions::addComment();

if(isset($_POST['remove_btn']))
    Actions::removeComment();

?>


<div class="row">
    <div class="col-sm-8">
        <h2>Add comment</h2>
        <form method="post">
            <div class="row">
                <div class="col-sm-8">
                    <div class="py-2">
                        <label class="form-label fw-bold">Title:</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="py-2">
                        <label class="form-label fw-bold">Text:</label>
                        <textarea name="text" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="py-2">
                        <label class="form-label fw-bold">Theme:</label>
                        <select name="theme" class="form-select">
                            <option value="IT">IT</option>
                            <option value="QA">QA</option>
                            <option value="Frontend">Frontend</option>
                            <option value="Backend">Backend</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2 offset-2">
                    <div class="py-2">
                        <label class="form-label fw-bold">Tags:</label>

                        <p><input type="checkbox" name="tags[]" value="HTML"> HTML</p>
                        <p><input type="checkbox" name="tags[]" value="CSS"> CSS</p>
                        <p><input type="checkbox" name="tags[]" value="JS"> JS</p>
                        <p><input type="checkbox" name="tags[]" value="PHP"> PHP</p>
                        <p><input type="checkbox" name="tags[]" value="MySQL"> MySQL</p>
                    </div>
                    <div class="py-2">
                        <label class="form-label fw-bold">Level job:</label>

                        <p><input type="radio" name="level" value="Junior" checked> Junior</p>
                        <p><input type="radio" name="level" value="Middle"> Middle</p>
                        <p><input type="radio" name="level" value="Senior"> Senior</p>
                    </div>
                </div>
            </div>



            <div class="py-2">
                <button class="btn btn-danger" type="reset">Reset</button>
                <button class="btn btn-success" name="add_btn">Add comment</button>
            </div>

            <?php if(Actions::$notify) : ?>
                <p class="text-success"><?= Actions::$notify ?></p>
            <?php endif; ?>

            <?php if(Actions::$err) : ?>
                <p class="text-danger"><?= Actions::$err ?></p>
            <?php endif; ?>

        </form>

        <hr>

        <?php
            $Comments = Actions::getUserComments();

            if(sizeof($Comments)) :
        ?>
        <div class="list-group">
            <?php foreach ($Comments as $comment) : ?>
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <h5><?= $comment['title'] ?></h5>

                <form method="post">
                    <a href="/edit-comment/<?= $comment['id']; ?>" class="btn btn-primary">Edit</a>
                    <button class="btn btn-danger" name="remove_btn" value="<?= $comment['id']; ?>">Remove</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else : ?>
            <h2 class="text-muted my-4">No comments</h2>
        <?php endif; ?>


    </div>
</div>
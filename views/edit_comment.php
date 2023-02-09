<?php

if(isset($_POST['save_btn']))
    Actions::saveComment();

$Comment = Actions::getOneComment();


?>


<div class="row">
    <div class="col-sm-8">
        <a href="/add-comment" class="btn btn-primary">Go back</a>
        <hr>
        <?php if($Comment) : ?>
        <h2>Edit comment</h2>
        <form method="post">
            <div class="row">
                <div class="col-sm-8">
                    <div class="py-2">
                        <label class="form-label fw-bold">Title:</label>
                        <input type="text" class="form-control" name="title" value="<?= $Comment['title'] ?>" required>
                    </div>
                    <div class="py-2">
                        <label class="form-label fw-bold">Text:</label>
                        <textarea name="text" rows="3" class="form-control"><?= $Comment['text'] ?></textarea>
                    </div>
                    <div class="py-2">
                        <label class="form-label fw-bold">Theme:</label>
                        <select name="theme" class="form-select">
                            <option value="IT" <?= $Comment['theme'] == 'IT' ? 'selected' : '' ?> >IT</option>
                            <option value="QA" <?= $Comment['theme'] == 'QA' ? 'selected' : '' ?> >QA</option>
                            <option value="Frontend" <?= $Comment['theme'] == 'Frontend' ? 'selected' : '' ?> >Frontend</option>
                            <option value="Backend" <?= $Comment['theme'] == 'Backend' ? 'selected' : '' ?> >Backend</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2 offset-2">
                    <div class="py-2">

                        <?php

                        $tags = $Comment['tags'] ? json_decode($Comment['tags'], true) : [];
                        function statusTag($value)
                        {

                            foreach ($GLOBALS['tags'] as $tag)
                            {
                                if($tag == $value)
                                    return 'checked';
                            }

                        }

                        ?>

                        <label class="form-label fw-bold">Tags:</label>

                        <p><input type="checkbox" name="tags[]" value="HTML" <?= statusTag('HTML'); ?>  > HTML</p>
                        <p><input type="checkbox" name="tags[]" value="CSS" <?= statusTag('CSS'); ?>> CSS</p>
                        <p><input type="checkbox" name="tags[]" value="JS" <?= statusTag('JS'); ?>> JS</p>
                        <p><input type="checkbox" name="tags[]" value="PHP" <?= statusTag('PHP'); ?>> PHP</p>
                        <p><input type="checkbox" name="tags[]" value="MySQL" <?= statusTag('MySQL'); ?>> MySQL</p>
                    </div>
                    <div class="py-2">
                        <label class="form-label fw-bold">Level job:</label>

                        <p><input type="radio" name="level" value="Junior" <?= $Comment['level'] == 'Junior' ? 'checked' : '' ?>> Junior</p>
                        <p><input type="radio" name="level" value="Middle" <?= $Comment['level'] == 'Middle' ? 'checked' : '' ?>> Middle</p>
                        <p><input type="radio" name="level" value="Senior" <?= $Comment['level'] == 'Senior' ? 'checked' : '' ?>> Senior</p>
                    </div>
                </div>
            </div>



            <div class="py-2">
                <button class="btn btn-success" name="save_btn">Save comment</button>
            </div>

            <?php if(Actions::$notify) : ?>
                <p class="text-success"><?= Actions::$notify ?></p>
            <?php endif; ?>

            <?php if(Actions::$err) : ?>
                <p class="text-danger"><?= Actions::$err ?></p>
            <?php endif; ?>

        </form>
        <?php else : ?>
            <h2 class="text-muted">Comment not found</h2>
        <?php endif; ?>

    </div>
</div>
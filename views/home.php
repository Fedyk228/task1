<?php

$Comments = Actions::getAllComments();


?>

<div class="row">
    <?php
        if(sizeof($Comments)) :
        foreach ($Comments as $comment) :
    ?>
    <div class="col-sm-6 my-2">
        <div class="card">
            <div class="card-body">
                <h4><?= $comment['title'] ?></h4>
                <p><?= $comment['text'] ?></p>
                <p><b>Theme: </b> <?= $comment['theme'] ?></p>

                <div class="py-2">
                    <?php
                        $tags = json_decode($comment['tags'], true);

                        if(!$tags)
                            $tags = [];

                        if(sizeof($tags)) :
                        foreach ($tags as $tag) :
                    ?>
                    <span class="badge bg-success"><?= $tag ?></span>
                    <?php
                        endforeach;
                        endif;
                    ?>
                </div>
                <p><b>Level: </b> <?= $comment['level'] ?></p>


            </div>
            <div class="card-footer">
                <p class="text-primary"><b>Author: </b> <?= $comment['username'] ?></p>
            </div>
        </div>
    </div>
    <?php
        endforeach;
        else :
       ?>
    <h1 class="text-muted">No comments</h1>
    <?php endif; ?>

</div>
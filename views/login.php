<?php

if(isset($_POST['login_btn']))
    Actions::login();

?>

<div class="row">
    <div class="col-sm-6 offset-3">
        <h2>Login App</h2>
        <form method="post">
            <div class="py2">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="py2">
                <label class="form-label">Password:</label>
                <input type="password" class="form-control" name="pass">
            </div>
            <div class="py-2">
                <button class="btn btn-success" name="login_btn">Login</button>
            </div>

        </form>

        <p class="mt-2 text-danger"><?= Actions::$err; ?></p>
    </div>
</div>
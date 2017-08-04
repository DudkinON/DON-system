<section>
    <div class="canvas">
        <div class="range">
            <div class="column-m-4 column-l-3"></div>
            <div class="column-m-4 column-l-6">
                <div class="content"></div>

                <div class="form-install">
                    <form action="" method="post">
                        <div class="terms-cms-container">
                            <h1 class="top-header">license and terms</h1>
                            <p>If you agree with terms and license click checkbox.</p>
                            <hr>
                            <div class="agree-container">
                                <label for="terms-cms-chbox">I agree with terms and license.</label>
                                <input type="checkbox" id="terms-cms-chbox" value="off">
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="button" id="terms-cms-btm" class="button button-main btn-width" disabled>
                                    next
                                </button>
                            </div>
                        </div>
                        <div class="db-enter">
                            <h1 class="top-header">enter database configuration</h1>
                            <?php if (isset($errors) && is_array($errors) && $errors): ?>
                                <h6 class="red">Errors:</h6>
                                <ul class="red">
                                    <?php foreach ($errors as $error): ?>
                                        <li> <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <?php if (isset($messages) && is_array($messages) && $messages): ?>
                                <h6 class="green">Messages:</h6>
                                <ul class="green">
                                    <?php foreach ($messages as $msg): ?>
                                        <li> <?php echo $msg; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <div class="body-form">
                                <input name="host"
                                       value="<?php if ($mysql_default_host) echo $mysql_default_host; elseif ($host) echo $host; ?>"
                                       placeholder="host" class="form-ctrl" id="host-field">
                                <input name="db_name" placeholder="database name" class="form-ctrl"
                                       value="<?php if ($db_name) echo $db_name; ?>">
                                <input name="db_user" placeholder="database user" class="form-ctrl"
                                       value="<?php if ($db_user) echo $db_user; ?>">
                                <div class="password">
                                    <input name="db_password" placeholder="database password" class="form-ctrl"
                                           value="<?php if ($db_password) echo $db_password; ?>" type="password" id="password-field">
                                    <i class="fa fa-eye-slash" aria-hidden="true" id="show-password"></i>
                                    <i class="fa fa-eye hide" aria-hidden="true" id="hide-password"></i>
                                </div>

                                <div class="text-center">
                                    <button name="submit" class="button button-main btn-width" id="submit">next</button>
                                </div>
                            </div>
                            <?php if (isset($create_db) && is_array($create_db) && $create_db): ?>
                                <h6 class="green">Messages:</h6>
                                <ul class="green">
                                    <?php foreach ($create_db as $msg): ?>
                                        <li> <?php echo $msg; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once ('config.inc.php');
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand" href="#">Navbar</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                foreach ($menuItems as $key => $value) {
                    foreach ($value as $sub_key => $sub_value) { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="<?php echo $sub_value ?>"><?php echo $sub_key ?></a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
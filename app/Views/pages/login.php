<?= $this->extend('layout/guest_template') ?>

<?= $this->section('content') ?>
<div class="login-reg-panel shadow bg-white">
    <div class="login-info-box">
        <form action="<?php echo base_url('/loginUser'); ?>" method="post">
            <p class="fw-light fs-4 text-primary">USER</p>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="usernameUser" class="form-label">Username</label>
                <input type="text" class="form-control rounded-pill" placeholder="Username" id="usernameUser" name="usernameUser">
            </div>
            <div class="mb-3">
                <label for="passwordUser" class="form-label">Password</label>
                <input type="password" class="form-control rounded-pill" placeholder="Password" id="passwordUser" name="passwordUser">
            </div>
            <button type="submit" class="btn btn-primary rounded-pill px-4 w-100">Login</button>
        </form>
    </div>

    <div class="register-info-box">
        <form action="<?php echo base_url('/loginAdmin'); ?>" method="post">
            <p class="fw-light fs-4 text-warning">ADMIN</p>
            <?php if (session()->getFlashdata('msgadmin')) : ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msgadmin') ?>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="usernameAdmin" class="form-label">Username</label>
                <input type="text" class="form-control rounded-pill" placeholder="Username" id="usernameAdmin" name="usernameAdmin">
            </div>
            <div class="mb-3">
                <label for="passwordAdmin" class="form-label">Password</label>
                <input type="password" class="form-control rounded-pill" placeholder="Password" id="passwordAdmin" name="passwordAdmin">
            </div>
            <button type="submit" class="btn btn-warning rounded-pill px-4 w-100 text-white">Login</button>
        </form>
    </div>

    <div class="white-panel right-log bg-primary align-items-center justify-content-center d-flex">
        <div class="login-show text-white text-center align-middle">
            <h2 class="fw-bold">Selamat Datang!</h2>
            <p>Masuk sebagai User?</p>
            <label class="btn btn-outline-light rounded-pill" for="log-login-show">Masuk User</label>
            <input type="radio" name="active-log-panel" id="log-login-show">
        </div>
        <div class="register-show text-white text-center align-middle">
            <h2 class="fw-bold">Selamat Datang!</h2>
            <p>Masuk sebagai Admin?</p>
            <label class="btn btn-outline-light rounded-pill" for="log-reg-show">Masuk Admin</label>
            <input type="radio" name="active-log-panel" id="log-reg-show">

        </div>
    </div>
    <span id="adminoruser"><?php if (session()->get('msgadmin')) {
                                echo 'admin';
                            } else {
                                echo 'user';
                            } ?></span>
</div>
<script>
    $(document).ready(function() {
        // $(".register-info-box").fadeOut();
        // $(".register-show").addClass("show-log-panel");
        var admorusr = document.getElementById("adminoruser");
        if (admorusr.textContent.includes("user")) {
            $(".register-info-box").fadeOut();
            $(".register-show").addClass("show-log-panel");
        } else if (admorusr.textContent.includes("admin")) {
            $(".login-info-box").fadeOut();
            $(".login-show").addClass("show-log-panel");
            $(".white-panel").removeClass("right-log");
            $(".white-panel").removeClass("bg-primary");
            $(".white-panel").addClass("bg-warning");
        }
        // $("#log-login-show").attr("checked", false);
        // $("#log-reg-show").attr("checked", true);
    });

    $('.login-reg-panel input[type="radio"]').on("change", function() {
        if ($("#log-login-show").is(":checked")) {
            $(".register-info-box").fadeOut();
            $(".login-info-box").fadeIn();

            $(".white-panel").addClass("right-log");
            $(".white-panel").removeClass("bg-warning");
            $(".white-panel").addClass("bg-primary");
            $(".register-show").addClass("show-log-panel");
            $(".login-show").removeClass("show-log-panel");
        } else if ($("#log-reg-show").is(":checked")) {
            $(".register-info-box").fadeIn();
            $(".login-info-box").fadeOut();

            $(".white-panel").removeClass("right-log");
            $(".white-panel").removeClass("bg-primary");
            $(".white-panel").addClass("bg-warning");
            $(".login-show").addClass("show-log-panel");
            $(".register-show").removeClass("show-log-panel");
        }
    });
</script>
<?= $this->endSection() ?>
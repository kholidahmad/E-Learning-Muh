<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <?= $this->session->flashdata('message'); ?>
            <form class="login100-form validate-form" method="post" action="<?= base_url('auth'); ?>">
                <span class="login100-form-title p-b-50">
                    <img height="150" width="110" src="<?= base_url('assets/img/profil/simpon.png') ?>">
                </span>
                <span class="login100-form-title p-b-26">
                    Login E-Learning SIMPON
                </span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="username" id="username">
                    <span class="focus-input100" data-placeholder="username"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                        <i class="zmdi zmdi-eye"></i>
                    </span>
                    <input class="input100" type="password" name="password" id="password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>

                <!-- <div class="text-center p-t-50">
                    <span class="txt1">
                        Don’t have an account?
                    </span>

                    <a class="txt2" href="#">
                        Sign Up
                    </a>
                </div> -->
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
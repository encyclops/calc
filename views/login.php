<?php
ob_start();
?>
<section class="section register d-flex flex-column align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                            <p class="text-center small">Enter your username &amp; password to login</p>
                        </div>
                        <form id="loginForm" class="row g-3 needs-validation" novalidate="">
                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" name="username" class="form-control" id="yourUsername" required="">
                                    <div class="invalid-feedback">Please enter your username.</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="yourPassword" required="">
                                <div class="invalid-feedback">Please enter your password!</div>
                            </div>
                            <!-- <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                            </div> -->
                            <div class="col-12">
                                <input type="hidden" name="action" value="oneUser">
                                <button class="btn btn-primary w-100" type="button" onclick="login()">Login</button>
                            </div>
                            <!-- <div class="col-12">
                                <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
/* Store the content of the buffer for later use */
$content = ob_get_contents();
$page = 'login';
/* Clean out the buffer, and destroy the output buffer */
ob_end_clean();
/* Call the master page. It will echo the content of the placeholders in the designated locations */
include __DIR__ . "/layout.php";
?>
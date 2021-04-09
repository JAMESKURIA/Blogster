<!-- Header -->
<?php
include './includes/header.php';
include '../assets/register_handler.php';
include '../assets/login_handler.php';
?>

<!-- Main section -->
<main id="login-main">
    <?php include './includes/intro_section_2.php'; ?>

    <section class="container">
        <div class="container-content">

            <!-- two buttons -->
            <div class="two-buttons">
                <button>Login</button>
                <button>Register</button>
            </div>

            <!-- Login section -->
            <div class="login-section">

                <form method="POST" action="./login.php" enctype="multipart/form-data" class="login-now">
                    <h3>Login Now</h3>

                    <input type="email" name="login_email" placeholder="Email">
                    <input type="password" name="login_password" placeholder="password">
                    <div class="send-button-div">
                        <input type="submit" name="login" value="Log In">
                        <h5><a href="#">Forgot Password?</a></h5>
                    </div>
                </form>

                <div class="login-social">
                    <h3>Login via Social</h3>

                    <div class="facebook">
                        <i class="fab fa-facebook-f"></i>
                        <h4>Login With Facebook</h4>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="twitter">
                        <i class="fab fa-twitter"></i>
                        <h4>Login With Twitter</h4>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="google">
                        <i class="fab fa-google"></i>
                        <h4>Login With Google</h4>
                        <i class="fas fa-chevron-right"></i>
                    </div>

                </div>
            </div>

            <!-- Register section -->
            <div class="register-section">

                <form class="register-now" method="POST" action="./login.php" enctype="multipart/form-data">
                    <h3>Register Now</h3>

                    <input type=" text" name="f_name" placeholder="first name e.g John" required>
                    <input type="text" name="l_name" placeholder="last name e.g. Doe" required>
                    <input type="tel" name="phone_number" placeholder="phone number e.g. 0700123456" required>
                    <input type="text" name="location" placeholder="address e.g. Limuru" required>
                    <input type="email" name="register_email" placeholder="Email e.g. johndoe@gmail.com" required>
                    <input type="password" name="register_password" placeholder="password" required>
                    <select name="profession" id="profession" required>
                        <option value="Profession" selected disabled hidden style="color: #757575;">Profession</option>
                        <option value="Software engineer">Software engineer</option>
                        <option value="Web developer">Web developer</option>
                        <option value="Doctor">Doctor</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="send-button-div">
                        <input type="submit" name="reg" value="Sign Up">
                        <h5 id="existing-account">Already have an account?</h5>
                    </div>
                </form>

                <div class="login-social">
                    <h3>Register via Social</h3>
                    <div class="facebook">
                        <i class="fab fa-facebook-f"></i>
                        <h4>Sign Up with Facebook</h4>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="twitter">
                        <i class="fab fa-twitter"></i>
                        <h4>Sign Up with Twitter</h4>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="google">
                        <i class="fab fa-google"></i>
                        <h4>Sign Up with Google</h4>
                        <i class="fas fa-chevron-right"></i>
                    </div>

                </div>
            </div>
        </div>
    </section>


</main>

<script src="./scripts/toggle_login.js"></script>
</body>

</html>
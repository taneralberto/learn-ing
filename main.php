<?php
session_start();
include './lib/config.php';
ini_set('error_reporting', 0);
?>

<?php include('./includes/head.php'); ?>

<body class="d-flex justify-content-center mt-sm-5 bg-primary">

    <div class="container-fluid ml-sm-5 mr-sm-5 mt-sm-5 mb-5 bg-primary-radial">

        <header class="row">
            <nav class="col navbar navbar-expand-lg navbar-dark py-0">
                <a class="navbar-brand" href="#">Learn.ing</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item d-flex align-items-center pointer" id="menu">
                            <a class="nav-link dark" href="">MENU</a>
                        </li>
                        <li class="nav-item d-flex align-items-center pointer activate" id="login">
                            <a class="nav-link dark" href="#login">LOGIN</a>
                        </li>
                        <li class="nav-item d-flex align-items-center pointer" id="register">
                            <a class="nav-link dark" href="#register">REGISTER</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="row">
            <aside class="col-lg-5 col-xl-4 bg-white d-flex justify-content-center align-items-center flex-column h-100" id="aside">
                <div class="content-form-login row d-flex justify-content-center align-items-center d-none" id="content-form-login">
                    <form class="p-xl-3 p-lg-3 p-md-4 w-100 m-2">
                        <h2 class="text-primary text-center font-weight-bold">LOGIN</h2>

                        <div class="input-group mb-3 d-flex flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary" id="basic-addon1"><img src="./resources/icons/icons8_Contacts_2.ico" alt=""></span>
                            </div>
                            <input type="text" class="form-control form-control-lg rounded-pill-right border" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3 d-flex flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary" id="basic-addon1"><img src="./resources/icons/icons8_Key_1.ico" alt=""></span>
                            </div>
                            <input type="password" class="form-control form-control-lg rounded-pill-right border" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <span><a href="#" class="text-primary">Forgot password?</a></span>

                        <div class="custom-control custom-checkbox mt-2">
                            <input type="checkbox" class="custom-control-input" id="checkRememberMe">
                            <label for="checkRememberMe" class="custom-control-label">Remember me</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill border-dark">LOGIN</button>
                    </form>
                </div>

                <div class="content-form-register row d-none justify-content-center align-items-center" id="content-form-register">
                    <form class="p-xl-3 p-lg-3 p-md-4 w-100 m-2" action="" method="POST">
                        <h2 class="text-primary text-center font-weight-bold">REGISTER</h2>

                        <div class="input-group mb-3 d-flex flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary" id="basic-addon1"><img src="./resources/icons/icons8_Contacts_2.ico" alt=""></span>
                            </div>
                            <input type="text" class="form-control form-control-lg rounded-pill-right border" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?= $_POST['username'] ?>" required>
                        </div>
                        <div class="input-group mb-3 d-flex flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary" id="basic-addon1"><img src="./resources/icons/icons8_Email.ico" alt=""></span>
                            </div>
                            <input type="text" class="form-control form-control-lg rounded-pill-right border" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" value="<?= $_POST['email'] ?>" required>
                        </div>
                        <div class="input-group mb-3 d-flex flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary" id="basic-addon1"><img src="./resources/icons/icons8_Key_1.ico" alt=""></span>
                            </div>
                            <input type="password" class="form-control form-control-lg rounded-pill-right border" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3 d-flex flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary" id="basic-addon1"><img src="./resources/icons/icons8_Key_1.ico" alt=""></span>
                            </div>
                            <input type="password" class="form-control form-control-lg rounded-pill-right border" name="repassword" placeholder="Repeat Password" aria-label="Password" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="custom-control custom-checkbox mt-2">
                            <input type="checkbox" class="custom-control-input" id="checkTerms" name="terms" required>
                            <label for="checkTerms" class="custom-control-label"><a href="#" id="terms" data-toggle="modal" data-target="#termsModal">Terms and
                                    conditions</a></label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill border-dark" name="submit">REGISTER</button>
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {

                        $username = $mysqli->real_escape_string($_POST['username']);
                        $email = $mysqli->real_escape_string($_POST['email']);
                        $password = $mysqli->real_escape_string(md5($_POST['password']));
                        $repassword = $mysqli->real_escape_string(md5($_POST['repassword']));
                        //list($username, $email, $password, $repassword) = $_POST;

                        $checkUser = mysqli_num_rows($mysqli->query("SELECT username FROM users WHERE username = '$username'"));
                        $checkEmail = mysqli_num_rows($mysqli->query("SELECT email FROM users WHERE email = '$email'"));

                        $alert = array('bg' => '', 'message' => '');

                        if ($checkUser >= 1) {
                            $alert['bg'] = 'danger';
                            $alert['message'] = 'El usuario ya está en uso.';
                        } else {
                            if ($checkEmail >= 1) {
                                $alert['bg'] = 'danger';
                                $alert['message'] = 'El email ya está en uso.';
                            } else {
                                if ($password != $repassword) {
                                    $alert['bg'] = 'danger';
                                    $alert['message'] = 'Las contraseñas no coinciden.';
                                } else {
                                    $insert = $mysqli->query("INSERT INTO users (username,email,password,register_date)
                                                        VALUES ('$username','$email','$password',now())");

                                    if ($insert) {
                                        $alert['bg'] = 'success';
                                        $alert['message'] = 'Registro exitoso.';

                                        header('Refresh: 2; url = home.php');
                                    }
                                }
                            }
                        }
                    }
                    ?>
                </div>

                <?php if (isset($_POST['submit'])) { ?>
                    <div class="alert-error d-none alert alert-<?= $alert['bg'] ?> alert-dismissible fade show" role="alert">
                        <strong><?= $alert['message'] ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <footer>
                    <ul class="d-flex">
                        <li class="m-2 m-sm-3"><a href="#">About</a></li>
                        <li class="m-2 m-sm-3"><a href="#">Impress</a></li>
                        <li class="m-2 m-sm-3"><a href="#">Privacy</a></li>
                        <li class="m-2 m-sm-3"><a href="#">Degrees</a></li>
                    </ul>
                </footer>
            </aside>

            <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Terms and conditions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione cum
                                eveniet
                                aspernatur debitis, architecto recusandae dolores temporibus numquam, delectus non
                                maxime provident
                                expedita excepturi fuga corrupti dolorem ex enim. Doloremque.
                                Quia natus dicta, consequuntur sit ipsum ea omnis perferendis neque, enim expedita
                                corporis adipisci
                                inventore at unde voluptates voluptas laudantium ex impedit, et debitis quod? Et non eum
                                nesciunt
                                iste!
                                Fugit, sed porro! Aspernatur obcaecati quas magni veniam reiciendis porro quam ullam
                                cumque
                                dignissimos aperiam asperiores eaque tempora, similique enim, consectetur quod vero
                                sunt. Saepe ad
                                accusantium nam tempore totam.
                                Eos doloremque voluptates illum sint optio eligendi hic sapiente, voluptatibus aliquam
                                molestias
                                libero ullam, doloribus eveniet enim odit dicta ipsa culpa delectus omnis neque amet
                                iste
                                praesentium! Quam, id molestias.</p>
                            <p class="text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione cum
                                eveniet
                                aspernatur debitis, architecto recusandae dolores temporibus numquam, delectus non
                                maxime provident
                                expedita excepturi fuga corrupti dolorem ex enim. Doloremque.
                                Quia natus dicta, consequuntur sit ipsum ea omnis perferendis neque, enim expedita
                                corporis adipisci
                                inventore at unde voluptates voluptas laudantium ex impedit, et debitis quod? Et non eum
                                nesciunt
                                iste!
                                Fugit, sed porro! Aspernatur obcaecati quas magni veniam reiciendis porro quam ullam
                                cumque
                                dignissimos aperiam asperiores eaque tempora, similique enim, consectetur quod vero
                                sunt. Saepe ad
                                accusantium nam tempore totam.
                                Eos doloremque voluptates illum sint optio eligendi hic sapiente, voluptatibus aliquam
                                molestias
                                libero ullam, doloribus eveniet enim odit dicta ipsa culpa delectus omnis neque amet
                                iste
                                praesentium! Quam, id molestias.</p>
                            <p class="text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione cum
                                eveniet
                                aspernatur debitis, architecto recusandae dolores temporibus numquam, delectus non
                                maxime provident
                                expedita excepturi fuga corrupti dolorem ex enim. Doloremque.
                                Quia natus dicta, consequuntur sit ipsum ea omnis perferendis neque, enim expedita
                                corporis adipisci
                                inventore at unde voluptates voluptas laudantium ex impedit, et debitis quod? Et non eum
                                nesciunt
                                iste!
                                Fugit, sed porro! Aspernatur obcaecati quas magni veniam reiciendis porro quam ullam
                                cumque
                                dignissimos aperiam asperiores eaque tempora, similique enim, consectetur quod vero
                                sunt. Saepe ad
                                accusantium nam tempore totam.
                                Eos doloremque voluptates illum sint optio eligendi hic sapiente, voluptatibus aliquam
                                molestias
                                libero ullam, doloribus eveniet enim odit dicta ipsa culpa delectus omnis neque amet
                                iste
                                praesentium! Quam, id molestias.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Accept</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col mt-sm-3 d-flex justify-content-center align-items-center flex-column" style="min-height:500px;">
                <span class="h1 text-black-50 bg-light p-sm-3 mt-3 rounded-pill">Welcome to</span>
                <h1 class="display-4 display-sm-1 font-weight-bold">Learn.ing</h1>
                <span class="font-weight-light text-white m-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quisquam eos eius accusantium dolorum.</span>
                <button class="btn btn-light rounded-pill border-white m-2">Learn more</button>
            </div>

        </div>
    </div>

    <script>

        // document.querySelectorAll('.nav-item').forEarch(element => {
        //     element.addEventListener('click', () => {
                
        //     });
        // })
        
        // document.querySelector('.navbar-nav').addEventListener('click', e => {
        //     e.target
        // });

        menu.addEventListener('click', () => {
            aside.classList.remove('d-flex');
            aside.classList.add('d-none');
            login.classList.remove('activate');
            register.classList.remove('activate');
        });

        login.addEventListener('click', () => {
            aside.classList.add('d-flex');
            document.getElementById('content-form-login').classList.add('d-flex');
            document.getElementById('content-form-register').classList.remove('d-flex');
            login.classList.add('activate');
            register.classList.remove('activate');
            document.querySelector('.alert-error').classList.add('d-none');
        });

        register.addEventListener('click', () => {
            aside.classList.add('d-flex');
            document.getElementById('content-form-login').classList.remove('d-flex');
            document.getElementById('content-form-register').classList.add('d-flex');
            login.classList.remove('activate');
            register.classList.add('activate');
            document.querySelector('.alert-error').classList.remove('d-none');
        });

        // terms.addEventListener('click', () => {
        //     if (window.innerWidth >= 1585) {
        //         contentTerms.classList.toggle('d-none');
        //         termsModal.classList.add('d-none');
        //         termsModal.classList.remove('modal-backdrop');
        //         termsModal.classList.remove('show');
        //     } else {
        //         termsModal.classList.toggle('d-none');
        //     }
        // })
    </script>

    <?php include('./includes/foot.php'); ?>
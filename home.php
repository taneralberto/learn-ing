<?php
session_start();
include './lib/config.php';
ini_set('error_reporting', 0);
?>

<?php include('./includes/head.php'); ?>

<body class="bg-dark">

    <div class="container">

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#">Learn.ing</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item d-flex align-items-center" id="menu">
                            <a class="nav-link" href="">MENU</a>
                        </li>
                        <li class="nav-item d-flex align-items-center activate" id="login">
                            <a class="nav-link" href="#login">LOGIN</a>
                        </li>
                        <li class="nav-item d-flex align-items-center" id="register">
                            <a class="nav-link" href="#register">REGISTER</a>
                        </li>
                    </ul>
                    <form action="" class="form-inline my-2 my-lg-0">
                        <input type="text" class="form-control mr-sm-2" placeholder="Search">
                        <button type="submit" class="btn btn-secondary my-2 my-sm-0">Search</button>
                    </form>
                </div>
            </nav>
        </header>

        <div class="row">
            <aside class="col-lg-5 col-xl-4 bg-success">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae deleniti, delectus assumenda veritatis sequi in, voluptate, dolorum dolorem corrupti fuga cum doloribus nesciunt eaque hic consequuntur animi nihil maiores alias.
                Laborum eaque in architecto quae non dolorum aspernatur commodi libero consectetur perspiciatis debitis beatae aut ad vel ex sint, eos optio nesciunt facilis quis obcaecati numquam, iste impedit dolores! Natus!
                Dolorum cupiditate quasi sunt qui earum non nobis autem culpa, rerum consectetur dolorem aliquid? Sapiente cupiditate repudiandae quos porro ad perspiciatis architecto perferendis eum officiis animi. Fuga possimus natus rem.
                Maxime voluptatum repellendus dignissimos obcaecati earum quam pariatur ipsum omnis dicta, laborum expedita soluta, consequatur animi. Nobis eos quo neque dolorum aliquam sint expedita nostrum provident fuga quos, omnis dolores!
                Incidunt quisquam laborum soluta. Alias tenetur dolorem assumenda facere expedita! Accusantium molestiae ut quaerat! Quasi reprehenderit quidem accusamus? Quaerat adipisci est magni quis recusandae quibusdam, omnis iusto sed. Atque, minus.
            </aside>

            <div class="col content bg-warning">

            </div>

        </div>

    </div>




<?php include('./includes/foot.php'); ?>
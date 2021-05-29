<?php include('form_validation.php') ?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DiscussX</title>

    <link rel="icon" type="image/png" href="title.png">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata&display=swap" rel="stylesheet">
</head>

<body>


    <div id="loader">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>

    <header>
        <a href="https://discussx.akash.website/" class="anchor-tag" style="
    text-decoration: none;
    color: #FFF;
">
            <h1>DiscussX</h1>
        </a>
        <p>
            Online Discussion Forum
        </p>
    </header>
    <main>
        <h2>Add new topic<br /> <a href="#new_topic_form" style="text-decoration:none;"><button id="new_topic_button">+</button> </a></h2>
        <br /><br />

        <?php
        include('connect.php');
        $extract = "SELECT * FROM topics;";
        $res = mysqli_query($db, $extract);
        $res_check = mysqli_num_rows($res);

        if ($res_check > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
        ?>
                <article>
                    <h2> <?= $row['topic_title'] ?></h2>
                    <h5><b>#<?= $row['topic_id'] ?></b></h5>
                    <hr />
                    <h4><?= $row['topic_username'] ?> - <span id="bc"><?= $row['topic_date_of_creation'] ?></span></h4>

                    <h4 id="abc"><?= $row['topic_email'] ?></h4>
                    <!-- <button onclick="window.location.href = 'post_index.php?openS= $row['topic_id']';">Click Here</button> -->
                    <a href="post_index.php?openS=<?= $row['topic_title'] ?>&rS=<?= $row['topic_id'] ?>" class="button" id="mod_button">Posts <?= $row['topic_no_of_posts'] ?></a>
                    <br />
                </article>
                <br /><br />
            <?php
            }
        } else {
            ?> <h1>No Topics yet..</h1>
        <?php
        }
        ?>

        <div id="modal">
            <form action="" method="post" border="1px solid dodgerblue">
                <div id="new_topic_form">
                    <legend>
                        <h1>Add a new topic</h1>
                    </legend>
                    <hr id="hr" />
                    <label for="title"><b>Topic Title</b></label><span class="error"><?= $title_error ?></span>
                    <input type="text" class="shortType" placeholder="Enter Topic Title" name="title" value="<?= $tes ?>" />
                    <hr />
                    <label for="name"><b>Name</b></label> <span class="error"><?= $name_error ?></span>
                    <input type="text" class="shortType" placeholder="Enter Name" name="name" value="<?= $n ?>" />
                    <label for="e_mail"><b>Email</b></label> <span class="error"><?= $email_error ?></span>
                    <input type="text" class="shortType" placeholder="Enter Email" name="email" value="<?= $e ?>" />
                    <label for="desc"><b>Description</b></label>
                    <span class="error"><?= $desc_error ?></span>
                    <textarea type="text" class="longType" placeholder="Give Description of topic" rows="5" cols="40" name="desc"><?= $ds ?></textarea>
                    <button type="submit" id="submit_button" name="new_submit">Submit</button>
                    <br />
                </div>
            </form>
        </div>
    </main>
    <footer id="footer">
        <h2>&copy; DiscussX platform
            <script>
                document.write(new Date().getFullYear());
            </script>
        </h2>
    </footer>

    <script>
        var loader = document.getElementById("loader");
        window.addEventListener('load', function() {
            setTimeout(function() {
                loader.style.display = 'none';
            }, 3000);
        });
    </script>
    <!-- If CDN loads first use it else use the local download version
    <script src="//code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>

    <script>
        window.jQuery || document.write('<script src="jquery-3.4.1.min.js"><\/script>')
    </script>
     <script>
        $(window).on('load', function() {
                    $('#loader').delay(1000).style.display
        });
    </script>  -->

    <!-- // var trans = $('.loader').removeClass('loader');
    // setTimeout(function() {
    // trans.addClass('no-loader');
    // }, 2000); -->



</body>

</html>
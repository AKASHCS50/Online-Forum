<?php
if ((isset($_GET["openS"], $_GET["rs"])))
    header("location: index.php");
include('post_validation.php');
$t = $_GET["openS"];
$ts = $_GET["rS"]; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <div id="loader">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Discuss X</title>

    <link rel="icon" type="image/png" href="title.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/post.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata&display=swap" rel="stylesheet">
</head>

<body>

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
        <h2 style="width:100%; text-align:center;">&nbsp;&nbsp;<span id="pq" style="position:relative;float:left;color:#000;background-color:rgb(208,206,206);text-align:center;padding: 2px;">#<?= $ts ?> </span><?= $t ?></h2>
        <br />
        <hr /><br />
        <?php
        include('connect.php');
        $extract = "SELECT * FROM `$t`;";
        // echo $extract;
        $res = mysqli_query($db, $extract);
        $res_check = mysqli_num_rows($res);

        if ($res_check > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
        ?>
                <article>
                    <h4><?= $row['post_username'] ?> - <span id="bc"><?= $row['post_date_of_creation'] ?></span></h4>
                    <h5><b>#<?= $row['post_id'] ?></b></h5>
                    <h4 id="abc"><?= $row['post_email'] ?></h4><br />
                    <hr />
                    <p> <?= $row['post_desc'] ?> </p>
                </article>
            <?php
            }
        } else {
            ?> <h1>No Posts yet..</h1>
        <?php
        }
        ?>

        <div id="modal_post">
            <form action="#" method="post" border="1px solid dodgerblue">
                <div id="new_post_form">
                    <legend>
                        <h1>Add a new post</h1>
                    </legend>
                    <hr id="hr" />
                    <label for="name"><b>Name</b></label> <span class="error"><?= $name_error ?></span>
                    <input type="text" class="shortType" placeholder="Enter Name" name="name" value="<?= $n ?>" />
                    <label for="e_mail"><b>Email</b></label> <span class="error"><?= $email_error ?></span>
                    <input type="text" class="shortType" placeholder="Enter Email" name="email" value="<?= $e ?>" />
                    <label for="desc"><b>Description</b></label>
                    <span class="error"><?= $desc_error ?></span>
                    <textarea type="text" class="longType" placeholder="Give Description of topic" rows="5" cols="40" name="desc"><?= $ds ?></textarea>
                    <button type="submit" id="submit_button" name="new_submit">Submit</button>
                </div>
            </form>
        </div>


    </main>
    <footer>
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
</body>

</html>
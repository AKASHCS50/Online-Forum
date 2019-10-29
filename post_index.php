<?php include('post_validation.php');
$t = $_GET["openS"];
$ts = $_GET["rS"]; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Discuss X</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/post.css">
</head>

<body>

    <header>
        <h1>DiscussX</h1>
        <p>
            Online Discussion Forum
        </p>
    </header>
    <main>
        <h2><?= $ts ?> <?= $t ?></h2>
        <?php
        $db = mysqli_connect('localhost:3307', 'root', '', 'discussx') or die('Could not connect to database');
        $extract = "SELECT * FROM `$t`;";
        $res = mysqli_query($db, $extract);
        $res_check = mysqli_num_rows($res);

        if ($res_check > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <article>
                    <h3><?= $row['post_username'] ?> - <?= $row['post_date_of_creation'] ?>
                        - <?= $row['post_email'] ?></h3>
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
</body>

</html>
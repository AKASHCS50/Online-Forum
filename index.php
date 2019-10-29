<?php include('form_validation.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DiscussX</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>DiscussX</h1>
        <p>
            Online Discussion Forum
        </p>
    </header>
    <main>
        <h2>Add new topic<br /> <button id="new_topic_button" onclick="document.getElementById('modal').style.display='block'">+</button> </h2>
        <br /><br />

        <?php
        $db = mysqli_connect('localhost:3307', 'root', '', 'discussx') or die('Could not connect to database');
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
    </main>
    <div id="modal">
        <form action="" method="post" border="1px solid dodgerblue">
            <div id="new_topic_form">
                <legend>
                    <h1>Add a new topic</h1>
                </legend>
                <hr id="hr" />
                <label for="title"><b>Topic Title</b></label><span class="error"><?= $title_error ?></span>
                <input type="text" class="shortType" placeholder="Enter Topic Title" name="title" value="<?= $t ?>" autofocus />
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
    <footer>
        <h2>&copy; DiscussX platform
            <script>
                document.write(new Date().getFullYear());
            </script>
        </h2>
    </footer>


</body>

</html>
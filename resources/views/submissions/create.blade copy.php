<x-layout>
    <div class="container mt-5">
        <h1>Submit a New Paper</h1>
    </div>
    <div class = "container mt-5">
        <div class = "row">

            <?php
                    if(isset($_GET["error"])){
                        $id = $_GET["author_id"];
                        $stmt = $db->prepare("SELECT *, users.id as user_id, papers.title as title, papers.abstract as abstract, papers.paper_type as type FROM users LEFT JOIN papers on users.id = papers.user_id WHERE users.id = $id ");
                        $stmt->execute();
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
            <div class = "col">
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name = "author"
                        value = "<?php echo $user['name']; ?> " disabled>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name = "email"
                        aria-describedby="emailHelp" value = "<?php echo $user['email']; ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Affiliate</label>
                    <input type="text" class="form-control" id="affiliate" name = "affiliate"
                        value = "<?php echo $user['affiliate']; ?>" disabled>
                </div>
                <?php if(empty($user['title'])){ ?>
                <div>
                    <p> You have already provided the author information. Do you want to continue to submit the paper?
                    </p>
                </div>
                <a type = "button" class = "btn btn-sm btn-outline-success"
                    href = "./new_paper.php?new_author=<?php echo $user['user_id']; ?>"> Submit paper </a>
                <a href = "../submission.php" type = "button" class = "btn btn-sm btn-outline-danger"> Cancel </a>

                <?php }else {?>
                <div>
                    <p id = "info"> You have already submitted the paper.</p>
                </div>
                <button type = "button" class = "btn btn-sm btn-outline-success" id = "show_paper"> Show Paper </button>

                <?php } ?>

            </div>
            <div class = "col" id = "paper_info">
                <table class = "table table-reponsive">
                    <tr>
                        <th>Paper Title</th>
                    </tr>
                    <tr>
                        <td><?php echo $user['title']; ?></td>
                    </tr>
                    <tr>
                        <th>Abstract</th>
                    </tr>
                    <tr>
                        <td><?php echo $user['abstract']; ?></td>
                    </tr>
                </table>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href = "../submission.php" class = "btn btn-sm btn-secondary">Back to Submission</a>
                </div>

            </div>
            <?php } else if (isset($_GET["new_author"])){
                        $id = $_GET["new_author"];
                        $stmt = $db->prepare("SELECT * FROM users  WHERE id = $id ");
                        $stmt->execute();
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
            <div class = "col">
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name = "author"
                        value = "<?php echo $user['name']; ?> " disabled>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name = "email"
                        aria-describedby="emailHelp" value = "<?php echo $user['email']; ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Affiliate</label>
                    <input type="text" class="form-control" id="affiliate" name = "affiliate"
                        value = "<?php echo $user['affiliate']; ?>" disabled>
                </div>
            </div>
            <div class = "col">
                <form method="post" action="engine.php">
                    <input type="text" class="form-control" id="author" name = "author"
                        value = "<?php echo $user['id']; ?>  " hidden>
                    <div class="mb-3">
                        <label for="papertype" class="form-label">Type of paper</label> <select class="form-select"
                            id = "type" name ="type" required>
                            <option selected>Select the paper type</option>
                            <option value="1">Paper</option>
                            <option value="2">Working Group</option>
                            <option value="3">Poster</option>
                            <option value="4">Doctorial Consortium</option>
                            <option value="5">Tips, Techniques and Courseware</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" min = "0" class="form-control" name="title" id="title"
                            required>

                    </div>
                    <div class="mb-3">
                        <label for="abstract" class="form-label">Abstract</label>
                        <input type="textarea" min = "0" class="form-control" name="abstract"
                            id="abstract""required>

                    </div>
                    <a href = "../submission.php" class = "btn btn-sm btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-primary" id = "add_paper" name = "add_paper">Add
                        paper</button>
                </form>

            </div>


            <?php }else{?>
            <div class = "col">
                <form method="post" action="engine.php">
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author" name = "author">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name = "email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Affiliate</label>
                        <input type="text" class="form-control" id="affiliate" name = "affiliate">
                    </div>
                    <a href = "../submission.php" class = "btn btn-sm btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-primary" id = "next"
                        name = "next">Next</button>
                </form>
            </div>
            <?php }?>
        </div>


    </div>

    </div>
    </div>


    <script type="text/javascript">
        $('#paper_info').hide();

        $('#show_paper').on('click', function() {
            $(this).hide();
            $("#info").hide();
            $('#paper_info').show();

        });
    </script>
</x-layout>

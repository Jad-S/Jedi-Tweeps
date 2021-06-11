<?php
/*
 * CSCI 2170: ONLINE EDITION, WINTER 2021
 * STARTER CODE FOR ASSIGNMENT 3
 *
 * This code was developed by Dr. Raghav V. Sampangi (raghav@cs.dal.ca)
 *
 * Blog page: read data from the DB and display the contents.
 */
//this code has been modified by Nafiz Mazumder
require_once "includes/header.php";
require_once "includes/db.php";
if (!isset($_SESSION['juname'])) {
    // access control
    header("Location:index.php?noaccess=1");
    die();
}
?>
<main id="pg-main-content">
    <div class ="content-position">
    <div class="container">
        <section class="space-above-below">
            <h2 class="posted-content fw-light ">Share your thoughts.</h2>

            <form method="post" action="includes/process-blog.php">
                <div class="form-row">
                    <div class="form-group">
                        <label for="blog-title">Blog Title</label>
                        <input type="text" class="form-control" id="blog-title" name="blog-title"
                            placeholder="Enter blog title here..." required>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="form-group">
                        <label for="input-category">Blog Category</label>
                        <input type="text" class="form-control" id="input-category" name="blog-category"
                            placeholder="Enter blog category here... (multiple categories must be separated by semi-colons)" required>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="input-blog">Address</label>
                    <textarea class="form-control" id="input-blog" name="blog-content"
                        placeholder="Enter blog content here..." rows="10" required></textarea>
                </div>
                <br>
                <input type="submit" name="submit-blog" class="viewButton" value="Submit blog">
                <button type="button" class="viewButton color" onclick="checkRedirect()">Cancel &amp; go to homepage</button>
            </form>
        </section>
    </div>
    </div>

</main>

<script src="js/scripts.js"></script>

<?php
require_once "includes/footer.php";
?>
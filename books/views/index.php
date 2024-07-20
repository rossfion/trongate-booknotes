<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Trongate-BookNotes</title>
    </head>
    <body>
        <section>
            <h1>Welcome to BookNotes (Trongatified)</h1>
            <p>This is a reworking of a <a href="https://github.com/rossfion/capstone-project-5" target="_blank">Node.js-based project</a> I built for Udemy Instructor Dr. Angela Yu's <a href="https://www.udemy.com/course/the-complete-web-development-bootcamp/" target="_blank">Web Developer Bootcamp</a>. It is inspired by <a href="https://sive.rs/book" target="_blank">David Siver's own website</a> devoted to documenting all the non-fiction books he has read with some information about them. The covers are courtesy of the <a href="https://openlibrary.org/dev/docs/api/covers" target ="_blank">Open Library Book Covers API</a>. This site is built with the Trongate PHP Framework and MySQL. Styling from Trongate CSS.</p> 
            <p><a href="https://openlibrary.org/">Courtesy link to the Open Library</a></p>
            <div class ="form-button-container">
                <form method="post" action="<?php echo BASE_URL; ?>books/most_recent" enctype="multipart/form-data"><button class="btn btn-primary btn-btn-small" name="most-recent">Sort by most recent</button></form> | <form method="post" action="<?php echo BASE_URL; ?>books/titles"><button class="btn btn-success btn-btn-small" name="book-titles">Sort by title</button></form>
            </div>
            <hr>

        </section>    
        <section>
            <?php echo Pagination::display($pagination_data); ?>
            <?php if (count($rows) > 0) { ?>
                <div class="row">
                    <?php
                    foreach ($rows as $row) {
                        $book_id = $row->id;
                        $book_title = $row->book_title;
                        $book_url = $row->book_url;
                        $book_cover_image = $row->book_cover_image;
                        $book_notes = substr($row->book_notes, 0, 200);
                        $date_read = $row->date_read;
                        $view_book_url = BASE_URL . "books/show/" . $book_id;
                        ?>

                        <div class='col-lg-2 pull-left' id='image_div'><a href='<?php echo $view_book_url; ?>'><img src='<?php echo $book_cover_image; ?>'></a></div>
                        <div class='col-lg-10 pull-right' id='notes'>
                            <h2><a href='<?php echo $view_book_url; ?>'><?php echo $book_title; ?></a></h2>
                            <h5>DATE READ: <?php echo $date_read; ?></h5>
                            <p><?php echo $book_notes; ?> ...</p>

                            <a href='<?php echo $view_book_url; ?>' class='btn btn-info'>More Notes...</a>

                        </div>

                    <?php } ?>
                </div>
            <?php } ?>
        </section>
    </body>
</html>
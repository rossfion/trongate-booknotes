<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Trongate-BookNotes | Results By Title</title>
    </head>
    <body>
        <section>
            <h1>Sorted by Book Title</h1>
            <p>This page lists books in alphabetical order and by the date they were added to the database.</p> 
            <p><a href="https://openlibrary.org/">Courtesy link to the Open Library</a></p>

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
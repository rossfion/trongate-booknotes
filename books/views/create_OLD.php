<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?= $form_location ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="book_title">Book Title</label>
				 
                  <input type="text" class="form-control" id="book_title" name="book_title" placeholder="Enter book title" autocomplete = "on">
                </div>
                <div class="form-group">
                  <label for="book_subtitle">Book Subtitle</label>
                  <input type="text" class="form-control" id="book_subtitle" name="book_subtitle"  placeholder="Enter book subtitle" autocomplete = "on">
                </div>
				<div class="form-group">
                  <label for="book_edition">Book Edition</label>
                  <input type="text" class="form-control" id="book_edition" name="book_edition" placeholder="Enter book edition" autocomplete = "on">
                </div>
				
				<!-- select dropdown for authors' names-->
				
				<div class="form-group">
						<label for="author_name">Author</label>
						
						<select id="author_name" name="author_id" class="form-control">
							<option value="">Select Author</option>
							<?= Modules::run('authors/get_all_authors'); ?>
							
						</select>
					</div>
				
                
				
				
				<!-- select dropdown for publishers' names-->
				
                <div class="form-group">
						<label for="publisher_name">Publisher</label>
						<select id="publisher_name" name="publisher_id" class="form-control">
							<option value="">Select Publisher</option>
							<?= Modules::run('publishers/get_all_publishers'); ?>
						</select>
					</div>
				
				<!-- select dropdown for categories-->
				
                <div class="form-group">
						<label for="category_name">Category</label>
						<select id="category_name" name="category_id" class="form-control">
							<option value="">Select Category</option>
							<?= Modules::run('categories/get_all_categories'); ?>
						</select>
					</div>
				
				<div class="form-group">
                  <label for="publication_year">Year of Publication</label>
                  <input type="text" class="form-control" id="publication_year" name="publication_year" placeholder="Enter publication_year as 4 digits" autocomplete = "on">
                </div>
				<div class="form-group">
                  <label for="book_isbn">Book ISBN</label>
                  <input type="text" class="form-control" id="book_isbn" name="book_isbn" placeholder="Enter book ISBN" autocomplete = "on">
                </div>
				<div class="form-group">
                  <label for="book_url">Book URL</label>
                  <input type="text" class="form-control" id="book_url" name="book_url" placeholder="Enter book URL" autocomplete = "on">
                </div>
				
				
				
				<!-- link to Open Library Covers API for relevant image link-->
                <div class="form-group">
                  <label for="book_cover_image">Link to Book Cover</label>
                  <input type="text" id="book_cover_image" name="book_cover_image" autocomplete = "on" class="form-control">
                </div>
				
				<div class="form-group">
                  <label for="date_read">Date Read</label>
                  <input type="date" class="form-control" id="date_read" name="date_read" placeholder="Enter the date you finished reading this book" autocomplete = "on">
                </div>
				
				
				<!-- textarea/include Summernote or other text editor here -->
                <div class="form-group">
                  <label for="book_notes">My Notes</label>
                  <textarea class="form-control" rows="3" id="summernote" name="book_notes" placeholder="Enter my notes about this book ..."></textarea>
				  
                </div>
				
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
		  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
<div class="modal fade" id="add-edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <form method="post" action="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-wrap">
                    
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Title" name="title" required>
                            <small class="error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control" placeholder="Slug" name="slug" >
                            <small class="error-msg"></small>
                        </div>
                        <!-- <div class="form-group checkbox-fg">
                            <label class="m-label">Is Front Page</label>
                            <input type="checkbox" class="form-control"  name="is_front_page"  id="is_front_page" value="1" >
                            <label for="membership" class="c-label">Yes</label>
                            <small class="error-msg"></small>
                        </div> -->
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" class="form-control" id="html-editor" placeholder="Content"></textarea>
                            <small class="error-msg"></small>
                        </div>
                        <div class="form-group img-f-g">
                            <label>Featured Image</label>
                            <input type="file" name="featured_image" accept="image/*"   />
                            <small class="error-msg"></small>
                        </div>
                        
                        <div class="cf-wrap form-group ">                        
                            
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    {{ csrf_field() }}
                    <input type="hidden" name="_status">
                    <input type="hidden" name="_featured_image">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" name="submit" value="Publish">
                </div>
                <div class="card mb-4 c-msg border-left-success">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
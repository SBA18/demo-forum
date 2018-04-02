<div class="modal fade" id="edit_topic_modale" tabindex="-1" role="dialog" aria-labelledby="edit_topic_modale" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Topic</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>

            <div class="form-group">
                <label for="message-text" class="col-form-label">Topic Message:</label>
                <textarea class="form-control" id="message-text" rows="15">{{ $topic->message }}</textarea>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Update</button>
        </div>
        </div>
    </div>
</div>
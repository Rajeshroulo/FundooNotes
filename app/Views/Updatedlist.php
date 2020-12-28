<?php if ($notes) : ?>
    <?php foreach ($notes as $note) : ?>
            <div class="cards">
                <div class="card-blocks">
                    <h5 class="card-titles"><?php echo $note['title']; ?></h5>

                    <div class="card-body">
                        <?php echo $note['note']; ?>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $note['id']; ?>">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                            <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?php echo $note['id']; ?>">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="modal" id="editModal<?php echo $note['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Note</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form id="editthenote<?php echo $note['id']; ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="noteid" value="<?php echo $note['id']; ?>">
                                        <label>Title</label>
                                        <input type="text" name="title" placeholder="enter title" class="form-control" value="<?php echo $note['title']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Note</label>
                                        <input type="text" name="note" placeholder="enter notes" class="form-control" value="<?php echo $note['note']; ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" name="Save" class="btn btn-primary">Save </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {

                        $("#editthenote<?php echo $note['id']; ?>").submit(function(event) {
                            // Prevent the form from submitting via the browser.
                            event.preventDefault();
                            editNote();
                        });

                        function editNote() {
                            var formData = $('#editthenote<?php echo $note['id']; ?>').serialize();

                            $.ajax({
                                type: "POST",
                                url: "<?= site_url('/editnote') ?>",
                                data: formData,
                                success: function(result) {
                                    $("#editthenote<?php echo $note['id']; ?>")[0].reset();
                                    $("#editModal<?php echo $note['id']; ?>").modal('toggle');

                                },
                                error: function() {
                                    alert("failed to edit the note");
                                }
                            });
                        }

                    });
                </script>


            </div>
    <?php endforeach; ?>
<?php endif; ?>
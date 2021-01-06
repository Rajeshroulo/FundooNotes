<?php if ($notes) : ?>
    <?php foreach ($notes as $note) : ?>
        <div class="col-sm-4" id="note<?php echo $note['id']; ?>">
            <div class="cards">
                <div class="card-blocks">
                    <h5 class="card-titles"><?php echo $note['title']; ?></h5>

                    <div class="card-body">
                        <?php echo $note['note']; ?>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <?php
                            if ($note['archive'] == false) {
                            ?>
                                <a href="" id="archivenote<?php echo $note['id']; ?>" class="btn btn-default btn-rounded">
                                    <span title="archive" class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span>
                                </a>
                            <?php  } else { ?>
                                <a href="" id="unarchivenote<?php echo $note['id']; ?>" class="btn btn-default btn-rounded">
                                    <span title="unarchive" class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span>
                                </a>
                            <?php  } ?>
                            <a href="" class="btn btn-default btn-rounded">
                                <span title="Add image" class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                            </a>

                            <?php
                            if ($note['trash'] == false) {
                            ?>
                                <a href="" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#editModal<?php echo $note['id']; ?>">
                                    <span title="edit" class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </a>
                                <a href="" id="trashnote<?php echo $note['id']; ?>" class="btn btn-default btn-rounded">
                                    <span title="move to trash" class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>

                            <?php  } else { ?>
                                <a href="" id="restorenote<?php echo $note['id']; ?>" class="btn btn-default btn-rounded">
                                    <span title="restore" class="glyphicon glyphicon-upload" aria-hidden="true"></span>
                                </a>
                                <a href="" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#deleteModal<?php echo $note['id']; ?>">
                                    <span title="delete" class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                            <?php  } ?>

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


                <div class="modal" id="deleteModal<?php echo $note['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"> Are you sure you want to permanently delete this</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form id="deletethenote<?php echo $note['id']; ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="noteid" value="<?php echo $note['id']; ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>No</button>
                                    <button type="submit" name="Delete" class="btn btn-danger"><i class="fa fa-trash"></i>Delete </button>
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

                        $("#deletethenote<?php echo $note['id']; ?>").submit(function(event) {
                            // Prevent the form from submitting via the browser.
                            event.preventDefault();
                            id = <?php echo $note['id']; ?>;
                            deleteNote(id);
                        });

                        $("#archivenote<?php echo $note['id']; ?>").click(function(event) {
                            // Prevent the form from submitting via the browser.
                            event.preventDefault();
                            id = <?php echo $note['id']; ?>;
                            archive(id);
                        });

                        $("#unarchivenote<?php echo $note['id']; ?>").click(function(event) {
                            // Prevent the form from submitting via the browser.
                            event.preventDefault();
                            id = <?php echo $note['id']; ?>;
                            unarchive(id);
                        });

                        $("#trashnote<?php echo $note['id']; ?>").click(function(event) {
                            // Prevent the form from submitting via the browser.
                            event.preventDefault();
                            id = <?php echo $note['id']; ?>;
                            trash(id);
                        });

                        $("#restorenote<?php echo $note['id']; ?>").click(function(event) {
                            // Prevent the form from submitting via the browser.
                            event.preventDefault();
                            id = <?php echo $note['id']; ?>;
                            restore(id);
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
                                    $("#note<?php echo $note['id']; ?>").html(result);

                                },
                                error: function() {
                                    alert("failed to edit the note");
                                }
                            });
                        }

                        function deleteNote(id) {
                            var formData = $('#deleteanote<?php echo $note['id']; ?>').serialize();

                            $.ajax({
                                type: "POST",
                                url: "<?= site_url('/deletenote') ?>",
                                formdata: formData,
                                data: {
                                    noteid: id
                                },
                                success: function(formdata, data) {
                                    $("#note<?php echo $note['id']; ?>").remove();
                                    $("#deletethenote<?php echo $note['id']; ?>")[0].reset();
                                    $("#deleteModal<?php echo $note['id']; ?>").modal('toggle');

                                },
                                error: function() {
                                    alert("failed to delete the note");
                                }
                            });
                        }

                        function archive(id) {

                            $.ajax({
                                url: "<?= site_url('/archive') ?>",
                                method: "POST",
                                data: {
                                    noteid: id
                                },
                                success: function(data) {
                                    $("#note<?php echo $note['id']; ?>").remove();
                                },
                                error: function() {
                                    alert("Failed to archive note");
                                }
                            });
                        }

                        function unarchive(id) {

                            $.ajax({
                                url: "<?= site_url('/unarchive') ?>",
                                method: "POST",
                                data: {
                                    noteid: id
                                },
                                success: function(data) {
                                    $("#note<?php echo $note['id']; ?>").remove();
                                },
                                error: function() {
                                    alert("Failed to archive note");
                                }
                            });
                        }

                        function trash(id) {

                            $.ajax({
                                url: "<?= site_url('/trash') ?>",
                                method: "POST",
                                data: {
                                    noteid: id
                                },
                                success: function(data) {
                                    $("#note<?php echo $note['id']; ?>").remove();
                                },
                                error: function() {
                                    alert("Failed to trash note");
                                }
                            });
                        }

                        function restore(id) {

                            $.ajax({
                                url: "<?= site_url('/restore') ?>",
                                method: "POST",
                                data: {
                                    noteid: id
                                },
                                success: function(data) {
                                    $("#note<?php echo $note['id']; ?>").remove();
                                },
                                error: function() {
                                    alert("Failed to restore note");
                                }
                            });
                        }

                    });
                </script>

            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
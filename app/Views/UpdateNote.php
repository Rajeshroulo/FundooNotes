<div class="col-sm-4">
            <div class="cards">           
      <input type="hidden" name="editnote" id="editnote" value="<?php echo $notesModel['id']; ?>">
                <div class="card-blocks">
                    <h5 class="card-titles"><?php echo $updatednote['title']; ?></h5>

                    <div class="card-body">
                        <?php echo $updatednote['note']; ?>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                            <a href="" class="btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
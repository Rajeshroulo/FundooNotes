<?php if ($notes) : ?>
    <?php foreach ($notes as $note) : ?>
        <div class="col-sm-4">
            <div class="cards">
                <div class="card-blocks">
                    <h5 class="card-titles"><?php echo $note['title']; ?></h5>
                    
                    <div class="card-texts">
                        <?php echo $note['note']; ?>
                    </div>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                    <a href="" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
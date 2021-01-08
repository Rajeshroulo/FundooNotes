<?php if ($labels) : ?>
    <?php foreach ($labels as $label) : ?>
       
  <div style="float: left;">
    <a href="" class="btn btn-default">
        <i class="fa fa-tag"></i> <?php echo $label['labelname']; ?>
    </a>
  </div>

<?php endforeach; ?>
<?php endif; ?>
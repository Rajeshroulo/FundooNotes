<!DOCTYPE html>
<html>

<head>
    <title>Google keep</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body>
    <div class="container-fluid bg-purple shadow-sm">
        <div class="container pb-2 pt-2">
            <div class="text-white h4">Fundoo Notes</div>
        </div>
    </div>
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-purple text-white">
                        <div class="card-header-title">Add note </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" placeholder="enter title"  class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>Notes</label>
                            <input type="text" placeholder="enter notes" class="form-control" value="">
                        </div>   
                        <div class="modal-footer">                    
                        <button type="submit" class="btn btn-primary">Save</button> 
                        </div>                                              
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
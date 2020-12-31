<html>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<head>
    <title>
        Dashboard
    </title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/popper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <script>
        $(function() {

            $('#slide-submenu').on('click', function() {
                $(this).closest('.list-group').fadeOut('slide', function() {
                    $('.mini-submenu').fadeIn();
                });

            });

            $('.mini-submenu').on('click', function() {
                $(this).next('.list-group').toggle('slide');
                $('.mini-submenu').hide();
            })
        })
    </script>

    <style>
        .cards {
            font-size: 1em;
            overflow: hidden;
            border-radius: .28571429rem;
            box-shadow: 0 1px 3px 0 #1c1c1f, 0 0 0 1px #1c1c1f;
            margin-bottom: 20px;
        }

        .card-blocks {
            font-size: 1em;
            position: relative;
            margin: 0;
            padding: 4px;
            border: 1px;
            box-shadow: none;
        }

        .card-img-top {
            display: block;
            width: 100%;
            height: auto;
        }

        .card-titles {
            font-size: 1.28571429em;
            font-weight: 300;
            line-height: 1.2857em;
        }

        .card-footer {
            font-size: 1em;
            position: static;
            top: 0;
            left: 0;
            max-width: 100%;
            padding: .75em 1em;
            color: rgba(0, 0, 0, .4);
            border-top: 1px solid rgba(0, 0, 0, .05) !important;
            background: #fff;
            margin-bottom: 15px;
        }

        .card-inverse .btn {
            border: 1px solid rgba(0, 0, 0, .05);
        }

        .profile {
            position: absolute;
            top: -12px;
            display: inline-block;
            overflow: hidden;
            box-sizing: border-box;
            width: 25px;
            height: 25px;
            margin: 0;
            border: 1px solid #fff;
            border-radius: 50%;
        }

        .profile-avatar {
            display: block;
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .profile-inline {
            position: relative;
            top: 0;
            display: inline-block;
        }

        .profile-inline~.card-title {
            display: inline-block;
            margin-left: 4px;
            vertical-align: top;
        }

        .text-bold {
            font-weight: 700;
        }

        .meta {
            font-size: 1em;
            color: rgba(0, 0, 0, .4);
        }

        .meta a {
            text-decoration: none;
            color: rgba(0, 0, 0, .4);
        }

        .meta a:hover {
            color: rgba(0, 0, 0, .87);
        }

        .mini-submenu {
            display: none;
            background-color: rgba(0, 0, 0, 0);
            border: 1px solid rgba(0, 0, 0, 0.9);
            border-radius: 4px;
            padding: 9px;
            /*position: relative;*/
            width: 42px;

        }

        .mini-submenu:hover {
            cursor: pointer;
        }

        .mini-submenu .icon-bar {
            border-radius: 1px;
            display: block;
            height: 2px;
            width: 22px;
            margin-top: 3px;
        }

        .mini-submenu .icon-bar {
            background-color: #000;
        }

        #slide-submenu {
            background: rgba(0, 0, 0, 0.45);
            display: inline-block;
            padding: 0 8px;
            border-radius: 4px;
            cursor: pointer;
        }



        html {
            font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        h5 {
            font-size: 1.28571429em;
            font-weight: 700;
            line-height: 1.2857em;
            margin: 0;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="container-fluid bg-purple shadow-sm">
            <div class="container pb-2 pt-2">
                <div class="text-white h4">Fundoo Notes</div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <a href="#" data-toggle="modal" data-target="#basicModal" class="btn btn-primary">Add Note</a>
                </div>

                <div class="modal" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"> Add Note</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form id="addnote">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" placeholder="enter title" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <input type="text" name="note" placeholder="enter notes" class="form-control" value="">
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
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-sm-4 col-md-3 sidebar">
                    <div class="mini-submenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div>
                    <div class="list-group">
                        <span href="#" class="list-group-item active">
                            Dashboard
                            <span class="pull-right" id="slide-submenu">
                                <i class="fa fa-times"></i>
                            </span>
                        </span>
                        <a href="" id="notes" class="btn btn-default">
                            <i type="button" class="fa fa-list"></i> Notes
                        </a>
                        <a href="#" class="btn btn-default" data-toggle="modal" data-target="#editModal">
                            <i class="fa fa-edit"></i> Label
                        </a>
                        <a href="<?= site_url('/showarchive') ?>" id ="archivelist" class="btn btn-default">
                            <i class="fa fa-archive"></i> Archive
                        </a>
                        <a href="#" class="btn btn-default">
                            <i class="fa fa-trash-o"></i> Trash
                        </a>
                        <a href="<?= site_url('/logout') ?>" class="btn btn-default" >
                                <i class="fa fa-user"></i>Logout
                            </a>

                    </div>

                </div>


                <div class="col-sm-9">
                    <div class="container">
                        <div class="row" id="noteadd">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                noteList();
            }, 30);

            $("#notes").click(function(event) {
                // Prevent the form from submitting via the browser.
                event.preventDefault();
                noteList();

            });

            $("#addnote").submit(function(event) {
                // Prevent the form from submitting via the browser.
                event.preventDefault();
                noteAdd();

            });

            function noteList() {

                $.ajax({
                    type: "GET",
                    url: "<?= site_url('/notelist') ?>",
                    success: function(result) {
                        $("#noteadd").html(result);
                    },
                    error: function(e) {
                        alert("Error!")
                        console.log("ERROR: ", e);
                    }
                });
            }

            function singleNote(id) {

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('/onenote') ?>",
                    data: {
                        noteid: id
                    },
                    success: function(result) {
                        $("#noteadd").append(result);
                    },
                    error: function(e) {
                        alert("Error!")
                        console.log("ERROR: ", e);
                    }
                });
            }


            function noteAdd() {
                // PREPARE FORM DATA
                var formData = $("#addnote").serialize();

                // DO POST
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('/addthenote') ?>",
                    data: formData,
                    success: function(result) {
                        singleNote(result);
                        $("#addnote")[0].reset();
                        $('#basicModal').modal('toggle');

                    },
                    error: function(e) {
                        alert("Error!")
                        console.log("ERROR: ", e);
                    }
                });
            }

        });
    </script>

</body>

</html>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 from-wrapper">
            <div class="container">
                <h3>Register</h3>
                <hr>
                <form action="<?= site_url('/submit') ?>" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="name">FirstName</label>
                                <input type="text" class="form-control" name="name" value="<?= set_value('firstname') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="lastname">LastName</label>
                                <input type="text" class="form-control"  name="lastname" value="<?= set_value('lastname') ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                        <div class="footer">
                        <div class="col-12 col-sm-8 text-right">
                            <a href="<?=site_url('/login') ?>">already have an account?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

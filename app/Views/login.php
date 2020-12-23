
<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 from-wrapper">
            <div class="container">
                <h3>Login</h3>
                <hr>
                <form action="<?= site_url('/user') ?>" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="enter email" value="<?= set_value('email') ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="enter password" value="">
                    </div>
                    <div class="modal-footer">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="col-12 col-sm-8 ">
                            <a href="<?=site_url('/register') ?>">create new account!</a>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>


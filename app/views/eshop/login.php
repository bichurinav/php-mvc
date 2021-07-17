<?php $this->view('header', $data) ?>
	<section id="form"><!--form-->
		<div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="#">
                            <input type="text" placeholder="Name" />
                            <input type="email" placeholder="Email Address" />
                            <span>
                                <input type="checkbox" class="checkbox">
                                Keep me signed in
                            </span>
                            <div>
                                <a href="<?=ROOT?>signup">
                                    Don`t have a account? Sign up
                                </a>
                            </div>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
		</div>
	</section><!--/form-->
<?php $this->view('footer', $data) ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="<?=base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css')?>">
        <link rel="stylesheet" type="text/css" href="<?=base_url('vendor/datatables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css')?>">



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?=base_url('vendor/twbs/bootstrap/dist/js/jquery.min.js')?>"></script>
        <script src="<?=base_url('vendor/twbs/bootstrap/dist/js/popper.min.js')?>"></script>
        <script src="<?=base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js')?>"></script>

        <script src="<?=base_url('vendor/datatables/datatables.min.js')?>"></script>
        <script src="<?=base_url('vendor/datatables/DataTables-1.10.22/js/dataTables.bootstrap4.min.js')?>"></script>

        <title>Login</title>
    </head>
    <body>

    <style>

    </style>

        <div class="container">

            <div class="row align-items-center" style="margin-top:50px;">
                <div class="col"></div>
                <div class="col align-items-center">
                    <?php if($this->session->msg != null || $this->session->msg != ""){ ?>
                        <div class="alert <?php if($this->session->type == ""){ echo "alert-danger"; } else { echo $this->session->type; } ?>" role="alert">
                            <?=$this->session->msg?>
                        </div>
                    <?php } ?>
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Login</h5> -->
                            <center><img width="200" src="<?=base_url('assets/image/logo2.png')?>"/></center>
                            <form method="post" action="<?php echo base_url(). 'login/check'; ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                                <a href="<?php echo base_url(). 'login/register'; ?>" class="btn btn-link">Register</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>

        </div>

    </body>
</html>
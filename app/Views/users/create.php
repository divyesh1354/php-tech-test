<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Create User</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> <span class='fw-300'>Create User</span>
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <?php
                $session = \Config\Services::session();
                if($session->getFlashdata('success')) {
                    echo '<div class="alert alert-success">'.$session->getFlashdata("success").'</div>';
                }
            ?>
            <div id="panel-1" class="panel">
                <div class="panel-container show">
                    <div class="panel-content">
                        <form id="frmCreateUser" method="post" action="<?php echo base_url('users/store') ?>">
                            <div class="form-group">
                                <label class="form-label" for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="mobile">Mobile</label>
                                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile">
                            </div>
                            <button class="btn btn-primary waves-effect waves-themed" type="submit">Create User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  
<script>
    $(document).ready(function() {
        if ($("#frmCreateUser").length > 0) {
            $("#frmCreateUser").validate({
                rules: {
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        maxlength: 60,
                        email: true,
                    },
                    mobile: {
                        required: true,
                        maxlength: 12,
                        number: true,
                    },
                    password: {
                        required: true
                    },
                    username: {
                        required: true
                    },
                },
                messages: {
                    first_name: {
                        required: "First Name is required.",
                    },
                    last_name: {
                        required: "Last Name is required.",
                    },
                    email: {
                        required: "Email is required.",
                        email: "It does not seem to be a valid email.",
                        maxlength: "The email should be or equal to 60 chars.",
                    },
                    mobile: {
                        required: "Mobile is required.",
                        number: "It does not seem to be a valid number.",
                        maxlength: "The email should be or equal to 12.",
                    },
                    password: {
                        required: "Password is required."
                    },
                    username: {
                        required: "Username is required."
                    },
                },
            })
        }
    });
</script>

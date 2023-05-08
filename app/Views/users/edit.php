<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Edit User</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> <span class='fw-300'>Edit User</span>
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
                        <form id="frmEditUser" method="post" action="<?php echo base_url('users/update') ?>">
                            <input type="hidden" name="user_id" value="<?php echo $data['user']['id']; ?>" />
                            <div class="form-group">
                                <label class="form-label" for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $data['user']['first_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $data['user']['last_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $data['user']['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control" value="<?php echo $data['user']['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="mobile">Mobile</label>
                                <input type="text" id="mobile" name="mobile" class="form-control" value="<?php echo $data['user']['mobile'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="is_active">Status</label>
                                <select id="is_active" name="is_active" class="form-control">
                                    <option value="1" <?php echo ($data['user']['is_active'] == 1) ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo ($data['user']['is_active'] == 0) ? 'selected' : '' ?>>Inactive</option>
                                </select>
                            </div>
                            <button class="btn btn-primary waves-effect waves-themed" type="submit">Edit User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  
<script>
    $(document).ready(function() {
        if ($("#frmEditUser").length > 0) {
            $("#frmEditUser").validate({
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
                    username: {
                        required: "Username is required."
                    },
                },
            })
        }
    });
</script>

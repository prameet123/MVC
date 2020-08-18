<html>

<head>
    <title>Student Form</title>
    <link href="<?php echo base_url(); ?>assets/css/custom-style.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
</head>

<body>
    <div>
        <div class="container">
            <h2>Student form</h2>
            <form enctype="multipart/form-data" method="post" action="<?php echo site_url('Student/form'); ?>" role="form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="varchar">First Name <?php echo form_error('first_name') ?></label>
                        <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="<?php echo set_value('first_name'); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="<?php echo set_value('last_name'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group col-md-6">
                        <label for="varchar">Parent Name <?php echo form_error('parent_name') ?></label>
                        <input type="text" class="form-control" id="parent_name" placeholder="Parent Name" name="parent_name" value="<?php echo set_value('parent_name'); ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="varchar">City <?php echo form_error('city') ?></label>
                        <input type="text" class="form-control" id="city" placeholder="enter city" name="city" value="<?php echo set_value('city'); ?>">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="varchar">State <?php echo form_error('state') ?></label>
                            <input type="text" class="form-control" id="state" placeholder="enter state" name="state" value="<?php echo set_value('state'); ?>" />
                        </div>

                        <div class="form-group col-md-4">
                            <label for="varchar">Courses <?php echo form_error('course') ?></label>
                            <select id="course" class="form-control" name="course" value="<?php echo set_value('course'); ?>">
                                <option value="">Select Courses</option>
                                <?php foreach ($courses as $cat) { ?>
                                    <option <?php if ($cat->course_id == set_value('course')) {
                                                echo 'selected="selected"';
                                            } ?> value="<?php echo $cat->course_id ?>"><?php echo $cat->course_name ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-8">
                            <label for="course">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value='male' <?php echo set_radio('gender', 'male', TRUE); ?> checked>
                                <label class="form-check-label" for="gender">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female" <?php echo set_radio('gender', 'female'); ?>>
                                <label class="form-check-label" for="gender">
                                    Female
                                </label>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
            </form>
        </div>
</body>

</html>
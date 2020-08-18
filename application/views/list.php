<html>

<head>
    <title>Student List</title>
    <link href="<?php echo base_url(); ?>assets/css/custom-style.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
</head>
<?php $start = 0; ?>


<body>
    <div style="margin-top: 20;margin-left: 120;">
        <?= anchor('Student/form', 'Add Student', ['class' => 'btn btn-primary'])  ?>
    </div>
    <div class="container" style="margin-top: 50;">

        <form enctype="multipart/form-data" method="post" action="<?php echo site_url('Student/lists'); ?>" role="form">
            <div class="table-responsive">

                <div class="form-row">

                    <div class="form-group col-md-3">
                        <input class="form-control mb-4" id="search" name="search" type="text" placeholder="Enter searching keyword" value="<?php echo set_value('search'); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <input class="form-control mb-4" id="state" name="state" type="text" placeholder="Filter by State" value="<?php echo set_value('state'); ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <input class="form-control mb-4" id="city" name="city" type="text" placeholder="Filter by City" value="<?php echo set_value('city'); ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">

                        <select id="course" class="form-control" name="course" value="<?php echo set_value('course'); ?>">
                            <option value="">Select Courses</option>
                            <?php foreach ($course as $cat) { ?>
                                <option <?php if ($cat->course_id == set_value('course')) {
                                            echo 'selected="selected"';
                                        } ?>value="<?php echo $cat->course_id ?>"><?php echo $cat->course_name ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="course">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="male" <?php echo set_radio('gender', 'male', TRUE); ?> checked>
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
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Parent Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">State</th>
                                <th scope="col">City</th>
                                <th scope="col">Course</th>
                                <th scope="col">Registration On</th>
                            </tr>
                        </thead>
                        <tbody><?php foreach ($record as $re) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo ++$start ?></th>
                                    <td><?php echo $re->first_name ?></td>
                                    <td><?php echo $re->last_name ?></td>
                                    <td><?php echo $re->parent_name ?></td>
                                    <td><?php echo $re->gender ?></td>
                                    <td><?php echo $re->state ?></td>
                                    <td><?php echo $re->city ?></td>
                                    <td><?php echo $re->course_name ?></td>
                                    <td><?php echo $re->created_on ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <p style="margin-right: 50;"><?php echo $links; ?></p>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
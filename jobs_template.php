<h2><?php echo $title; ?></h2>

<div class='wpb_row vc_row-fluid vc_row inner_row  vc_row-o-equal-height vc_row-flex'>
    <div class='row_col_wrap_12_inner col span_12  left jobs'>
        <?php foreach ($jobs as $job) : ?>
            <div class='job vc_col-sm-4 wpb_column column_container vc_column_container col child_column no-extra-padding inherit_tablet inherit_phone'>
                <div class='vc_column-inner'>
                    <p><?php echo $job['job_location']; ?></p>
                    <h3> <?php echo $job['role_name']; ?></h3>
                    <p><?php echo $job['about_role']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
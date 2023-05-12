<div class="job-container ">
    <?php foreach ($filtered_jobs as $job) : ?>
        <?php if ($job['role_name'] != null) : ?>
            <h1> <?php echo $job['role_name']; ?></h1>
        <?php endif; ?>
        <p>
            <strong>
                <?php if ($job['job_location'] != null) : ?>
                    <?php echo $job['job_location']; ?>
                <?php endif; ?>
            </strong>
        </p>
        <p>
            <strong>
                <?php if ($job['application_deadline'] != null) : ?>
                    <strong>Application Deadline:</strong> <?php echo $job['application_deadline']; ?>
                <?php endif; ?>
            </strong>
        </p>
        <p>
            <strong>
                <?php if ($job['start_date'] != null) : ?>
                    <strong>Start Date:</strong><?php echo $job['start_date']; ?>
                <?php endif; ?>
            </strong>
        </p>
        <?php if ($job['about_role'] != null) : ?>
            <strong>About the Role</strong>
            <p> <?php echo $job['about_role']; ?></p>
        <?php endif; ?>
        <?php if ($job['duties_and_responsibilities'] != null) : ?>
            <strong>Duties and Responsibilities</strong>
            <p> <?php echo $job['duties_and_responsibilities']; ?></p>
        <?php endif; ?>
        <?php if ($job['qualifications'] != null) : ?>
            <strong>Qualifications</strong>
            <p> <?php echo $job['qualifications']; ?></p>
        <?php endif; ?>
        <?php echo $job['qualifications']; ?>
        <?php if ($job['start_date'] != null) : ?>
            <p><strong>Start Date:</strong> <?php echo $job['start_date']; ?></p>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
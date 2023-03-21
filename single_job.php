<?php foreach ($filtered_jobs as $job) : ?>
    <h1><?php echo $job['role_name']; ?></h1>
    <p><strong>Location:</strong> <?php echo $job['job_location']; ?></p>
    <p><strong>Application Deadline:</strong> <?php echo $job['application_deadline']; ?></p>
    <p><strong>Start Date:</strong> <?php echo $job['start_date']; ?></p>
    <h2>About the Role</h2>
    <?php echo $job['about_role']; ?>
    <h2>Duties and Responsibilities</h2>
    <?php echo $job['duties_and_responsibilities']; ?>
    <h2>Qualifications</h2>
    <?php echo $job['qualifications']; ?>
    <?php if ($job['start_date'] != null): ?>
                <p><strong>Start Date:</strong> <?php echo $job['start_date']; ?></p>
            <?php endif; ?>
<?php endforeach; ?>
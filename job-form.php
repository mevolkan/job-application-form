<?php

/**
 * Template Name: Job Form
 */
get_header(); ?>

<div class="container">
    <?php the_content(); ?>
    <div>
        <?php
        $url = 'https://odoo.develop.saner.gy/fetch-jobs';
        $params = array('company_id' => 1);
        $url .= '?' . http_build_query($params);
        $response = @file_get_contents($url);

        if ($response === false) {
            $error = error_get_last();
            echo "Error: " . $error['message'];
        } else {
            $jobs = json_decode($response, true);
            if (empty($_GET['job_id'])) {
        ?>
                <h2>No job has been selected</h2>
                <p>Select from one of the positions</p>
        <?php
                ob_start();
                include 'jobs_template.php';
                $alljobs = ob_get_clean();
                echo $alljobs;
            } else {
                $role_id = intval($_GET['job_id']);

                $filtered_jobs = array_filter($jobs, function ($job) use ($role_id) {
                    return $job['role_id'] === $role_id;
                });

                ob_start();
                include 'single_job.php';
                $singlejob = ob_get_clean();
                echo $singlejob;

                ob_start();
                include 'form_template.php';
                $application_form = ob_get_clean();
                echo $application_form;

                ob_start();
                include 'jobs_template.php';
                $alljobs = ob_get_clean();
                echo $alljobs;
            }
        }
        ?>
    </div>
</div>
<?php
get_footer(); ?>
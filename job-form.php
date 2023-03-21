<?php

/**
 * Template Name: Job Form
 */
get_header(); ?>


<div class="container">
    <?php the_content(); ?>
    <div>
        <?php

        // set the URL and query parameters
        $url = 'https://odoo.develop.saner.gy/fetch-jobs';
        $params = array('company_id' => 2);

        // build the URL with query parameters
        $url .= '?' . http_build_query($params);

        // make the request and get the response
        $response = @file_get_contents($url);

        if ($response === false) {
            // handle error
            $error = error_get_last();
            echo "Error: " . $error['message'];
        } else {
            // set the template variables
            $title = 'Jobs List';
            $jobs = json_decode($response, true);

            // Define the desired role ID
            $role_id = 19111;


            // Filter jobs by role_id
            $filtered_jobs = array_filter($jobs, function ($job) use ($role_id) {
                return $job['role_id'] === $role_id;
            });

            // Get the first matching job
            $singlejob = reset($filtered_jobs);
            
            // Check if the job object was found
            if ($singlejob === null) {
                echo 'Error: Job with role ID ' . $role_id . ' not found.';
                die();
            }

            // Load the template file
            require 'single_job.php';

            // Set the title and jobs array for the template
            $singlejobs = array($singlejob);

            // Render the template
            echo $template;

        ?>
            <form id="careersform">
                <input name="job_id" id="job_id" type="number" hidden />
                <div class='wpb_row vc_row-fluid vc_row inner_row  vc_row-o-equal-height vc_row-flex'>
                    <div class="row_col_wrap_12 col span_12 dark left">
                        <div class="vc_col-sm-6 wpb_column column_container vc_column_container col padding-4-percent inherit_tablet inherit_phone">
                            <div class="vc_column-inner">
                                <label for="applicant_name">Applicant Name</label>
                                <input name="applicant_name" type="text" id="applcant_name" placeholder="Name" />
                            </div>
                        </div>
                        <div class="vc_col-sm-6 wpb_column column_container vc_column_container col padding-4-percent inherit_tablet inherit_phone">
                            <div class="vc_column-inner">
                                <label for="applicant_email">Applicant Email</label>
                                <input name="applicant_email" type="email" id="applcant_email" placeholder="Email" />
                            </div>
                        </div>
                    </div>
                    <div class="row_col_wrap_12 col span_12 dark left">
                        <div class="vc_col-sm-6 wpb_column column_container vc_column_container col padding-4-percent inherit_tablet inherit_phone">
                            <div class="vc_column-inner">
                                <label for="applicant_phone">Applicant Phone Number</label>
                                <input name="applicant_phone" type="tel" placeholder="Phone Number" />
                            </div>
                        </div>
                        <div class="vc_col-sm-6 wpb_column column_container vc_column_container col padding-4-percent inherit_tablet inherit_phone">
                            <div class="vc_column-inner">
                                <label for="applicant_mobile">Applicant Mobile Number</label>
                                <input name="applicant_mobile" type="tel" placeholder="Mobile Number" />
                            </div>
                        </div>
                    </div>
                    <div class="row_col_wrap_12 col span_12 dark left">
                        <div class="vc_col-sm-6 wpb_column column_container vc_column_container col padding-4-percent inherit_tablet inherit_phone">
                            <div class="vc_column-inner">
                                <label for="years_experience">Years of Experience</label>
                                <input type="number" name="years_experience" placeholder="X" />
                            </div>
                        </div>
                        <div class="vc_col-sm-6 wpb_column column_container vc_column_container col padding-4-percent inherit_tablet inherit_phone">
                            <div class="vc_column-inner">
                                <label for="salary_expected">Salary Expected</label>
                                <input type="number" name="salary_expected" placeholder="Salary Expected" />
                            </div>
                        </div>
                    </div>
                    <div class="row_col_wrap_12 col span_12 dark left">
                        <div class="vc_col-sm-6 wpb_column column_container vc_column_container col padding-4-percent inherit_tablet inherit_phone">
                            <div class="vc_column-inner">
                                <label for="availability">Availability</label>
                                <input type="date" name="availability" placeholder="Date" />
                            </div>
                        </div>
                        <div class="vc_col-sm-6 wpb_column column_container vc_column_container col padding-4-percent inherit_tablet inherit_phone">
                            <div class="vc_column-inner">
                                <label for="notice_period">Notice period</label>
                                <input type="text" name="notice_period" placeholder="Notice period" />
                            </div>
                        </div>
                    </div>
                    <div class="row_col_wrap_12 col span_12 dark left">
                        <div class="vc_col-sm-6 wpb_column column_container vc_column_container col padding-4-percent inherit_tablet inherit_phone">
                            <div class="vc_column-inner">
                                <label for="resume">
                                    CV</label>
                                <input type="file" name="resume" id="resume" oninput="uploadFiles(this.files, this.id)" />
                            </div>
                        </div>
                        <div class="vc_col-sm-6 wpb_column column_container vc_column_container col padding-4-percent inherit_tablet inherit_phone">
                            <div class="vc_column-inner">
                                <label for="cover_letter">
                                    Cover Letter</label>
                                <input type="file" name="cover_letter" id="cover_letter" oninput="uploadFiles(this.files, id)" />
                            </div>
                        </div>
                    </div>
                    <label></label>
                    <input type="number" name="source_id" hidden value="1" />

                    <label></label>
                    <input type="text" name="referred_by" value="sanergy_emp" hidden />
                    <br>
                    <label>Highest Qualification</label>
                    <select name="highest_qualification">
                        <option value="8">Certificate</option>
                        <option value="9">Diploma</option>
                        <option value="7">Graduate</option>
                        <option value="2">Bachelor Degree</option>
                        <option value="3">Master Degree</option>
                        <option value="4">Doctoral Degree</option>
                    </select>

                    <br>
                    <a id="fileoutput" href=""></a>
                    <br>
                    <input type="button" id="btn_uploadfile" value="Submit Application" onclick="sendFormData();" />
                </div>
            </form>

        <?php

            // render the template
            ob_start();
            include 'jobs_template.php';
            $content = ob_get_clean();



            // output the response
            echo $content;
        }

        ?>




    </div>

</div>
<?php
get_footer(); ?>
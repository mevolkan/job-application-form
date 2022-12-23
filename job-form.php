<?php

/**
 * Template Name: Job Form
 */
get_header(); ?>


<div class="container">
    <?php the_content(); ?>
    <div>
        <form id="careersform">
            <input name="job_id" id="job_id" type="number" hidden value="18532" />
            <label for="applicant_name">
                <input name="applicant_name" type="text" id="applcant_name" placeholder="Name" />
            </label>
            <label for="applicant_email">
                <input name="applicant_email" type="email" id="applcant_email" placeholder="Email" />
            </label>
            <label for="applicant_phone">
                <input name="applicant_phone" type="tel" placeholder="Phone Number" />
            </label>
            <label for="applicant_mobile">
                <input name="applicant_mobile" type="tel" placeholder="Mobile Number" />
            </label>
            <label for="years_experience">
                <input type="number" name="years_experience" placeholder="X" />
            </label>
            <label for="salary_expected">
                <input type="number" name="salary_expected" placeholder="Salary Expected" />
            </label>
            <label for="availability">
                <input type="date" name="availability" placeholder="Date" /> </label>Notice period
            <label for="notice_period">
                <input type="text" name="notice_period" placeholder="Notice period" />
            </label>
            <label for="cv">
                CV
                <input type="file" name="cv" id="cv" />
            </label>
            <label>
                Cover Letter
                <input type="file" name="cover_letter" id="cover_letter" />
            </label>
            <label>
                <input type="number" name="source_id" hidden value="1" />
            </label>
            <label>
                <input type="text" name="referred_by" value="sanergy_emp" hidden />
            </label>
            <label>Highest Qualification
                <select name="highest_qualification">
                    <option value="8">Certificate</option>
                    <option value="9">Diploma</option>
                    <option value="7">Graduate</option>
                    <option value="2">Bachelor Degree</option>
                    <option value="3">Master Degree</option>
                    <option value="4">Doctoral Degree</option>
                </select>
            </label>

            <div id="fileoutput"></div>
            <input type="button" id="btn_uploadfile" value="Upload" onclick="sendFormData();" />
        </form>
    </div>

</div>

<div id="output"></div>
<?php
get_footer(); ?>
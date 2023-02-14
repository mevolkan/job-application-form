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
            <label for="applicant_name">Applicant Name</label>
            <input name="applicant_name" type="text" id="applcant_name" placeholder="Name" />
            <br>
            <label for="applicant_email">Applicant Email</label>
            <input name="applicant_email" type="email" id="applcant_email" placeholder="Email" />
            <br>
            <label for="applicant_phone">Applicant Phone Number</label>
            <input name="applicant_phone" type="tel" placeholder="Phone Number" />
            <br>
            <label for="applicant_mobile">Applicant Mobile Number</label>
            <input name="applicant_mobile" type="tel" placeholder="Mobile Number" />
            <br>
            <label for="years_experience">Years of Experience</label>
            <input type="number" name="years_experience" placeholder="X" />
            <br>
            <label for="salary_expected">Salary Expected</label>
            <input type="number" name="salary_expected" placeholder="Salary Expected" />
            <br>
            <label for="availability">Availability</label>
            <input type="date" name="availability" placeholder="Date" />
            <br>
            <label for="notice_period">Notice period</label>
            <input type="text" name="notice_period" placeholder="Notice period" />
            <br>
            <label for="resume">
                CV</label>
            <input type="file" name="resume" id="resume"  oninput="uploadFiles(this.files, this.id)" />
            <br>
            <label for="cover_letter">
                Cover Letter</label>
            <input type="file" name="cover_letter" id="cover_letter" oninput="uploadFiles(this.files, id)" />

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
            <input type="button" id="btn_uploadfile" value="Send" onclick="sendFormData();" />
        </form>
    </div>

</div>

<div id="output"></div>
<?php
get_footer(); ?>
// Upload file
var resumePath;

document.getElementById("resume").onchange = function () {
    var files = document.getElementById("resume").files;
    if (files.length > 0) {

        var formData = new FormData();
        formData.append("file", files[0]);

        var xhttp = new XMLHttpRequest();
        // Set POST method and ajax file path
        xhttp.open("POST", "/skunk/wp-content/plugins/job/ajax.php", true);

        // call on request changes state
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                var response = this.responseText;
                response = JSON.parse(response);

                // console.log(response.status);
                console.log(response.url);

                if (response.status == 1) {
                    alert("Upload successfully.");
                    console.log(files[0].name)
                } else {
                    alert("File not uploaded.");
                }
                var cvUrl = document.getElementById("fileoutput");
                cvUrl.textContent += `${response.url}`;
                cvUrl.href += `./wp-content/plugins/job/`+`${response.url}`;
                console.log(cvUrl);
            }
        };

        // Send request with data
        xhttp.send(formData);

    } else {
        alert("Please select a file");
    }

}


//senď form data

function sendFormData() {

    const form = document.getElementById('careersform');
    const formData = new FormData(form);
    const output = document.getElementById('output');

    for (const [key, value] of formData) {
        output.textContent += `${key}: ${value}\n`;
    }
    // console.log(formData);
    // formData= Object.fromEntries(formData)
    applicationData = JSON.stringify(Object.fromEntries(formData))
    console.log(applicationData);


    // // WARNING: For POST requests, body is set to null by browsers.
    // var data = JSON.stringify({
    //    "job_id": "18532",
    //    "applicant_name": "John Doe",
    //    "applicant_email": "john.doe@gmail.com",
    //    "applicant_phone": "254712365478",
    //    "applicant_mobile": "254123654789",
    //    "years_experience": "3",
    //    "salary_expected": "100000",
    //    "availability": "2022-12-31",
    //    "notice_period": "3 Months",
    //    "cv": "",
    //    "cover_letter": "",
    //    "source_id": "1",
    //    "referred_by": "sanergy_emp",
    //    "highest_qualification": "2"
    // });

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            console.log(this.responseText);
        }
    });

    xhr.open("POST", "https://odoo.staging.saner.gy/apply-job");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(applicationData);

}

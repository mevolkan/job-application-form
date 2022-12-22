// Upload file

var files = document.getElementById("cvresume").files;

document.getElementById("cvresume").onchange = function () {

   if (files.length > 0) {

      var formData = new FormData();
      formData.append("file", files[0]);

      var xhttp = new XMLHttpRequest();

      // Set POST method and ajax file path
      xhttp.open("POST", "ajax.php", true);

      // call on request changes state
      xhttp.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {

            var response = this.responseText;
            if (response == 1) {
               alert("CV successfully.");
            } else {
               alert("CV not uploaded.");
            }
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
   // WARNING: For POST requests, body is set to null by browsers.
   var data = JSON.stringify({
      "job_id": "18532",
      "applicant_name": "John Doe",
      "applicant_email": "john.doe@gmail.com",
      "applicant_phone": "254712365478",
      "applicant_mobile": "254123654789",
      "years_experience": "3",
      "salary_expected": "100000",
      "availability": "2022-12-31",
      "notice_period": "3 Months",
      "cv": "",
      "cover_letter": "",
      "source_id": "1",
      "referred_by": "sanergy_emp",
      "highest_qualification": "2"
   });

   var xhr = new XMLHttpRequest();
   xhr.withCredentials = true;

   xhr.addEventListener("readystatechange", function () {
      if (this.readyState === 4) {
         console.log(this.responseText);
      }
   });

   xhr.open("POST", "https://odoo.staging.saner.gy/apply-job");
   xhr.setRequestHeader("Content-Type", "application/json");
   // WARNING: Cookies will be stripped away by the browser before sending the request.
   xhr.setRequestHeader("Cookie", "session_id=b591d5ec05ddf40158fdd497e3757a9603807e16");

   xhr.send(data);
}

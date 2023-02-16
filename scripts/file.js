// Upload file
var fileData = []

function uploadFiles(files, id) {
    // var files = document.getElementById("resume").files;
    //console.log(files)
    if (files.length > 0) {

        var formData = new FormData();
        formData.append("file", files[0]);
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "/skunk/wp-content/plugins/job/ajax.php", true);
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                var response = this.responseText;
                response = JSON.parse(response);

                // console.log(response.status);
                //console.log(response.url);

                if (response.status == 1) {
                    alert("Upload successfully.");
                    //console.log(files[0].name)
                } else {
                    alert("File not uploaded.");
                }
                var cvUrl = document.getElementById(id);
                cvUrl.textContent += `${response.url}`;
                cvUrl.href += `../wp-content/plugins/job/` + `${response.url}`;
                //console.log(cvUrl.href);

                const node = document.createElement("a");
                const textnode = document.createTextNode(files[0].name);
                node.appendChild(textnode);
                node.href = `./wp-content/plugins/job/` + `${response.url}`;
                node.title = files[0].name
                document.getElementById(id).appendChild(node);
                fileData.push({ [id]: node.href });

                //console.log(fileData);


            }
        };
        xhttp.send(formData);
        console.log(fileData);


    } else {
        alert("Please select a file");
    }

}


//senď form data

function sendFormData() {
    // console.log(fileData);
    const form = document.getElementById('careersform');
    const formData = new FormData(form);

    // console.log(Object.fromEntries(formData));
    // formData= Object.fromEntries(formData)
    if (fileData.length > 1) {
        formData.set('resume', fileData[0].resume)
        formData.set('cover_letter', fileData[1].cover_letter)

        for (const key in fileData) {
            if (fileData.hasOwnProperty(key)) {
                console.log(`${key}: ${fileData[key]}`);
            }
        }

        var applicationData = JSON.stringify(Object.fromEntries(formData))

        console.log(applicationData);


        var url = "https://webhook.site/67d221e1-fa8e-48a1-95db-bcfad9bc9137";

        var xhr = new XMLHttpRequest();
        xhr.open("POST", url);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log(xhr.response);
                    console.log(xhr.responseText);
                    alert('Success')
                }
            }
        };

        xhr.send(applicationData);

    } else {
        alert("Please select a file");
    }




}

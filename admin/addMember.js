function sendFormData() {
    // Get all the input elements
    const inputs = document.querySelectorAll('input');

    // Create an array to store the input values
    const data = [];

    // Loop through the input elements and get the values
    inputs.forEach((input) => {
        data.push(`${input.id}=${input.value}`);
    });

    // Create a query string from the input values
    const queryString = data.join('&');

    // Create a new XHR object
    const xhr = new XMLHttpRequest();

    // Set up the XHR request
    xhr.open('GET', '../backEnd/createMember.php?' + queryString);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            if (xhr.responseText == "E-Mail erfolgreich versendet.") {
                document.location = 'member.php';
            }
            document.getElementById('errorBox').innerHTML = xhr.responseText;
        }
    };

    // Send the request
    xhr.send();
}

document.getElementById('save').addEventListener("click", sendFormData);
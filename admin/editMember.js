function sendFormData() {
    // Get all the input elements
    const inputs = document.querySelectorAll('input');

    // Create an array to store the input values
    const data = [];

    // Loop through the input elements and get the values
    inputs.forEach((input) => {
        data.push(`${input.id}=${input.value}`);
    });

    const urlParams = new URLSearchParams(window.location.search);
    const uID = urlParams.get('uID');

    // Create a query string from the input values
    const queryString = data.join('&');

    // Create a new XHR object
    const xhr = new XMLHttpRequest();

    // Set up the XHR request
    xhr.open('GET', '../backEnd/updateMember.php?uID=' + uID + '&' + queryString);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const toastElList = document.querySelectorAll('.toast')
            if(xhr.responseText == "success") {
                document.getElementById('save').classList.remove('btn-light');
                document.getElementById('save').classList.add('btn-success');
                document.getElementById('save').innerHTML = "Gespeichert";
                document.getElementById('save').disabled = true;
            }
        }
    };

    // Send the request
    xhr.send();
}

document.getElementById('save').addEventListener("click", sendFormData);
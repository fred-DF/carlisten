
function saveSettings () {
    // Get form elements
    const form = document.querySelector('form');
    const elements = form.elements;

    // Create object for form data
    const formData = {};

    // Loop through form elements and add to formData object
    for (let i = 0; i < elements.length; i++) {
        const element = elements[i];

        if (element.type === 'checkbox') {
            formData[element.id] = element.checked;
        } else {
            formData[element.id] = element.value;
        }
    }

    // Convert formData object to JSON string
    const jsonData = JSON.stringify(formData);

    // Send JSON data via XHR
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../backEnd/setting.php');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(jsonData);
    loadSettings();
}

function loadSettings () {
    // Erstelle ein XMLHttpRequest-Objekt
    var xhr = new XMLHttpRequest();

    // Lade die JSON-Datei
    xhr.open('GET', '../website-settings.json', true);

    // Setze den Response-Type auf JSON
    xhr.responseType = 'json';

    // Wenn die Datei erfolgreich geladen wurde
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Speichere das JSON-Objekt
            var data = xhr.response;

            // Setze die Werte im Formular
            document.getElementById('home_banner_text').value = data.home_banner_text;
            document.getElementById('home_button_value').value = data.home_button_value;
            document.getElementById('home_link_value').value = data.home_link_value;
            document.getElementById('home_banner_color').value = data.home_banner_color;
            document.getElementById('home_show_button').checked = data.home_show_button;
            document.getElementById('home_show_banner').checked = data.home_show_banner;
            document.getElementById('home_welcome_message').value = data.home_welcome_message;
            document.getElementById('home_schow_welcome_message').checked = data.home_schow_welcome_message;
            document.getElementById('calendar_allow_old_view').checked = data.calendar_allow_old_view;
            document.getElementById('calendar_allow_registration').checked = data.calendar_allow_registration;
            document.getElementById('calendar_send_remeber_emails').checked = data.calendar_send_remeber_emails;
            document.getElementById('member_admins_edit_profile').checked = data.member_admins_edit_profile;
            document.getElementById('member_show_profile_pic').checked = data.member_show_profile_pic;
            document.getElementById('member_show_data_short').checked = data.member_show_data_short;
            document.getElementById('member_show_job').checked = data.member_show_job;
            document.getElementById('namedays_allow_remebers').checked = data.namedays_allow_remebers;
            document.getElementById('namedays_allows_search').checked = data.namedays_allows_search;
            document.getElementById('namedays_show_next_namedays').checked = data.namedays_show_next_namedays;
        } else {
            // Wenn es ein Problem beim Laden gab
            console.log('Es gab ein Problem beim Laden der Datei.');
        }
    };

    // Sende die Anfrage
    xhr.send();

}

loadSettings();
document.getElementById('saveBtn').addEventListener("click", saveSettings);
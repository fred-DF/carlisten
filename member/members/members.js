
const colors = [
    '#f44336',
    '#e91e63',
    '#9c27b0',
    '#673ab7',
    '#3f51b5',
    '#2196f3',
    '#03a9f4',
    '#00bcd4',
    '#009688',
    '#4caf50',
    '#8bc34a',
    '#cddc39',
    '#ffeb3b',
    '#ffc107',
    '#ff9800'
];
// Funktion zum zufälligen Auswählen einer Farbe aus dem Array
function getRandomColor() {
    const randomIndex = Math.floor(Math.random() * colors.length);
    return colors[randomIndex];
}

// XMLHttpRequest senden
var xhr = new XMLHttpRequest();
xhr.open('GET', '../../backEnd/getMember.php', true);
xhr.onload = function () {
    if (this.status == 200) {
        var mitgliederliste = JSON.parse(this.responseText);
        var table = document.createElement('table');
        table.classList.add('table', 'table-hover', 'align-middle');
        var thead = document.createElement('thead');
        var tr = document.createElement('tr');
        var th = document.createElement('th');
        th.setAttribute('scope', 'col');
        th.innerHTML = 'Profilbild';
        tr.appendChild(th);
        th = document.createElement('th');
        th.setAttribute('scope', 'col');
        th.innerHTML = 'Name';
        tr.appendChild(th);
        th = document.createElement('th');
        th.setAttribute('scope', 'col');
        th.innerHTML = 'Telefon / E-Mail';
        tr.appendChild(th);
        th = document.createElement('th');
        th.setAttribute('scope', 'col');
        th.innerHTML = 'Beruf / Firma';
        tr.appendChild(th);
        th = document.createElement('th');
        th.setAttribute('scope', 'col');
        th.innerHTML = '';
        tr.appendChild(th);
        thead.appendChild(tr);
        table.appendChild(thead);
        var tbody = document.createElement('tbody');
        mitgliederliste.forEach(function (mitglied) {
            var mitglied = JSON.parse(mitglied);
            tr = document.createElement('tr');
            var td = document.createElement('td');
            td.setAttribute('scope', 'row');
            if (mitglied['profile pic url'] != '') {
                var img = document.createElement('img');
                img.classList.add('rounded-circle', 'object-fit-cover');
                img.style = "height: 40px; width: 40px";
                img.setAttribute('src', mitglied['profile pic url']);
                img.setAttribute('alt', mitglied['first name']);
                td.appendChild(img);
            } else {
                var span = document.createElement('span');
                span.classList.add('user-avatar');
                span.style.backgroundColor = getRandomColor();
                span.innerHTML = mitglied['first name'][0];
                td.appendChild(span);
            }
            tr.appendChild(td);
            td = document.createElement('td');
            td.innerHTML = mitglied['title'] + ' ' + mitglied['first name'] + ' ' + mitglied['last name'] + ' ' + mitglied['second title'];
            tr.appendChild(td);
            td = document.createElement('td');
            var telefonEmailText = '';
            var telefonNummern = 0;
            var emailAdressen = 0;
            if (mitglied['private_telephone'] != '') {
                telefonEmailText += '<i class="fas fa-phone"></i> ' + mitglied['private_telephone'];
                telefonNummern++;
            }
            if (mitglied['private_mobile'] != '') {
                if (telefonNummern > 0) {
                    telefonEmailText += '<br>';
                }
                telefonEmailText += '<i class="fas fa-mobile-alt"></i> ' + mitglied['private_mobile'];
                telefonNummern++;
            }
            if (mitglied['private_email'] != '') {
                if (telefonNummern > 0) {
                    telefonEmailText += '<br>';
                }
                telefonEmailText += '<i class="fas fa-envelope"></i> ' + mitglied['private_email'];
                emailAdressen++;
            }
            if (mitglied['professional_telephone'] != '') {
                if (telefonNummern > 0 || emailAdressen > 0) {
                    telefonEmailText += '<br>';
                }
                telefonEmailText += '<i class="fas fa-phone"></i> ' + mitglied['professional_telephone'];
                telefonNummern++;
            }
            if (mitglied['professional_mobile'] != '') {
                if (telefonNummern > 0 || emailAdressen > 0) {
                    telefonEmailText += '<br>';
                }
                telefonEmailText += '<i class="fas fa-mobile-alt"></i> ' + mitglied['professional_mobile'];
                telefonNummern++;
            }
            if (mitglied['professional_email'] != '') {
                if (telefonNummern > 0 || emailAdressen > 0) {
                    telefonEmailText += '<br>';
                }
                telefonEmailText += '<i class="fas fa-envelope"></i> ' + mitglied['professional_email'];
                emailAdressen++;
            }
            if (telefonNummern == 0 && emailAdressen == 0) {
                telefonEmailText = '-';
            } else if (telefonNummern == 1 && emailAdressen == 0) {
                telefonEmailText = '1 Nummer';
            } else if (telefonNummern > 1 && emailAdressen == 0) {
                telefonEmailText = telefonNummern + ' Nummern';
            } else if (telefonNummern == 0 && emailAdressen == 1) {
                telefonEmailText = '1 E-Mail';
            } else if (telefonNummern == 0 && emailAdressen > 1) {
                telefonEmailText = emailAdressen + ' E-Mails';
            } else if (telefonNummern == 1 && emailAdressen == 1) {
                telefonEmailText = '1 Nummer, 1 E-Mail';
            } else if (telefonNummern > 1 && emailAdressen == 1) {
                telefonEmailText = telefonNummern + ' Nummern, 1 E-Mail';
            } else if (telefonNummern == 1 && emailAdressen > 1) {
                telefonEmailText = '1 Nummer, ' + emailAdressen + ' E-Mails';
            } else if (telefonNummern > 1 && emailAdressen > 1) {
                telefonEmailText = telefonNummern + ' Nummern, ' + emailAdressen + ' E-Mails';
            }
            td.innerHTML = telefonEmailText;
            tr.appendChild(td);
            td = document.createElement('td');
            if (mitglied['professional_job'] != '' && mitglied['professional_company'] != '') {
                td.innerHTML = mitglied['professional_job'] + ', ' + mitglied['professional_company'];
            } else if (mitglied['professional_job'] != '') {
                td.innerHTML = mitglied['professional_job'];
            } else if (mitglied['professional_company'] != '') {
                td.innerHTML = mitglied['professional_company'];
            } else {
                td.innerHTML = '';
            }
            tr.appendChild(td);
            td = document.createElement('td');
            var link = document.createElement('a');
            link.setAttribute('href', '#');
            link.setAttribute('onclick', 'loadModal(' + mitglied['ID'] + ')');
            link.innerHTML = 'Details';
            td.appendChild(link);
            tr.appendChild(td);
            tbody.appendChild(tbody.appendChild(tr));
            table.appendChild(tbody);
            document.getElementById('mitgliederliste').appendChild(table);
        });
    }
}

xhr.send();

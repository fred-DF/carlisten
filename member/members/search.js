const searchInput = document.querySelector('input');
const searchBtn = document.querySelector('button');
const resultsList = document.querySelector('#results');

const userModal = new bootstrap.Modal('#profileModal')

function displayResults(results) {
    resultsList.innerHTML = '';
    if (results.length === 0) {
        resultsList.style.display = 'none';
        return;
    }
    const li = document.createElement('li');
    li.classList.add('list-group-item');
    li.textContent = '-';
    resultsList.appendChild(li);
    resultsList.style.display = 'block';
    results.forEach(result => {
        const li = document.createElement('li');
        li.classList.add('list-group-item');
        li.textContent = result['first name'] + ' ' + result['last name'];
        li.onclick = () => loadModal(`${result.ID}`);
        resultsList.appendChild(li);  
    });
}

function searchDB(query) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../backEnd/userSearch.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const results = JSON.parse(xhr.responseText);
            displayResults(results);
        }
    };
    xhr.send('query=' + encodeURIComponent(query));
}

searchBtn.addEventListener('click', () => {
    const query = searchInput.value.trim();
    if (query !== '') {
        searchDB(query);
    }
});

searchInput.addEventListener('keyup', () => {
    const query = searchInput.value.trim();
    if (query !== '') {
        searchDB(query);
    } else {
        resultsList.style.display = 'none';
    }
});

function loadModal (id) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'profile.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('modal-content').innerHTML = xhr.responseText;
            userModal.show();
        }
    };
    xhr.send('id=' + encodeURIComponent(id));
}

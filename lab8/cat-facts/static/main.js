function createPageBtn(page, classes=[]) {
    let btn = document.createElement('button');
    classes.push('btn');
    for (cls of classes) {
        btn.classList.add(cls);
    }
    btn.dataset.page = page;
    btn.innerHTML = page;
    return btn;
}

function renderPaginationElement(info) {
    let btn;
    let paginationContainer = document.querySelector('.pagination');
    paginationContainer.innerHTML = '';

    btn = createPageBtn(1, ['first-page-btn']);
    btn.innerHTML = 'Первая страница';
    if (info.current_page == 1) {
        btn.style.visibility = 'hidden';
    }
    paginationContainer.append(btn);

    let buttonsContainer = document.createElement('div');
    buttonsContainer.classList.add('pages-btns');
    paginationContainer.append(buttonsContainer);

    let start = Math.max(info.current_page - 2, 1);
    let end = Math.min(info.current_page + 2, info.total_pages);
    for (let i = start; i <= end; i++) {
        buttonsContainer.append(createPageBtn(i, i == info.current_page ? ['active'] : []));
    }

    btn = createPageBtn(info.total_pages, ['last-page-btn']);
    btn.innerHTML = 'Последняя страница';
    if (info.current_page == info.total_pages) {
        btn.style.visibility = 'hidden';
    }
    paginationContainer.append(btn);
}

function perPageBtnHandler(event) {
    downloadData(1);
}

function setPaginationInfo(info) {
    document.querySelector('.total-count').innerHTML = info.total_count;
    let start = info.total_count > 0 ? (info.current_page - 1)*info.per_page + 1 : 0;
    document.querySelector('.current-interval-start').innerHTML = start;
    let end = Math.min(info.total_count, start + info.per_page - 1)
    document.querySelector('.current-interval-end').innerHTML = end;
}

function pageBtnHandler(event) {
    if (event.target.dataset.page) {
        downloadData(event.target.dataset.page);
        window.scrollTo(0, 0);
    }
}

function createAuthorElement(record) {
    let user = record.user || {'name': {'first': '', 'last': ''}};
    let authorElement = document.createElement('div');
    authorElement.classList.add('author-name');
    authorElement.innerHTML = user.name.first + ' ' + user.name.last;
    return authorElement;
}

function createUpvotesElement(record) {
    let upvotesElement = document.createElement('div');
    upvotesElement.classList.add('upvotes');
    upvotesElement.innerHTML = record.upvotes;
    return upvotesElement;
}

function createFooterElement(record) {
    let footerElement = document.createElement('div');
    footerElement.classList.add('item-footer');
    footerElement.append(createAuthorElement(record));
    footerElement.append(createUpvotesElement(record));
    return footerElement;
}

function createContentElement(record) {
    let contentElement = document.createElement('div');
    contentElement.classList.add('item-content');
    contentElement.innerHTML = record.text;
    return contentElement;
}

function createListItemElement(record) {
    let itemElement = document.createElement('div');
    itemElement.classList.add('facts-list-item');
    itemElement.append(createContentElement(record));
    itemElement.append(createFooterElement(record));
    return itemElement;
}

function renderRecords(records) {
    let factsList = document.querySelector('.facts-list');
    factsList.innerHTML = '';
    for (let i = 0; i < records.length; i++) {
        factsList.append(createListItemElement(records[i]));
    }
}

function downloadData(page=1) {
    let url = 'http://cat-facts-api.std-900.ist.mospolytech.ru/facts'; // Новый endpoint
    let perPage = document.querySelector('.per-page-btn').value;
    let params = new URLSearchParams({
        page: page,
        'per-page': perPage
    });

    url = `${url}?${params.toString()}`;

    let xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.responseType = 'json';
    xhr.onload = function () {
        renderRecords(this.response.records);
        setPaginationInfo(this.response['_pagination']);
        renderPaginationElement(this.response['_pagination']);
    };
    xhr.send();
}


// ...

// Функция для отображения предложений
function displayAutocompleteSuggestions(suggestions) {
    let dropdown = document.querySelector('.autocomplete-dropdown');
    if (!dropdown) {
        dropdown = document.createElement('ul');
        dropdown.classList.add('autocomplete-dropdown');
        let searchForm = document.querySelector('.search-form');
        searchForm.appendChild(dropdown);
    } else {
        dropdown.innerHTML = ''; // Очистка старого списка
    }

    suggestions.forEach(function (suggestion) {
        let listItem = document.createElement('li');
        listItem.textContent = suggestion;
        listItem.addEventListener('click', function () {
            document.querySelector('.search-field').value = suggestion;
            dropdown.innerHTML = '';
        });
        dropdown.appendChild(listItem);
    });

    let searchField = document.querySelector('.search-field');
    let rect = searchField.getBoundingClientRect();
    
    dropdown.style.position = 'absolute';
    dropdown.style.left = rect.left + 'px';
    dropdown.style.top = rect.top + rect.height + 'px';

    let searchForm = document.querySelector('.search-form');
    searchForm.appendChild(dropdown); // Добавить выпадающий список в контейнер формы

    // Обработчик события для скрытия списка при клике вне него
    document.addEventListener('click', function (event) {
        if (!searchForm.contains(event.target)) {
            dropdown.innerHTML = ''; // Скрыть выпадающий список
        }
    });
}

// Функция для получения автодополнения
function getAutocompleteResults(input) {
    let url = 'http://cat-facts-api.std-900.ist.mospolytech.ru/autocomplete?q=' + input;
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.responseType = 'json';
    xhr.onload = function () {
        // Обработка полученных данных
        let suggestions = this.response; // предположим, что сервер возвращает массив предложений
        displayAutocompleteSuggestions(suggestions); // функция для отображения предложений
    }
    xhr.send();
}

// Обработчик события ввода текста в поле поиска
document.querySelector('.search-field').addEventListener('input', function (event) {
    let userInput = event.target.value;
    getAutocompleteResults(userInput);
});
document.querySelector('.search-btn').addEventListener('click', function() {
    let query = document.querySelector('.search-field').value.trim();
    if (query.length > 0) {
        searchFacts(query);
    } else {
        downloadData();
    }
});
function searchFacts(query) {
    let factsList = document.querySelector('.facts-list');
    let url = new URL(factsList.dataset.url);
    let perPage = document.querySelector('.per-page-btn').value;
    url.searchParams.append('page', 1);
    url.searchParams.append('per-page', perPage);
    url.searchParams.append('q', query); // добавляем параметр q для поиска
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.responseType = 'json';
    xhr.onload = function () {
        renderRecords(this.response.records);
        setPaginationInfo(this.response['_pagination']);
        renderPaginationElement(this.response['_pagination']);
    }
    xhr.send();
}

function handleSearchInput(event) {
    let query = event.target.value.trim(); // получаем введенный запрос
    if (query.length > 0) {
        // вызываем функцию поиска только если запрос не пустой
        searchFacts(query);
    }
}

window.onload = function () {
    downloadData();
    document.querySelector('.pagination').onclick = pageBtnHandler;
    document.querySelector('.per-page-btn').onchange = perPageBtnHandler;

    // добавляем обработчик события input для поля ввода поиска
    document.querySelector('.search-field').addEventListener('input', handleSearchInput);
}
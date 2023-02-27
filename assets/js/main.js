(() => {
    document.addEventListener('DOMContentLoaded', main);

    function main() {
        const auth_search_form = document.querySelector('#sports_card_search_form');
        if (auth_search_form) {
            const submit = document.querySelector('#sports_card_search_form input[type="submit"]');
            const url = '/wp-json/sports-cards/find-card'

            if (!submit) return;
            addSubmitListener(submit, url);
            disable_submit_button();
        }

        const pop_search_form = document.querySelector('#sports_card_search_set_name__form');
        if (pop_search_form) {
            const url = '/wp-json/sports-cards/pop-search';
            addPopSearchSubmitListener(url);
        }
    };

    /**
     *  setup event listener on the submit button
     *
     */
    function addSubmitListener(element, submitURL) {
        element.addEventListener('click', (e) => {
            e.preventDefault();
            sendRequest(submitURL, {
                auth_code: document.querySelector('.auth_input').value
            });
        });
    }

    /**
     *  get data from server
     *
     */
    async function sendRequest(url, body) {
        const bodyJSON = JSON.stringify(body);

        const res = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: bodyJSON,
        });

        // data from api will be inserted into this element
        const location = document.querySelector('#card_output');

        if (res.status !== 200) {
            const markup = create_error_markup('No sports cards were found against the requested Auth Code!');
            updateView(location, markup);
            console.warn('Response Status Code: ', res.status);
            return;
        }

        const data = await res.json();
        const markup = create_markup(data);
        updateView(location, markup);
    }

    /**
     *  proper case strings
     *
     */
    String.prototype.toProperCase = function () {
        return this.replace(/\w\S*/g, function (txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
    };


    /**
     *  create markup for insertion into the DOM
     *
     */
    function create_markup(data) {
        const gen_rows = () => {
            let rows = '';
            for (let [key, value] of Object.entries(data)) {
                key = key.replaceAll('_', ' ').toProperCase();

                if (key === 'Id') continue;

                if (key && value) {
                    rows += `
          <tr>
            <td class="font-weight-bold">${key}</td>
            <td>${value}</td>
          <tr>
          `;
                }
            }

            return rows;
        };

        const markup = `
    <table>
      ${gen_rows()}
    </table>
    `;

        return markup;
    }

    /**
     *  create error markup
     *
     */
    function create_error_markup(message) {
        return `
    <div>
      <span class="text-error">${message}</span>
    </div>
    `;
    }

    /**
     *  insert markup into the body
     *
     */
    function updateView(element, markup) {
        console.assert(element !== null || element !== undefined);

        element.innerHTML = '';
        element.innerHTML = markup;
    }

    /**
     *  disble submit button if length less than 7
     *
     */
    function disable_submit_button() {
        const submit = document.querySelector('#sports_card_search_form input[type="submit"]');
        const input = document.querySelector('.auth_input');

        const handler = (e) => {
            const value = document.querySelector('.auth_input').value;
            console.log(value);

            if (value.length < 3) {
                submit.setAttribute('disabled', 'disabled');
            } else {
                submit.removeAttribute('disabled');
            }
        };

        input.addEventListener('paste', handler);
        input.addEventListener('keypress', handler);
    }


    /**
     *
     *   pop search functionality
     *
     */
    /**
     *  detect form submit
     *
     */
    function addPopSearchSubmitListener(url) {
        const pop_search_form = document.querySelector('#sports_card_search_set_name__form');
        pop_search_form.addEventListener('submit', (e) => {
            e.preventDefault();
            const input = document.querySelector('.set_input').value;
            const requestBody = {
                set_name: input
            };

            sendPopSearchRequest(url, requestBody);
        });
    }


    /**
     *  find cards by set name
     *
     */
    async function sendPopSearchRequest(url, body) {
        const bodyJSON = JSON.stringify(body);

        const res = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: bodyJSON,
        });

        // data from api will be inserted into this element
        const location = document.querySelector('#card_output');

        if (res.status !== 200) {
            const markup = create_error_markup('No sports cards were found against the requested Set Name!');
            updateView(location, markup);
            console.warn('Response Status Code: ', res.status);
            return;
        }

        const data = await res.json();
        const markup = create_search_markup(data);
        updateView(location, markup);
    }


    /**
     *  create markup for insertion into the DOM
     *
     */
    // console.log(element[]);
    function create_search_markup(data) {
        const gen_rows = () => {
            let rows = '';
            data.forEach(element => {
                rows += `
        <tr>


          <td><a href=player-history?id=${element.id}>${element.set_name}</a></td>
          <td>${element.sport}</td>
        <tr>
        `;
            });
            // console.log(element.id);
            return rows;
        }

        const markup = `
    <table>
      <tr class="header">
        <th>Set Name</th>
        <th>Sport</th>
      <tr>
      ${gen_rows()}
    </table>
    `;

        return markup;
    }
})();
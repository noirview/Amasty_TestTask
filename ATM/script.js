let answerContainer = document.querySelector('.answer__container');

document.querySelector('.form__submit').onclick = () => {
    let answerText = document.querySelector('.answer__text');
    if (answerText) answerText.remove();
    
    let form = document.forms.atm;

    let formData = new FormData(form);

    let xhr = new XMLHttpRequest();
    xhr.responseType = "json";
    xhr.open("POST", "/atm.php");
    xhr.send(formData);

    xhr.onload = function () {
        let response = xhr.response;

        answerContainer.style.display = 'block';

        if (response.hasOwnProperty('text')) {
            let answer_text = document.createElement('p');
            answer_text.textContent = response['text'];
            answer_text.classList.add('answer__text');
            document.querySelector('.answer__container').appendChild(answer_text);
        }
        
        if (response.hasOwnProperty('table')) {
            let answer_table = document.createElement('table');
            
            let tr = document.createElement('tr'),
                frist_td = document.createElement('td'),
                second_td = document.createElement('td');

            frist_td.textContent = 'Номинал';
            second_td.textContent = 'Количество';

            tr.appendChild(frist_td);
            tr.appendChild(second_td);
            answer_table.appendChild(tr);

            Object.keys(response['table']).reverse().forEach( denomination => {
                let tr = document.createElement('tr'),
                    frist_td = document.createElement('td'),
                    second_td = document.createElement('td');

                frist_td.textContent = denomination;
                second_td.textContent = response['table'][denomination];

                tr.appendChild(frist_td);
                tr.appendChild(second_td);
                answer_table.appendChild(tr);
            });

            answer_table.classList.add('answer__text');
            document.querySelector('.answer__container').appendChild(answer_table);
        }
    }
    
    return false;
}
document.getElementById('comment_send_button').onclick = async event => {
    event.preventDefault();

    const response = await fetch('/api/article/comment', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "article_id": document.getElementById('article_id').value,
            "subject": document.getElementById('subject').value,
            "text": document.getElementById('text').value,
        }),
    });

    let response_data = await response.json();

    if(response.status === 200){
        document.getElementById('commentForm').innerText = 'Ваше сообщение успешно отправлено!'
    }else if (response.status === 422){
        for(key in response_data.errors){
            document.getElementById(key).classList.add('border-danger')
            document.getElementById(key+'Error').innerText = response_data.errors[key]
        }
    }else{
        document.getElementById('commentError').innerText = 'Непредвиденная ошибка'
    }
}

const viewCounter = async () => {
    const response = await fetch('/api/article/view', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "article_id": document.getElementById('article_id').value
        }),
    });

    let response_data = await response.json();

    if(response.status === 200){
        document.getElementById('view_counter').innerText = response_data.views
    }
}

setTimeout(viewCounter, 5000);

document.getElementById('like_button').onclick = async () => {
    const response = await fetch('/api/article/like', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "article_id": document.getElementById('article_id').value
        }),
    });

    let response_data = await response.json();

    if(response.status === 200){
        document.getElementById('like_button').innerText = response_data.likes
    }
}

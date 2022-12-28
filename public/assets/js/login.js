const submitLoginForm = (url) => {
    const options = {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            email: document.getElementById('email').value,
            password: document.getElementById('password').value
        })
    }

    fetch(url, options)
        .then(async (response) => {
            res = await response.json()

            if (response.status == 200) {
                location.replace(res.url)
                return
            }

            Swal.fire({
                title: 'Atenção!',
                text: res.message,
                icon: 'error',
                confirmButtonText: 'Tentar novamente'
            })

        })
}
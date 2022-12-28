const headers = {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
}

const bsOffcanvas = new bootstrap.Offcanvas('#clientsOffcanvas')

const offcanvas = {
    insert: (url) => {
        document.getElementById('id').value = ''
        document.getElementById('name').value = ''
        document.getElementById('email').value = ''
        document.getElementById('email').disabled = false
        document.getElementById('description').value = ''

        document.getElementById('clientsOffcanvasLabel').innerText = 'Cadastrar novo cliente'
        document.getElementById('form-submit').innerText = 'Cadastrar'

        bsOffcanvas.show()
    },
    edit: (item) => {
        document.getElementById('id').value = item.id
        document.getElementById('name').value = item.name
        document.getElementById('description').value = item.description

        document.getElementById('email').value = item.email
        document.getElementById('email').disabled = true

        document.getElementById('clientsOffcanvasLabel').innerText = 'Editar cliente'
        document.getElementById('form-submit').innerText = 'Editar'

        bsOffcanvas.show()
    }
}

const clients = {
    addItem: (item, id = null) => {
        const html = `
        <td>${item.name}</td>
        <td>${item.email}</td>
        <td class="text-end" style="min-width:90px">
            <button class="btn btn-sm btn-primary" onclick="clients.edit('${item.id}')">
                <i class="fa-solid fa-pen"></i>
            </button>
            <button class="btn btn-sm btn-outline-danger" onclick="clients.delete('${item.id}')">
                <i class="fa-solid fa-trash"></i>
            </button>
        </td>`

        if (id) {
            document.getElementById(`table-tr-${item.id}`).innerHTML = html
            return;
        }

        document.getElementById('table-tbody').innerHTML += `
        <tr id="table-tr-${item.id}">
            ${html}
        </tr>`

        clients.updateCounter()
    },
    load: async () => {
        const response = await fetch('/clients');
        const data = await response.json()

        if (data.lenght === 0) {
            return
        }

        Object.keys(data.clients).forEach(key => {
            const item = data.clients[key]
            clients.addItem(item)
        })
    },
    create: async () => {
        const url = '/clients'
        const options = {
            method: 'POST',
            headers,
            body: JSON.stringify({
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                description: document.getElementById('description').value
            })
        }

        const response = await fetch(url, options)
        const data = await response.json()

        if (response.status === 200) {
            clients.addItem(data.client)
            bsOffcanvas.hide()
            return
        }

        Swal.fire({
            title: 'Atenção!',
            text: data.message,
            icon: 'error',
            confirmButtonText: 'Tentar novamente'
        })
    },
    edit: async (id) => {
        const url = `/clients/${id}`
        const options = {
            method: 'POST',
            headers
        }

        const response = await fetch(url, options)
        const data = await response.json()

        if (response.status === 200) {
            offcanvas.edit(data.client)
            return;
        }

        alert(data.message)
    },
    store: async (id) => {
        const url = `/clients/${id}`
        const options = {
            method: 'PUT',
            headers,
            body: JSON.stringify({
                name: document.getElementById('name').value,
                description: document.getElementById('description').value
            })
        }

        const response = await fetch(url, options)
        const data = await response.json()

        if (response.status == 200) {
            clients.addItem(data.client, data.client.id)
            bsOffcanvas.hide()
            return
        }

        Swal.fire({
            title: 'Atenção!',
            text: data.message,
            icon: 'error',
            confirmButtonText: 'Tentar novamente'
        })
    },
    delete: async (id) => {
        const url = `/clients/${id}`
        const options = {
            method: 'DELETE',
            headers
        }

        const response = await fetch(url, options)
        const data = await response.json()

        if (response.status === 200) {
            document.getElementById(`table-tr-${id}`).remove()
            clients.updateCounter()
        }

        alert(data.message)
    },
    updateCounter: () => {
        document.getElementById('table-tfoot-counter').innerHTML = document.getElementById('table-tbody').children.length
    }
}

const submitClientForm = () => {
    const id = document.getElementById('id').value

    if (id) {
        clients.store(id)
        return
    }
    clients.create()
}

clients.load()
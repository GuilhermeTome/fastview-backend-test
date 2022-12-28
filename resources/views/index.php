<?php $this->layout('layouts/app', ['title' => 'Home']) ?>


<main class="container my-3 p-3 p-md-5 bg-light rounded">
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h1>
                <i class="fa-solid fa-users"></i>&nbsp;Clientes
            </h1>
            <h4>Gerenciar clientes cadastrados</h4>
        </div>
        <div style="min-width:120px">
            <button class="btn btn-success" onclick="offcanvas.insert('<?= url('clients.create') ?>')">
                <i class="fa-solid fa-plus"></i>
                Adicionar
            </button>
        </div>
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="table-tbody">
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-muted border-0">
                        <span id="table-tfoot-counter">0</span> registros encontrados
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</main>


<div class="offcanvas offcanvas-end" tabindex="-1" id="clientsOffcanvas" aria-labelledby="clientsOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="clientsOffcanvasLabel">Cadastrar novo cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form onsubmit="submitClientForm(); return false;">
            <input type="hidden" id="id">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" placeholder="Nome completo" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" rows="3"></textarea>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" id="form-submit" class="btn btn-outline-success"></button>
            </div>
        </form>
    </div>
</div>

<?php $this->start('scripts') ?>
<script defer src="<?= asset('js/home.js') ?>"></script>
<?php $this->end() ?>
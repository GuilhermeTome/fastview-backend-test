<?php $this->layout('layouts/guest', ['title' => 'Login']) ?>

<main class="d-flex justify-content-center align-items-center vh-100 text-bg-light">

    <form class="d-flex align-items-center flex-column" onsubmit="submitLoginForm('<?= url('login') ?>'); return false;">
        <div class="mb-4 px-4">
            <img src="<?= asset('images/fastview.png') ?>" alt="Logo Fastview" style="max-width: 240px;">
        </div>

        <div class="mb-2 w-100">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="mb-2 w-100">
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
        </div>
        <div class="mb-4 w-100">
            <button type="submit" class="btn btn-primary w-100">Acessar</button>
        </div>

        <p class="text-muted">
            Created by <strong>Guilherme Tomé</strong>
        </p>
    </form>
</main>

<?php $this->start('scripts') ?>
<script defer src="<?= asset('js/login.js') ?>"></script>
<?php $this->end() ?>
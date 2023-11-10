<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/profile_saldo') ?>

<div class="container mx-auto p-4 mt-4">
    <p class="text-lg font-semibold py-5">Semua transaksi</p>
    <div class="flex flex-col w-full mb-4" id="transactionContainer">

    </div>
</div>






<?= $this->endSection() ?>
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/profile_saldo') ?>

<div class="container mx-auto p-4">
    <p class="text-lg font-semibold">Silahkan masukkan</p>
    <p class="capitalize text-3xl font-bold">nominal top up</p>

    <div class="flex mt-8">
        <div class="w-1/2 pr-2">
            <input id="nominalInput" type="text" class="w-full p-2 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none" placeholder="masukkan nominal Top Up">
        </div>

        <div class="w-1/2 flex gap-3">
            <button id="btn10k" class="flex-1 bg-white p-2 border rounded-md focus:outline-none button-nominal" data-nominal="10000">Rp10.000</button>
            <button id="btn20k" class="flex-1 bg-white p-2 border rounded-md focus:outline-none button-nominal" data-nominal="20000">Rp20.000</button>
            <button id="btn50k" class="flex-1 bg-white p-2 border rounded-md focus:outline-none button-nominal" data-nominal="50000">Rp50.000</button>
        </div>
    </div>

    <div class="flex mt-4">
        <div class="w-1/2 pr-2">
            <button type="button" class="w-full bg-gray-400 p-2 border rounded-md focus:outline-none text-gray-100" id="btn-topup" disabled>Top Up</button>
        </div>

        <div class="modal fixed hidden inset-0 flex items-center justify-center" id="modalTopUp">
            <div class="modal-content bg-white p-8 max-w-md mx-auto rounded-lg">
                <div class="text-center mb-4">
                    <img src="<?= base_url('assets/Logo.png'); ?>" alt="Logo" class="w-12 h-12 mx-auto mb-2">
                    <p id="modalTopUpMessage" class="mb-1"></p>
                    <p id="modalTopNominal" class="mb-1 font-bold text-2xl"></p>
                </div>
                <div class="flex justify-center">
                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md focus:outline-none" id="btnModalCancel">Batalkan</button>
                    <button type="button" class="bg-green-500 text-white px-4 py-2 rounded-md ml-4 focus:outline-none" id="btnModalConfirm">Ya, lanjutkan Top Up</button>
                </div>
            </div>
        </div>

        <div class="modal fixed hidden inset-0 flex items-center justify-center" id="modalSuccess">
            <div class="modal-content bg-white p-8 max-w-md mx-auto rounded-lg">
                <div class="text-center mb-4">
                    <img src="<?= base_url('assets/Logo.png'); ?>" alt="Logo" class="w-12 h-12 mx-auto mb-2">
                    <p id="modalSuccessMessage" class="mb-1"></p>
                    <p id="modalTopNominal" class="mb-1 font-bold text-2xl"></p>
                </div>
                <div class="flex justify-center">
                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md focus:outline-none" id="btnModalBack">Kembali ke beranda</button>
                </div>
            </div>
        </div>


        <div class="w-1/2 flex gap-3">
            <button id="btn100k" class="flex-1 bg-white p-2 border rounded-md focus:outline-non button-nominal" data-nominal="100000">Rp100.000</button>
            <button id="btn250k" class="flex-1 bg-white p-2 border rounded-md focus:outline-non button-nominal" data-nominal="250000">Rp250.000</button>
            <button id="btn500k" class="flex-1 bg-white p-2 border rounded-md focus:outline-non button-nominal" data-nominal="500000">Rp500.000</button>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
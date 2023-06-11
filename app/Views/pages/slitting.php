<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="px-4">
    <div class="row mb-4">
        <div class="card border-primary mb-3">
            <div class="card-header bg-transparent">
                <span>Action</span>
            </div>
            <div class="card-body text-primary">
                <button class="btn btn-primary shadow" type="button" onclick="setTambahForm()"><i class="bx bx-plus"></i>Tambah</button>
                <button class="d-none" id="tambahBtn" type="button" data-bs-toggle="modal" data-bs-target="#tambahModal" data-bs-judul="Tambah Data" onclick="setOnSubmit('makeRequest(event)')"><i class="bx bx-plus"></i>Tambah</button>
            </div>
        </div>
    </div>
    <div id="table-area"></div>
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="modalInput" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalInput">Tambah data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form id="addPrinting" onsubmit="makeRequest(event);">
                                <div class="mb-3 row">
                                    <label for="tanggal" class="col-sm-4 col-form-label">Tanggal<span class="text-danger">*</span>:</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" onchange="printPreview();" required value="<?= date("Y-m-d") ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="no_ik" class="col-sm-4 col-form-label">No. IK<span class="text-danger">*</span>:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="no_ik" name="no_ik" onchange="printPreview();" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="no_slitting" class="col-sm-4 col-form-label">No Slitting:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="no_slitting" name="no_slitting" onchange="printPreview();" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="barang_jadi" class="col-sm-4 col-form-label">Barang Jadi:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="barang_jadi" name="barang_jadi" onchange="printPreview();" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jumlah_meter" class="col-sm-4 col-form-label">Jumlah Meter / Up:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="jumlah_meter" name="jumlah_meter" onchange="printPreview();" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="hasil_fg_utuh" class="col-sm-4 col-form-label">Hasil FG Utuh:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="hasil_fg_utuh" name="hasil_fg_utuh" onchange="printPreview();" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="hasil_fg_riwen" class="col-sm-4 col-form-label">Hasil FG Riwen:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="hasil_fg_riwen" name="hasil_fg_riwen" onchange="printPreview();" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="keterangan" class="col-sm-4 col-form-label">Keterangan:</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control" id="keterangan" name="keterangan" onchange="printPreview();"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mb-2">Simpan</button>
                                <button type="button" onclick="clearField();" class="btn btn-warning w-100">Clear</button>
                            </form>
                        </div>
                        <div class="col-md-6 bg-light">
                            <h2>Preview</h2>
                            <div class="overflow-y-auto" style="height: 50vh;">
                                <div id="print-area" class="bg-white" style="min-height: 1000px;">
                                    <div class="row">
                                        <div class="col-4 d-flex justify-content-between">
                                            <span>Tanggal</span>
                                            <span>:</span>
                                        </div>
                                        <div class="col-8">
                                            <span id="prev_tanggal"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 d-flex justify-content-between">
                                            <span>No. IK</span>
                                            <span>:</span>
                                        </div>
                                        <div class="col-8">
                                            <span id="prev_no_ik"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 d-flex justify-content-between">
                                            <span>No. Slitting</span>
                                            <span>:</span>
                                        </div>
                                        <div class="col-8">
                                            <span id="prev_no_slitting"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 d-flex justify-content-between">
                                            <span>Barang Jadi</span>
                                            <span>:</span>
                                        </div>
                                        <div class="col-8">
                                            <span id="prev_barang_jadi"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 d-flex justify-content-between">
                                            <span>Jumlah Meter</span>
                                            <span>:</span>
                                        </div>
                                        <div class="col-8">
                                            <span id="prev_jumlah_meter"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 d-flex justify-content-between">
                                            <span>Hasil FG Utuh</span>
                                            <span>:</span>
                                        </div>
                                        <div class="col-8">
                                            <span id="prev_hasil_fg_utuh"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 d-flex justify-content-between">
                                            <span>Hasil FG Riwen</span>
                                            <span>:</span>
                                        </div>
                                        <div class="col-8">
                                            <span id="prev_hasil_fg_riwen"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 d-flex justify-content-between">
                                            <span>Keterangan</span>
                                            <span>:</span>
                                        </div>
                                        <div class="col-8">
                                            <span id="prev_keterangan"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="prints();" disabled id="printButton">Print</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="backdropSpinner" class="backdrop_spinner">
    <div id="loadingSpinner" class="loading-spinner">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function() {
        refreshTable();
    });

    function clearField() {
        var tanggalInput = document.getElementById("tanggal");
        var noIkInput = document.getElementById("no_ik");
        var barangJadiInput = document.getElementById("barang_jadi");
        var noSlittingInput = document.getElementById("no_slitting");
        var jumlahMeterInput = document.getElementById("jumlah_meter");
        var hasilFgUtuhInput = document.getElementById("hasil_fg_utuh");
        var hasilFgRiwenInput = document.getElementById("hasil_fg_riwen");
        var keteranganInput = document.getElementById("keterangan");

        tanggalInput.value = '<?= date("Y-m-d") ?>';
        noIkInput.value = '';
        barangJadiInput.value = '';
        noSlittingInput.value = '';
        jumlahMeterInput.value = '';
        hasilFgRiwenInput.value = '';
        hasilFgUtuhInput.value = '';
        keteranganInput.value = '';

        clearPrev();
    }

    function clearPrev() {
        var prevTanggal = document.getElementById("prev_tanggal");
        var prevNoIk = document.getElementById("prev_no_ik");
        var prevBarangJadi = document.getElementById("prev_barang_jadi");
        var prevNoSlitting = document.getElementById("prev_no_slitting");
        var prevJumlahMeter = document.getElementById("prev_jumlah_meter");
        var prevHasilFgUtuh = document.getElementById("prev_hasil_fg_utuh");
        var prevHasilFgRiwen = document.getElementById("prev_hasil_fg_riwen");
        var prevKeterangan = document.getElementById("prev_keterangan");

        prevTanggal.textContent = '';
        prevNoIk.textContent = '';
        prevBarangJadi.textContent = '';
        prevNoSlitting.textContent = '';
        prevJumlahMeter.textContent = '';
        prevHasilFgUtuh.textContent = '';
        prevHasilFgRiwen.textContent = '';
        prevKeterangan.textContent = '';
    }

    function printPreview() {
        var tanggalInput = document.getElementById("tanggal");
        var noIkInput = document.getElementById("no_ik");
        var barangJadiInput = document.getElementById("barang_jadi");
        var noSlittingInput = document.getElementById("no_slitting");
        var jumlahMeterInput = document.getElementById("jumlah_meter");
        var hasilFgUtuhInput = document.getElementById("hasil_fg_utuh");
        var hasilFgRiwenInput = document.getElementById("hasil_fg_riwen");
        var keteranganInput = document.getElementById("keterangan");

        var prevTanggal = document.getElementById("prev_tanggal");
        var prevNoIk = document.getElementById("prev_no_ik");
        var prevBarangJadi = document.getElementById("prev_barang_jadi");
        var prevNoSlitting = document.getElementById("prev_no_slitting");
        var prevJumlahMeter = document.getElementById("prev_jumlah_meter");
        var prevHasilFgUtuh = document.getElementById("prev_hasil_fg_utuh");
        var prevHasilFgRiwen = document.getElementById("prev_hasil_fg_riwen");
        var prevKeterangan = document.getElementById("prev_keterangan");

        prevTanggal.textContent = tanggalInput.value;
        prevNoIk.textContent = noIkInput.value;
        prevBarangJadi.textContent = barangJadiInput.value;
        prevNoSlitting.textContent = noSlittingInput.value;
        prevJumlahMeter.textContent = jumlahMeterInput.value;
        prevHasilFgUtuh.textContent = hasilFgUtuhInput.value;
        prevHasilFgRiwen.textContent = hasilFgRiwenInput.value;
        prevKeterangan.textContent = keteranganInput.value;
    }

    function prints() {
        var content = document.getElementById("print-area").innerHTML;
        $('#tambahModal').modal('hide');
        var backdropElements = document.getElementsByClassName("modal-backdrop");
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = content;
        window.print();
        document.body.innerHTML = originalContents;
        while (backdropElements.length > 0) {
            backdropElements[0].parentNode.removeChild(backdropElements[0]);
        }
        $('#tambahModal').modal('show');
        var printButton = document.getElementById('printButton');
        printButton.setAttribute('disabled', true)
        clearPrev();
    }

    function showLoadingSpinner() {
        var spinner = document.getElementById("loadingSpinner");
        spinner.classList.add("show");
        $('#backdropSpinner').show();
    }

    // Hide the loading spinner
    function hideLoadingSpinner() {
        var spinner = document.getElementById("loadingSpinner");
        spinner.classList.remove("show");
        $('#backdropSpinner').hide();
    }

    // Example AJAX request using jQuery
    function makeRequest(e) {
        e = e || window.event
        e.preventDefault();
        showLoadingSpinner();
        var tanggalInput = document.getElementById("tanggal").value;
        var noIkInput = document.getElementById("no_ik").value;
        var barangJadiInput = document.getElementById("barang_jadi").value;
        var noSlittingInput = document.getElementById("no_slitting").value;
        var jumlahMeterInput = document.getElementById("jumlah_meter").value;
        var hasilFgUtuhInput = document.getElementById("hasil_fg_utuh").value;
        var hasilFgRiwenInput = document.getElementById("hasil_fg_riwen").value;
        var keteranganInput = document.getElementById("keterangan").value;
        var printButton = document.getElementById('printButton');

        jQuery.ajax({
            url: '<?php echo base_url('user/slitting/add'); ?>',
            type: "POST",
            data: {
                tanggal: tanggalInput,
                no_ik: noIkInput,
                barang_jadi: barangJadiInput,
                no_slitting: noSlittingInput,
                jumlah_meter: jumlahMeterInput,
                hasil_fg_utuh: hasilFgUtuhInput,
                hasil_fg_riwen: hasilFgRiwenInput,
                keterangan: keteranganInput
            },
            success: function(response) {
                refreshTable();
                console.log(response)
                hideLoadingSpinner();
                Swal.fire("Berhasil!", "Data tersimpan!", "success");
                printButton.removeAttribute('disabled')
            },
            error: function(xhr, status, error) {
                // Handle error
                hideLoadingSpinner();
                Swal.fire("Gagal!", status, "error");
            }
        });
    }

    function refreshTable() {
        showLoadingSpinner();
        jQuery.ajax({
            url: '<?php echo base_url('user/getSlittings'); ?>',
            dataType: "json",
            success: function(response) {
                $('#table-area').html(response.data)
                hideLoadingSpinner();
            },

            error: function(xhr, status, error) {
                // Handle error
                hideLoadingSpinner();
            }
        })
    }

    function deleteOne(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                showLoadingSpinner();
                jQuery.ajax({
                    url: '<?php echo base_url('user/slitting/'); ?>' + id,
                    type: "DELETE",
                    success: function(response) {
                        refreshTable();
                        console.log(response)
                        hideLoadingSpinner();
                        Swal.fire("Berhasil!", "Data terhapus!", "success");
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        hideLoadingSpinner();
                        Swal.fire("Gagal!", "Data gagal dihapus!", "error");
                    }
                });
            }
        })
    }

    function updateSlitting(id, e) {
        e = e || window.event
        e.preventDefault();
        showLoadingSpinner();

        var tanggalInput = document.getElementById("tanggal").value;
        var noIkInput = document.getElementById("no_ik").value;
        var barangJadiInput = document.getElementById("barang_jadi").value;
        var noSlittingInput = document.getElementById("no_slitting").value;
        var jumlahMeterInput = document.getElementById("jumlah_meter").value;
        var hasilFgUtuhInput = document.getElementById("hasil_fg_utuh").value;
        var hasilFgRiwenInput = document.getElementById("hasil_fg_riwen").value;
        var keteranganInput = document.getElementById("keterangan").value;
        // var printButton = document.getElementById('printButton');

        // showLoadingSpinner();
        jQuery.ajax({
            url: '<?php echo base_url('user/slitting/'); ?>' + id,
            type: "POST",
            data: {
                tanggal: tanggalInput,
                no_ik: noIkInput,
                barang_jadi: barangJadiInput,
                no_slitting: noSlittingInput,
                jumlah_meter: jumlahMeterInput,
                hasil_fg_utuh: hasilFgUtuhInput,
                hasil_fg_riwen: hasilFgRiwenInput,
                keterangan: keteranganInput
            },
            success: function(response) {
                refreshTable();
                // console.log(response)
                hideLoadingSpinner();
                Swal.fire("Berhasil!", "Data berhasil diupdate!", "success");
            },
            error: function(xhr, status, error) {
                // Handle error
                hideLoadingSpinner();
                Swal.fire("Gagal!", "Data gagal diupdate!", "error");
            }
        });
    }

    function editForm(id) {
        showLoadingSpinner();
        jQuery.ajax({
            url: '<?php echo base_url('user/getSlitting/'); ?>' + id,
            type: "GET",
            success: function(response) {
                // console.log(response)
                hideLoadingSpinner();
                fillForm(response);
            },
            error: function(xhr, status, error) {
                // Handle error
                hideLoadingSpinner();
                Swal.fire("Aksi gagal!", "Data Tidak Ditemukan!", "error");
            }
        });
    }

    function setTambahForm() {
        clearField();
        clearPrev();
        var printButton = document.getElementById('printButton');
        printButton.setAttribute('disabled', true)
        $('#tambahBtn').click();
    }

    function fillForm(data) {
        data = JSON.parse(data)
        console.log(data)
        var tanggalInput = document.getElementById("tanggal");
        var noIkInput = document.getElementById("no_ik");
        var barangJadiInput = document.getElementById("barang_jadi");
        var noSlittingInput = document.getElementById("no_slitting");
        var jumlahMeterInput = document.getElementById("jumlah_meter");
        var hasilFgUtuhInput = document.getElementById("hasil_fg_utuh");
        var hasilFgRiwenInput = document.getElementById("hasil_fg_riwen");
        var keteranganInput = document.getElementById("keterangan");
        var printButton = document.getElementById('printButton');

        tanggalInput.value = data.tanggal
        noIkInput.value = data.no_ik
        barangJadiInput.value = data.barang_jadi
        noSlittingInput.value = data.no_slitting
        jumlahMeterInput.value = data.jumlah_meter
        hasilFgRiwenInput.value = data.hasil_fg_riwen
        hasilFgUtuhInput.value = data.hasil_fg_utuh
        keteranganInput.value = data.keterangan
        printButton.removeAttribute('disabled')
        printPreview();
        $('#updateFormButton' + data.id).click();
    }

    function setOnSubmit(val) {
        var form = document.getElementById('addPrinting')
        form.setAttribute('onsubmit', val);
    }

    var tambahModal = document.getElementById('tambahModal')
    tambahModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var judul = button.getAttribute('data-bs-judul')
        // var aksi = button.getAttribute('data-bs-aksi')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = tambahModal.querySelector('#modalInput')
        // var onsubmit = tambahModal.querySelector('#addPrinting')
        //   var modalBodyInput = exampleModal.querySelector('.modal-body input')
        // onsubmit.setAttribute('onsubmit', aksi)
        modalTitle.textContent = judul
        //   modalBodyInput.value = recipient
    })
</script>
<?= $this->endSection() ?>
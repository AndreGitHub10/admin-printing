<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="px-4">
    <div class="row mb-4">
        <div class="card border-primary mb-3">
            <div class="card-header bg-transparent">
                <span>Action</span>
            </div>
            <div class="card-body text-primary">
                <!-- <button class="btn btn-primary shadow" type="button" data-bs-toggle="modal" data-bs-target="#printMany" data-bs-whatever="@mdo"><i class='bx bx-printer nav_icon'></i>Cetak semua</button> -->
                <button class="btn btn-primary shadow" type="button" onclick="prints();"><i class='bx bx-printer nav_icon'></i>Cetak semua</button>
            </div>
        </div>
    </div>
    <div id="table-area"></div>
    <div class="modal fade" id="printMany" tabindex="-1" aria-labelledby="modalInput" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalInput">Tambah data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form id="addPrinting" action="<?php echo base_url('user/printing/add'); ?>" method="post">
                                <div class="mb-3 row">
                                    <label for="tanggal" class="col-sm-4 col-form-label">Tanggal:</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" onchange="printPreview();" required value="<?= date("Y-m-d") ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="no_ik" class="col-sm-4 col-form-label">No. IK:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="no_ik" name="no_ik" onchange="printPreview();" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" onchange="printPreview();" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="no_printing" class="col-sm-4 col-form-label">No Printing:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="no_printing" name="no_printing" onchange="printPreview();" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jumlah_meter" class="col-sm-4 col-form-label">Jumlah Meter:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="jumlah_meter" name="jumlah_meter" onchange="printPreview();" required>
                                    </div>
                                </div>
                                <button type="button" onclick="makeRequest();" class="btn btn-primary w-100 mb-2">Simpan</button>
                                <button type="button" onclick="clearField();" class="btn btn-warning w-100">Clear</button>
                            </form>
                        </div>
                        <div class="col-md-6 bg-light">
                            <h2>Print Preview</h2>
                            <div class="overflow-y-auto" style="height: 50vh;">
                                <div id="print-area" class="bg-white">
                                    <!-- <div class="row row-cols-2">
                                        <div class="col">
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
                                                    <span>Nama barang</span>
                                                    <span>:</span>
                                                </div>
                                                <div class="col-8">
                                                    <span id="prev_nama_barang"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 d-flex justify-content-between">
                                                    <span>No. Printing</span>
                                                    <span>:</span>
                                                </div>
                                                <div class="col-8">
                                                    <span id="prev_no_printing"></span>
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
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="prints();" id="printButton">Print</button>
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
        var selectedData = [];
        refreshTable();


    });

    function clearField() {
        var tanggalInput = document.getElementById("tanggal");
        var noIkInput = document.getElementById("no_ik");
        var namaBarangInput = document.getElementById("nama_barang");
        var noPrintingInput = document.getElementById("no_printing");
        var jumlahMeterInput = document.getElementById("jumlah_meter");

        tanggalInput.value = '<?= date("Y-m-d") ?>';
        noIkInput.value = '';
        namaBarangInput.value = '';
        noPrintingInput.value = '';
        jumlahMeterInput.value = '';

        clearPrev();
    }

    function clearPrev() {
        var prevTanggal = document.getElementById("prev_tanggal");
        var prevNoIk = document.getElementById("prev_no_ik");
        var prevNamaBarang = document.getElementById("prev_nama_barang");
        var prevNoPrinting = document.getElementById("prev_no_printing");
        var prevJumlahMeter = document.getElementById("prev_jumlah_meter");

        prevTanggal.textContent = '';
        prevNoIk.textContent = '';
        prevNamaBarang.textContent = '';
        prevNoPrinting.textContent = '';
        prevJumlahMeter.textContent = '';
    }

    function printPreview() {
        var tanggalInput = document.getElementById("tanggal");
        var noIkInput = document.getElementById("no_ik");
        var namaBarangInput = document.getElementById("nama_barang");
        var noPrintingInput = document.getElementById("no_printing");
        var jumlahMeterInput = document.getElementById("jumlah_meter");

        var prevTanggal = document.getElementById("prev_tanggal");
        var prevNoIk = document.getElementById("prev_no_ik");
        var prevNamaBarang = document.getElementById("prev_nama_barang");
        var prevNoPrinting = document.getElementById("prev_no_printing");
        var prevJumlahMeter = document.getElementById("prev_jumlah_meter");

        prevTanggal.textContent = tanggalInput.value;
        prevNoIk.textContent = noIkInput.value;
        prevNamaBarang.textContent = namaBarangInput.value;
        prevNoPrinting.textContent = noPrintingInput.value;
        prevJumlahMeter.textContent = jumlahMeterInput.value;
    }

    function prints() {
        // var printArea = document.getElementById("print-area");
        // $('#printMany').modal('hide');
        // var backdropElements = document.getElementsByClassName("modal-backdrop");
        var originalContents = document.body.innerHTML;
        var rowsPerPage = 12;

        // Get the selected rows
        var selectedRows = $('#example').DataTable().data();

        // Reset the selected data array
        selectedData = [];

        // Process the selected rows
        selectedRows.each(function(data) {
            var item = {
                column1: data[1],
                column2: data[2],
                column3: data[3],
                column4: data[4],
                column5: data[5],
                column6: data[6],
            };

            // Add the item to the selected data array
            selectedData.push(item);
        });

        // console.log(selectedData)
        var html = '';
        var pageCount = Math.ceil(selectedData.length / rowsPerPage);
        // var printContainer = $('<div id="printContainer" style="min-height:1000px;"></div>').appendTo('body');
        // var pageHeight = window.innerHeight;
        // var currentPage = $('<div class="page"></div>').appendTo(printContainer);
        // var currentPageHeight = 0;
        for (var page = 0; page < pageCount; page++) {
            html += '<div class="page">';
            html += '<div class="row row-cols-2 gy-4">';
            var startIndex = page * rowsPerPage;
            var endIndex = Math.min(startIndex + rowsPerPage, selectedData.length);
            for (var i = startIndex; i < endIndex; i++) {
                var item = selectedData[i];
                html += '<div class="col-md-6">';
                html += '<div class="row">';
                html += '<div class="col-4 d-flex justify-content-between">';
                html += '<span>Tanggal</span>';
                html += '<span>:</span>';
                html += '</div>';
                html += '<div class="col-8">';
                html += '<span id="prev_tanggal">' + item.column1 + '</span>';
                html += '</div>';
                html += '</div>';
                html += '<div class="row">';
                html += '<div class="col-4 d-flex justify-content-between">';
                html += '<span>No. IK</span>';
                html += '<span>:</span>';
                html += '</div>';
                html += '<div class="col-8">';
                html += '<span id="prev_no_ik">' + item.column2 + '</span>';
                html += '</div>';
                html += '</div>';
                html += '<div class="row">';
                html += '<div class="col-4 d-flex justify-content-between">';
                html += '<span>Nama barang</span>';
                html += '<span>:</span>';
                html += '</div>';
                html += '<div class="col-8">';
                html += '<span id="prev_nama_barang">' + item.column3 + '</span>';
                html += '</div>';
                html += '</div>';
                html += '<div class="row">';
                html += '<div class="col-4 d-flex justify-content-between">';
                html += '<span>No. Printing</span>';
                html += '<span>:</span>';
                html += '</div>';
                html += '<div class="col-8">';
                html += '<span id="prev_no_printing">' + item.column4 + '</span>';
                html += '</div>';
                html += '</div>';
                html += '<div class="row">';
                html += '<div class="col-4 d-flex justify-content-between">';
                html += '<span>Jumlah Meter</span>';
                html += '<span>:</span>';
                html += '</div>';
                html += '<div class="col-8">';
                html += '<span id="prev_jumlah_meter">' + item.column5 + '</span>';
                html += '</div>';
                html += '</div>';
                html += '<div class="row">';
                html += '<div class="col-4 d-flex justify-content-between">';
                html += '<span>Keterangan</span>';
                html += '<span>:</span>';
                html += '</div>';
                html += '<div class="col-8">';
                html += '<span id="prev_jumlah_meter">' + item.column6 + '</span>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                // var htmls = $(html).appendTo(currentPage);
                // html = '';
                // var rowHeight = htmls.outerHeight(true);
                // currentPageHeight += rowHeight;
                // if (currentPageHeight + rowHeight > pageHeight) {
                //     // Move to the next page
                //     currentPage = $('<div class="page"></div>').appendTo(printContainer);
                //     currentPageHeight = rowHeight;
                // }
            }
            html += '</div>';
            html += '</div>';
        }

        // var content = '<div class="row row-cols-2 gy-4">' + html + '</div>';


        document.body.innerHTML = html;
        window.print();
        document.body.innerHTML = originalContents;
        refreshTable();
        // while (backdropElements.length > 0) {
        //     backdropElements[0].parentNode.removeChild(backdropElements[0]);
        // }
        // $('#printMany').modal('show');
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
    function makeRequest() {
        showLoadingSpinner();

        var tanggalInput = document.getElementById("tanggal").value;
        var noIkInput = document.getElementById("no_ik").value;
        var namaBarangInput = document.getElementById("nama_barang").value;
        var noPrintingInput = document.getElementById("no_printing").value;
        var jumlahMeterInput = document.getElementById("jumlah_meter").value;
        // var printButton = document.getElementById('printButton');

        jQuery.ajax({
            url: '<?php echo base_url('user/printing/add'); ?>',
            type: "POST",
            data: {
                tanggal: tanggalInput,
                no_ik: noIkInput,
                nama_barang: namaBarangInput,
                no_printing: noPrintingInput,
                jumlah_meter: jumlahMeterInput
            },
            success: function(response) {
                refreshTable();
                console.log(response)
                hideLoadingSpinner();
                Swal.fire("Berhasil!", "Data tersimpan!", "success");
                // printButton.removeAttribute('disabled')
            },
            error: function(xhr, status, error) {
                // Handle error
                hideLoadingSpinner();
                Swal.fire("Gagal!", "Data tidak tersimpan!", "danger");
            }
        });
    }

    function refreshTable() {
        showLoadingSpinner();
        jQuery.ajax({
            url: '<?php echo base_url('admin/getPrintings'); ?>',
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
</script>
<?= $this->endSection() ?>
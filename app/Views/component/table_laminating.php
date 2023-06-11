<div class="rounded bg-white p-4 border border-primary">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>No. IK</th>
                <th>Nama Barang</th>
                <th>No. Laminasi</th>
                <th>Jumlah Meter</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;
            foreach ($datatable as $dt) : $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $dt['tanggal'] ?></td>
                    <td><?= $dt['no_ik'] ?></td>
                    <td><?= $dt['nama_barang'] ?></td>
                    <td><?= $dt['no_laminating'] ?></td>
                    <td><?= $dt['jumlah_meter'] ?></td>
                    <td><?= $dt['keterangan'] ?></td>
                    <td>
                        <button onclick="editForm('<?= $dt['id'] ?>')" class="btn btn-warning text-white"><i class='bx bx-edit-alt'></i></button>
                        <button id="<?php echo 'updateFormButton' . $dt['id'] ?>" onclick="setOnSubmit('updateLaminating(<?= $dt['id'] ?>, event)')" type="button" data-bs-toggle="modal" data-bs-target="#tambahModal" data-bs-judul="Update Data" class="d-none"></button>
                        <button onclick="deleteOne('<?= $dt['id'] ?>')" class="btn btn-danger"><i class='bx bx-trash'></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>No. IK</th>
                <th>Nama Barang</th>
                <th>No. Laminasi</th>
                <th>Jumlah Meter</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>

<script>
    jQuery(document).ready(function() {
        // jQuery.ajax({
        //     url: '',
        //     type: "GET",
        //     success: function(response) {
        //         // Handle success
        //         // table.ajax.reload(null, false);
        //         $('#example').DataTable({
        //             data: response
        //         });
        //         // console.log(response)
        //         // hideLoadingSpinner();
        //     },
        //     error: function(xhr, status, error) {
        //         // Handle error
        //         // hideLoadingSpinner();
        //     }
        // });
        var table = $("#example").DataTable();
        $('#example tbody').on('click', 'tr', function() {
            // Remove the 'selected' class from all rows
            // table.$('tr.selected').removeClass('selected');

            // Add the 'selected' class to the clicked row
            $(this).toggleClass('selected');
        });
        //   $("#example").DataTable({
        //     ajax: "localhost:8080/getPrintings",
        //     column: [
        //       { data: "id" },
        //       { data: "tanggal" },
        //       { data: "no_ik" },
        //       { data: "nama_barang" },
        //       { data: "no_printing" },
        //       { data: "jumlah_meter" },
        //     ],
        //   });
    });
</script>
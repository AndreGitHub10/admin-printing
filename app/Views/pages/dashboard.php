<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="">
    <h2 class="text-center">Produksi</h2>
    <div style="width: 800px;" class="mx-auto border border-red p-4 bg-white"><canvas id="acquisitions"></canvas></div>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js" integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
<script type="module">
    $(function() {

        var ctx = document.getElementById('acquisitions');
        // var data = [{
        //         year: 2010,
        //         count: 10
        //     },
        //     {
        //         year: 2011,
        //         count: 20
        //     },
        //     {
        //         year: 2012,
        //         count: 15
        //     },
        //     {
        //         year: 2013,
        //         count: 25
        //     },
        //     {
        //         year: 2014,
        //         count: 22
        //     },
        //     {
        //         year: 2015,
        //         count: 30
        //     },
        //     {
        //         year: 2016,
        //         count: 28
        //     },
        // ];

        // printing
        var printing_data = <?php echo json_encode($printing) ?>;
        var printing = [];
        for (let index = 6; index > 0; index--) {
            var arr_true;
            const date = new Date();
            date.setDate(date.getDate() - index)
            let find_printing = printing_data.some(function(x) {
                const x_date = new Date(x.tanggal).toDateString()
                // console.log("curr :" + date.toDateString())
                // console.log("db :" + x_date)
                if (x_date === date.toDateString()) {
                    arr_true = {
                        tanggal: date.toDateString(),
                        num: x.num
                    }
                    return true
                } else {
                    return false
                }
            })
            console.log(find_printing)
            if (find_printing) {
                printing.push(arr_true)
            } else {
                printing.push({
                    tanggal: date.toDateString(),
                    num: '0'
                })
            }
        }

        // laminating
        var laminating_data = <?php echo json_encode($laminating) ?>;
        var laminating = [];
        for (let index = 6; index > 0; index--) {
            var arr_true;
            const date = new Date();
            date.setDate(date.getDate() - index)
            let find_laminating = laminating_data.some(function(x) {
                const x_date = new Date(x.tanggal).toDateString()
                // console.log("curr :" + date.toDateString())
                // console.log("db :" + x_date)
                if (x_date === date.toDateString()) {
                    arr_true = {
                        tanggal: date.toDateString(),
                        num: x.num
                    }
                    return true
                } else {
                    return false
                }
            })
            console.log(find_laminating)
            if (find_laminating) {
                laminating.push(arr_true)
            } else {
                laminating.push({
                    tanggal: date.toDateString(),
                    num: '0'
                })
            }
        }

        // slitting
        var slitting_data = <?php echo json_encode($slitting) ?>;
        var slitting = [];
        for (let index = 6; index > 0; index--) {
            var arr_true;
            const date = new Date();
            date.setDate(date.getDate() - index)
            let find_slitting = slitting_data.some(function(x) {
                const x_date = new Date(x.tanggal).toDateString()
                // console.log("curr :" + date.toDateString())
                // console.log("db :" + x_date)
                if (x_date === date.toDateString()) {
                    arr_true = {
                        tanggal: date.toDateString(),
                        num: x.num
                    }
                    return true
                } else {
                    return false
                }
            })
            console.log(find_slitting)
            if (find_slitting) {
                slitting.push(arr_true)
            } else {
                slitting.push({
                    tanggal: date.toDateString(),
                    num: '0'
                })
            }
        }


        var chart1 = new Chart(ctx, {
            type: "line",
            data: {
                labels: printing.map(row => row.tanggal),
                datasets: [{
                    label: 'Printing',
                    data: printing.map(row => row.num)
                }, {
                    label: 'Laminating',
                    data: laminating.map(row => row.num)
                }, {
                    label: 'Slitting',
                    data: slitting.map(row => row.num)
                }]
            }
        });
    })
</script>
<script>
    jQuery(document).ready(function() {
        console.log(<?php echo json_encode($printing) ?>)
        console.log('ok')
        console.log(new Date().toDateString())
        console.log(new Date('2023-05-21').toDateString())
    })
</script>
<?= $this->endSection() ?>
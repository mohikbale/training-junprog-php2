<?php require "modul/function.php"; ?>

<html lang="en">
    <head>
        <title>Tables - SB Admin</title>
    </head>
    <body>
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Data Invoice</h1>
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="?x=counter_create&Id=<?= $id ?>">(+) Tambah Counter</a></li> -->
                    <!-- <li class="breadcrumb-item"><a href="?x=counter_sales">Data Sales</a></li> -->
                    <li class="breadcrumb-item active">Data Invoice</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9 text-capitalize"><i class="fas fa-table mr-1"></i>Data Invoice </div>
                            <div class="col-md-3">
                                 <a href="?x=invoice_create"><button class="btn btn-primary btn-sm float-right" style="width:100%;font-family: tahoma;"><div class="fas fa-plus-circle"></div> Tambah Data Invoice</button></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="small">
                                        <th class="text-center" style="width: 5%">No.</th>
                                        <th style="width: 17%">No. Invoice</th>
                                        <th style="width: 15%">Tanggal</th>
                                        <th style="width: 18%">Nama Customer</th>
                                        <th style="width: 29%">Alamat</th>
                                        <th style="width: 12%" class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="small">
                                        <th class="text-center">No.</th>
                                        <th>No. Invoice</th>
                                        <th>Tanggal</th>
                                        <th>Nama Customer</th>
                                        <th>Alamat</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php  
                                        $tanggal= mktime(date("m"),date("d"),date("Y"));
                                        date_default_timezone_set('Asia/Jakarta');
                                        $jam=date("H:i a");
                                        $tahun = date("Y", $tanggal);

                                        $bln = date('n');
                                        $bulan = getRomawi($bln);

                                        // $query = mysqli_query($conn, "SELECT no_invoice FROM invoice");
                                        // $data = mysqli_fetch_array($query);
                                        // $no_invoice = $data['no_invoice'];
                                        // $urutan = (int) substr($no_invoice, 3, 3);
                                        // $no_invoice++;
                                        // $invoice = sprintf("%03s", $no_invoice);
                                    ?>
                                    <!-- value="<?= $no_invoice ?>/AM/<?= $bulan ?>/<?= $tahun ?>"? -->
                                    <?php 
                                        $data = query("SELECT * FROM invoice"); 
                                    ?>

                                    <?php $i = 1; ?>
                                        <?php foreach ($data as $x) : ?>
                                            <?php 
                                                $no_invoice = $x['no_invoice']; 
                                                // $no_invoice++;
                                                $invoice = sprintf("%03s", $no_invoice);
                                            ?>
                                            <tr class="small" style="text-transform: capitalize;">
                                                <td class="text-center"><?= $i ?>.</td>
                                                <td><?= $invoice; ?>/INV-AM/<?= $bulan ?>/<?= $tahun ?></td>
                                                <td><?= tgl_indo($x['tgl']); ?></td>
                                                <td><?= $x['nama_customer']; ?></td>
                                                <td><?= $x['alamat_customer']; ?></td>
                                                <td class="text-center">
                                                    <abbr title="Data Barang">
                                                        <a href="?x=invoice_barang&Id=<?= $x['no_invoice']; ?>">
                                                            <button class="btn btn-success btn-sm">
                                                                <div class="fas fa-arrow-circle-right"></div>    
                                                            </button>
                                                        </a>
                                                    </abbr>
                                                    <abbr title="Hapus Data">
                                                        <a href="?x=invoice_delete&Id=<?= $x['no_invoice']; ?>">
                                                            <button class="btn btn-danger btn-sm">
                                                                <div class="fas fa-times-circle"></div>    
                                                            </button>
                                                        </a>
                                                    </abbr>

<!--                                                     <abbr title="Edit Data">
                                                        <a href="?x=counter_update&Id=<?= $id ?>&Idc=<?= $x['IdCounter']; ?>">
                                                            <button class="btn btn-primary btn-sm">
                                                                <div class="fas fa-check-circle"></div>
                                                            </button>
                                                        </a>
                                                    </abbr>

                                                    <abbr title="Hapus Data">
                                                        <a href="?x=counter_delete&Id=<?= $id ?>&Idc=<?= $x['IdCounter']; ?>">
                                                            <button class="btn btn-danger btn-sm">
                                                                <div class="fas fa-times-circle"></div>
                                                            </button>
                                                        </a>
                                                    </abbr> -->
                                                </td>
                                            </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>

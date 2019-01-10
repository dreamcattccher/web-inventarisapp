<?php
$this->load->view("laporan/head",array("title" => $title));
?>
<h1><?= $title ?></h1>
<table>
    <thead>
        <tr>
            <th>ID Pengaduan</th>
            <th>ID Perbaikan</th>
            <th>Nama Asset</th>
            <th>Tanggal Pengaduan</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>No Ruang</th>

        </tr>
    </thead>
    <tbody>
    <?php
    foreach($pengaduan as  $item):
        echo "<tr>
                <td>{$item->idpengaduan}</td>
                <td>{$item->idperbaikan}</td>
                <td>{$item->namaasset}</td>
                <td>{$item->tanggalpengaduan}</td>
                <td>{$item->keterangan}</td>
                <td>{$item->status}</td>
                <td>{$item->noruang}</td>
            </tr>";
    endforeach;
    ?>
    </tbody>
</table>
<?php
$this->load->view("laporan/foot");
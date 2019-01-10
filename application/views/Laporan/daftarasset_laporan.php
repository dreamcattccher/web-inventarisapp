<?php
$this->load->view("laporan/head",array("title" => $title));
?>
<h1><?= $title ?></h1>
<table>
    <thead>
        <tr>
            <th>ID Asset</th>
            <th>Nama Asset</th>
            <th>Satuan</th>
            <th>Jenis</th>
            <th>Kondisi</th>
            <th>No Ruang</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($daftarasset as  $item):
        echo "<tr>
                <td>{$item->idasset}</td>
                <td>{$item->namaasset}</td>
                <td>{$item->satuan}</td>
                <td>{$item->jenis}</td>
                <td>{$item->kondisi}</td>
                <td>{$item->noruang}</td>
            </tr>";
    endforeach;
    ?>
    </tbody>
</table>
<?php
$this->load->view("laporan/foot");
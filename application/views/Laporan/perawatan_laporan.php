<?php
$this->load->view("laporan/head",array("title" => $title));
?>
<h1><?= $title ?></h1>
<table>
    <thead>
        <tr>
            <th>ID Asset</th>
            <th>Nama Asset</th>
            <th>Tanggal Perawatan</th>
            <th>No Ruang</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($perawatan as  $item):
        echo "<tr>
                <td>{$item->idasset}</td>
                <td>{$item->namaasset}</td>
                <td>{$item->tanggalperawatan}</td>
                <td>{$item->noruang}</td>
            </tr>";
    endforeach;
    ?>
    </tbody>
</table>
<?php
$this->load->view("laporan/foot");
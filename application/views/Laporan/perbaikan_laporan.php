<?php
$this->load->view("laporan/head",array("title" => $title));
?>
<h1><?= $title ?></h1>
<table>
    <thead>
        <tr>
            <th>ID Perbaikan</th>
            <th>Nama Asset</th>
            <th>Tanggal Perbaikan</th>
            <th>Status</th>
            <th>No Ruang</th>

        </tr>
    </thead>
    <tbody>
    <?php
    foreach($perbaikan as  $item):
        echo "<tr>
                <td>{$item->idperbaikan}</td>
                <td>{$item->namaasset}</td>
                <td>{$item->tanggalperbaikan}</td>
                <td>{$item->status}</td>
                <td>{$item->noruang}</td>
            </tr>";
    endforeach;
    ?>
    </tbody>
</table>
<?php
$this->load->view("laporan/foot");
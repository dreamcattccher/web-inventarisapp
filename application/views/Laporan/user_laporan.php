<?php
$this->load->view("laporan/head",array("title" => $title));
?>
<h1><?= $title ?></h1>
<table>
    <thead>
        <tr>
            <th>ID User</th>
            <th>Nama Perbaikan</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>email</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
    <?php
    foreach($user as  $item):
        echo "<tr>
                <td>{$item->userid}</td>
                <td>{$item->nama}</td>
                <td>{$item->alamat}</td>
                <td>{$item->telepon}</td>
                <td>{$item->email}</td>
                <td>{$item->status}</td>
            </tr>";
    endforeach;
    ?>
    </tbody>
</table>
<?php
$this->load->view("laporan/foot");
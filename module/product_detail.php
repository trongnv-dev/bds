<?php
if (isset($_GET['bds'])) {
    $ghinho = 1;

    $bds = $_GET['bds'];

    $tpvaduong = 0;

    $row_sanpham = getRecord('tbl_rv_item', "subject='" . $bds . "'");
    $row_quanhuyen = getRecord('tbl_quanhuyen_category', "subject='" . $bds . "'");

    if ($row_quanhuyen['id'] > 0) $tpvaduong = 1;

    $dem_ct = substr_count($bds, 'duong');

    if ($dem_ct == 1 && $tpvaduong == 0) {
        $chuoi = explode("-duong-", $bds);
        $tp = get_field('tbl_quanhuyen_category', 'subject', $chuoi[0], 'id');
        $tenduong = "duong-" . $chuoi[1];;
        $duong = getRecord('tbl_street', "parent1='" . $tp . "' and subject='" . $tenduong . "'  ");
        $tp_tit = getRecord('tbl_quanhuyen_category', "id='" . $tp . "'");
    } else {
        $kt2 = 0;
        $chuoi = explode("-duong-", $bds);

        if (get_field('tbl_quanhuyen_category', 'subject', $chuoi[0], 'id') > 0) {
            // abd-asds-duong-duong-quang-ham
            //echo $chuoi[0]." 0 abd-asds-duong-duong-quang-ham";
            $tp = get_field('tbl_quanhuyen_category', 'subject', $chuoi[0], 'id');
            $tenduong = str_replace($chuoi[0], "", $_GET['bds']);;
            $tenduong = substr($tenduong, 1);
            $duong = getRecord('tbl_street', "parent1='" . $tp . "' and subject='" . $tenduong . "'  ");
        } elseif (get_field('tbl_quanhuyen_category', 'subject', $chuoi[0] . "-duong", 'id') > 0) {
            // abd-asds-duong-duong-quang-trung
            //echo $chuoi[0]."-duong"." 0 abd-asds-duong-duong-quang-trung";
            $tp = get_field('tbl_quanhuyen_category', 'subject', $chuoi[0] . "-duong", 'id');
            if (substr_count($bds, $chuoi[0] . "-duong") > 1) $tenduong = str_replace($chuoi[0] . "-duong", "", $_GET['bds']) . $chuoi[0] . "-duong";
            else $tenduong = str_replace($chuoi[0] . "-duong", "", $_GET['bds']);
            $tenduong = substr($tenduong, 1);
            $duong = getRecord('tbl_street', "parent1='" . $tp . "' and subject='" . $tenduong . "'  ");
        }


    }


    if ($row_sanpham['id'] != "") {
        $sqlupdate = "update tbl_rv_item SET view=view+1 where subject='" . $bds . "' ";
        mysql_query($sqlupdate);
        $parent_root = get_field('tbl_rv_category', 'id', $row_sanpham['parent'], 'parent');
        $parent_root1 = get_field('tbl_rv_category', 'id', get_field('tbl_rv_category', 'id', $row_sanpham['parent'], 'parent'), 'parent');
        if ($parent_root == 2) $parent_root = $row_sanpham['parent'];
        else if ($parent_root1 == 2) $parent_root = get_field('tbl_rv_category', 'id', $row_sanpham['parent'], 'parent');


        $ghinho = 1;
    } elseif ($row_quanhuyen['id'] != "") {
        $ghinho = 3;

    } elseif ($duong['id'] > 0) {
        $ghinho = 4; // tim duong

    } else {
        $bds = $_GET['bds'];
        $parent1 = get_field('tbl_rv_category', 'subject', $bds, 'id');
        $cate = get_field('tbl_rv_category', 'subject', $bds, 'cate');
        if ($parent1 == "") echo '<script>window.location="' . $linkrootbds . '404-page-not-found.html" </script>';
        else $ghinho = 2;


        if (get_field('tbl_rv_category', 'id', $parent1, 'parent') == 2) {
            $parent_c = $parent1;
        } elseif (get_field('tbl_rv_category', 'id', get_field('tbl_rv_category', 'id', $parent1, 'parent'), 'parent') == 2) {
            $parent_c = get_field('tbl_rv_category', 'id', $parent1, 'parent');
        }
    }

}


?>
<?php
$catebds1 = get_field('tbl_rv_category', 'id', get_field('tbl_rv_category', 'id', $row_sanpham['parent'], 'parent'), 'subject');

if ($ghinho == 1) {
    include("module/detail.php");
} elseif ($ghinho == 2) {
    include("module/category.php");
} elseif ($ghinho == 3) {
    include("module/bds_of_city.php");
} elseif ($ghinho == 4) {
    include("module/bds_of_street.php");
}
?>
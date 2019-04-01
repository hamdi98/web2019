<?php
ob_start();
session_start();
include '../config.php';
require_once('C:/wamp64/www/FRONT GHASSEN/html2pdf/vendor/autoload.php');
$total=0;
    ?>
<link href="pdf-style.css" type="text/css" rel="stylesheet">
<page footer="date; page" backtop="20mm" backbottom="20mm" backleft="10mm" backright="10mm">
    <?php
        include 'page_header.php';
        include 'page_footer.php';
    ?>

    <h1>Facture</h1>
    <table class="doc-infos">
        <tr>
            <td class="invoice">
                <p>Date : 21/06/2016</p>
            </td>
            <td class="client">
                <h3>CLIENT TEST</h3>
                <p>Adresse Nimporte</p>
                <p>Tel 4545457575</p>
            </td>
        </tr>
    </table>
    <hr>

    <table class="doc-details" cellspacing="0">
        <tr>
            <th class="ref">Ref</th>
            <th class="desig">Designation</th>
            <th class="qte">QTE</th>
            <th class="price">Price</th>
            <th class="amount">Amount</th>
        </tr>

        <?php
            $ids=array_keys($_SESSION['shopping_cart']);
            for($i=0;$i<count($ids);$i++)
            {
                $prixTel=$_SESSION['shopping_cart'][$ids[$i]]['quantity']*$_SESSION['shopping_cart'][$ids[$i]]['prix'];
                $total+=$prixTel;
                ?>
            <tr>
                <td><?= $_SESSION['shopping_cart'][$ids[$i]]['nom'] ?></td>
                <td>Description</td>
                <td><?= $_SESSION['shopping_cart'][$ids[$i]]['quantity']?></td>
                <td><?= number_format($_SESSION['shopping_cart'][$ids[$i]]['prix'], 2)?></td>
                <td><?= number_format($prixTel, 2)?></td>
            </tr>
            <?php }?>

    </table>

    <br>
    <br>

    <table class="total" cellspacing="0">
        <tr>
            <td style="width: 70%">Total HT</td>
            <td style="width: 25%"><?=number_format($total, 2)?></td>
        </tr>
        <tr>
            <td>Total TVA</td>
            <td></td>
        </tr>
        <tr>
            <td>Total TTC</td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center" colspan="2">Net A payer : <?=number_format($total, 2)?></td>
        </tr>
    </table>

    <br>
    <table class="signature-table" cellspacing="0">
        <tr>
            <td class="sinature"></td>
            <td class="amount-chars">
                <p>signature client</p>
            </td>
        </tr>
    </table>

 </page>
<?php


    $content = ob_get_clean();
    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';

    // set some language-dependent strings (optional)

    $html2pdf = new HTML2PDF('P', 'A4', 'en');
    //$html2pdf->pdf->setLanguageArray($lg);

    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('fichierpdf.pdf','D');




 ?>
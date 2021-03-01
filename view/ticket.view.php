<head>
    <link rel="stylesheet" href="index.css">

</head>
<?php
$id = $_GET['id']
?>
<?php foreach(readData() as $data):?>
    <?php if($data !=""):?>
    <?php $data = explode(",", $data)?>
    <?php if ($id == $data[9]):?>
            <div class="ticket">
                <div class="mainTi">
                    <div class="owner">
                        <div class="pInfo"><?=$data[2]?></div>
                        <div class="pInfo"><?=$data[3]?></div>
                        <div class="idNum">#<?=$data[0]?></div>
                        <div class="priceTag">
                            <div class="price">Price: <?=$data[6]?> $</div>
                            <div class="baggage">Baggage > 20kg: 20 $</div>
                        </div>
                    </div>
                    <div class="fromTo">
                        <div class="from">
                            <div class="time">16:20</div>
                            <div class="text">Isvykimas Is:</div>
                            <div class="tText"><?=$data[4]?></div>
                        </div>
                        <div class="to">
                            <div class="time">22:30</div>
                            <div class="text">Atvykimas I:</div>
                            <div class="tText"><?=$data[5]?></div>
                        </div>
                    </div>
                    Extra Requests:
                    <div class="eText"><?=$data[8]?></div>
                </div>
            </div>
    <?php endif?>
    <?php endif?>
<?php endforeach;?>
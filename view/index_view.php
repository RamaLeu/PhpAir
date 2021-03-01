<!doctype html>
<head>
    <link rel="stylesheet" href="index.css">

</head>

<body>
<div class="mainForm">
    <div class="container">
        <form method="post">
            <div class="form-group">
                <select class="form-control" name="fNumber">
                    <option selected value="null">--Skrydzio Numeris</option>
                    <?php foreach($flightNumber as $number):?>
                        <option value="<?=$number;?>"><?=$number;?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label for="pId">Asmens Kodas</label>
                <input type="number" class="form-control" id="pId" name="pId">
            </div>
            <div class="form-group">
                <label for="name">Vardas</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="surname">Pavarde</label>
                <input type="text" class="form-control" id="surname" name="surname">
            </div>
            <div class="form-group">
                <select class="form-control" name="from">
                    <option selected value="null">--Is</option>
                    <?php foreach($locations as $location):?>
                        <option value="<?=$location;?>"><?=$location;?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="to">
                    <option selected value="null">--I</option>
                    <?php foreach($locations as $location):?>
                        <option value="<?=$location;?>"><?=$location;?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Kaina</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <select class="form-control" name="baggage">
                    <option selected value="null">--Bagazo svoris</option>
                    <?php foreach($baggage as $weight):?>
                    <option value="<?=$weight;?>"><?=$weight;?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label for="extra">Papildomi Reikalavimai</label>
                <input type="text" class="form-control" id="extra" name="extra">
            </div>
            <button type="submit" name="send">Siusti</button>
        </form>
        <?php
        if(isset($_POST['send'])):?>

        <?php
        //Validacijos neisejo i funkcijas isvesti todel palikau ja cia
        if ($_POST['fNumber']=="null") {
        $validation[] = "Skrydzio numeris turi buti pasirinktas,";
        }
        if (!preg_match('/^([0-7]+[0-9]{10,12})/', $_POST['pId'])) {
        $validation[] = "Asmens kodas turi atitikti LT formata";
        }
        if (!preg_match('/^([A-Z]+[a-z0-9A-Z).-]{4,100})/', $_POST['name'])) {
        $validation[] = "Vardas turi atitikti formata,";
        }
        if (!preg_match('/^([A-Z]+[a-z0-9A-Z).-]{4,100})/', $_POST['surname'])) {
        $validation[] = "Pavarde turi atitikti formata,";
        }
        if ($_POST['baggage']=="null") {
        $validation[] = "Turi buti pasirinktas bagazo svoris,";
        }
        if (!preg_match('/[A-Za-z0-9]{50,1000}/', $_POST['extra'])) {
        $validation[] = "Komentaras turi buti nuo 50 iki 1000 simboliu";
        } ?>


        <?php if(empty($validation)):?>
            <?php if($_POST['baggage'] >20):?>
                <?php $_POST['price']+=30;?>
            <?php endif;?>
            <?php printData($_POST)?>
        <div class="ticket">
            <div class="mainTi">
                <div class="owner">
                    <div class="pInfo"><?=$_POST["name"]?></div>
                    <div class="pInfo"><?=$_POST["surname"]?></div>
                    <div class="idNum">#<?=$_POST["fNumber"]?></div>
                    <div class="priceTag">
                        <div class="price">Price: <?=$_POST["price"]?> $</div>
                        <?php if($_POST['baggage'] >20):?>
                            <div class="baggage">Baggage > 20kg: 20 $</div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="fromTo">
                    <div class="from">
                        <div class="time">16:20</div>
                        <div class="text">Isvykimas Is:</div>
                        <div class="tText"><?=$_POST["from"]?></div>
                    </div>
                    <div class="to">
                        <div class="time">22:30</div>
                        <div class="text">Atvykimas I:</div>
                        <div class="tText"><?=$_POST["to"]?></div>
                    </div>
                </div>
                <div class="eText">Extra Requests: <?=$_POST["extra"]?></div>
            </div>
        </div>
        <?php endif;?>
    </div>
    <div class="tHistory">
        <h3>Skrydziu istorija</h3>
        <?php foreach(readData() as $data):?>
        <?php $data = explode(",", $data)?>
        <div><?=$data[0]?>
            <?php if($data[0] !=""):?>
            <a id="<?=$data[9]?>" href="ticket.php?id=<?=$data[9]?>">Perziureti</a></div>
            <?php endif?>
        <?php endforeach;?>
    </div>
    <?php endif;?>
    <?php if(!empty($validation)):?>
        <h3>Aptiktos klaidos pildant bilieta!</h3>
    <?php foreach($validation as $error):?>

        <p><?=$error?></p>
    <?php endforeach?>
    <?php endif?>
</div>
</body>
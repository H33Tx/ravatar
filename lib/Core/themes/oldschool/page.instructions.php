<div class="grid grid-cols-2 gap-5">
    <div class="col-span-1">
        <!-- WEITERES ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["msc"] ?>
        </div>
        <div class="mt-1">
            <p>
                <?= $lang["msc notes"] ?>
            </p>
        </div>
        <!-- WEITERES ENDE -->
        <!-- CONTROLPANEL ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["ctrlpnl"] ?>
        </div>
        <div class="mt-1">
            <p>
                <?= $lang["ctrlpnl notes1"] ?>
            </p>
            <!-- <p class="mt-3">
                <?= $lang["ctrlpnl notes2"] ?>
            </p> -->
        </div>
        <!-- CONTROLPANEL ENDE -->
    </div>
    <div class="col-span-1">
        <!-- NAVIGATIONSMENÜ ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["navigation"] ?>
        </div>
        <div class="text-center mt-1">
            <a href="index.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["main page"] ?></a> |
            <a href="gallery.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["gallery"] ?></a> <?php if ($loggedin) { ?>|
            <a href="avatars.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["edit avatars"] ?></a> |
            <a href="logout.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["log out"] ?></a><?php } ?>
        </div>
        <!-- NAVIGATIONSMENÜ ENDE -->
        <!-- TOS ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["tos"] ?>
        </div>
        <div class="mt-1">
            <p>
                <?= $lang["tos notes"] ?>
            </p>
        </div>
        <!-- TOS ENDE -->
    </div>
</div>
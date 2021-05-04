<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$terminal = \PhpSchool\CliMenu\Terminal\TerminalFactory::fromSystem();
$terminal->disableCanonicalMode();
$terminal->enableCursor();
$terminal->enableEchoBack();

$typed = '';
while ($c = $terminal->read(1)) {

//    $terminalMiddle = round($terminal->getHeight() / 2);

    if (!($c == "\n" || $c == "\r")) {
//    echo "test";
//        continue;
        $typed .= $c;
    }

    if (substr($typed, -3) == 'sav') {
        $typed .= '|io|';
    }

    $terminal->write("\n");

    $terminal->write($typed);

    //track results lines (for search) here


//    var_dump($c);
//    $terminal->write($typed);
    for ($i = 0; $i < $terminal->getHeight() - count(explode("\n", $typed)); $i++) {
        $terminal->write("\n");
    }
    $terminal->moveCursorToRow(1);
    $terminal->moveCursorToColumn(strlen($typed));
//    $terminal->clearLine();
//    $terminal->clearDown();
}

exit;

system("stty -icanon");
echo "input# " . PHP_EOL;

$width = (int)exec('tput cols') . PHP_EOL;
$height = (int)exec('tput lines') . PHP_EOL;

$typed = "";

while ($c = fread(STDIN, 1)) {
//    echo "Read from STDIN: " . $c . "\ninput# ";

    $typed .= $c;

//    for ($i = 0; $i < 10; $i++) {

//            echo "" . PHP_EOL;

//    }
    fwrite(STDIN, "\033[2J");
    fwrite(STDOUT, "\033[2J");

    if ($c === "s") {
        echo "savio?" . PHP_EOL;
    }
    echo $typed;
}

exit;

function clear(): void
{
//        $this->output->write("\033[2J");
}

function clearLine(): void
{
//        $this->output->write("\033[2K");
}

//$name = fgets(STDIN);
//echo $name;

readline_callback_handler_install('', function ($text) {
    echo "callback" . $text;
});
$resSTDIN = fopen("php://stdin", "r");
//echo("We have now run: readline_callback_handler_install('', function(){});\n");
//echo("Press the 'y' key");
$strChar = stream_get_contents($resSTDIN, -1);

echo $strChar;

//echo("\nYou pressed: " . $strChar . "\nBut did not have to press <cr>\n");

fclose($resSTDIN);
readline_callback_handler_remove();


//require_once(__DIR__ . '/../vendor/autoload.php');
//
//use PhpSchool\CliMenu\CliMenu;
//use PhpSchool\CliMenu\Builder\CliMenuBuilder;
//
////$itemCallable = function (CliMenu $menu) {
////    echo $menu->getSelectedItem()->getText();
////};
//
//$savio = "savio";
//
//$itemCallable = function (CliMenu $menu) use (&$savio) {
//    $savio = $menu->askText()->setPlaceholderText('Enter something here')->ask();
////    var_dump($result->fetch());
//};
//
//$menu = (new CliMenuBuilder)
//    ->setTitle('Basic CLI Menu')
//    ->addItem($savio, $itemCallable)
//    ->build();
////    ->addLineBreak('-')
////    ->setForegroundColour('40')
////    ->setBorder(1, 2, 'yellow')
////    ->setPadding(2, 4)
////    ->setMarginAuto()
//
////
//$menu->open();

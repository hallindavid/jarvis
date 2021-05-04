<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class SearchCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'ls';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Search your tasks';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $terminal = \PhpSchool\CliMenu\Terminal\TerminalFactory::fromSystem();
        $terminal->disableCanonicalMode();
        $terminal->enableCursor();
        $terminal->enableEchoBack();

        $typed = '';
        while ($c = $terminal->read(1)) {

//    $terminalMiddle = round($terminal->getHeight() / 2);

            var_dump(ord((isset($c[2])) ? $c[2] : null));
            if (! ($c == "\n" || $c == "\r")) {
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

        $this->info('Search Complete');
    }

    /**
     * Define the command's schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    public function schedule(Schedule $schedule)
    {
        // $schedule->command(static::class)->everyMinute();
    }
}

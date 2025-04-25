<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

use Cake\Core\Configure;


/**
 * Translation filler command.
 */
class i18nFillerCommand extends Command
{
    private $extractCommand = 'bin/cake i18n extract --paths src,templates --output resources/locales --exclude vendor --extract-core no --merge --overwrite';
    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser = parent::buildOptionParser($parser);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|void|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        passthru($this->extractCommand, $return);

        $content = file_get_contents(Configure::read('App.paths.locales')[0].'default.pot') ?? '';
        $source = $this->extractText($content);

        foreach(glob(Configure::read('App.paths.locales')[0].'*'.DS.'default.po') as $path)
        {
            $content = file_get_contents($path) ?? '';
            $i18n = $this->extractText($content);
            $haystack = $source;

            foreach($i18n as $line) {
                $matchedKey = array_search($line, $haystack);
                if (is_numeric($matchedKey)) { unset($haystack[$matchedKey]); }
            }

            foreach($haystack as $text) {
                echo $text . PHP_EOL;
                file_put_contents($path, PHP_EOL . 'msgid  "'.$text.'"' . PHP_EOL . 'msgstr ""'. PHP_EOL. PHP_EOL, FILE_APPEND | LOCK_EX);
            }           
        }
    }

    private function extractText(string $text) {
        $i18n = array();
        foreach(preg_split("/[\r\n]+/",$text) as $line)
        {
            $line = trim($line);
            $text = str_starts_with($line ,'msgid') ?$line :'';

            preg_match("/[\'\"](.*)[\'\"]/",$text,$matches);
            $i18n[] = $matches[1] ?? null;
        }
        $i18n = array_filter($i18n);
        return $i18n;
    }
}

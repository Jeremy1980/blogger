<?php
use Migrations\AbstractMigration;

class CreateArticles extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('articles');
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('author', 'string', [
            'default' => null,
            'limit' => 25,
            'null' => false,
        ]);
        $table->addColumn('slug', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('body', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('published', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('activated', 'boolean', [
            'default' => 0,
            'null' => true,
        ]);
        $table->addIndex(['slug'], ['unique' => true]);
        $table->create();

        if ($this->isMigratingUp()) 
        {
            $rows = array(
                array('id' => '1'
                    ,'author' => 'Wikipedia (PL)'
                    ,'title' => 'Kwiat -- Definicja'
                    ,'slug' => 'kwiat-definicja-092534'
                    ,'body' => '<span class="js-about-item-abstr">Kwiat – organ roślin nasiennych, w 
                    którym wykształcają się wyspecjalizowane elementy służące do
                        rozmnażania.Stanowi fragment pędu o ograniczonym wzroście ze skupieniem
                    liści płodnych i płonnych, służących odpowiednio, bezpośrednio i pośrednio do rozmnażania płciowego.Kwiat charakterystyczny dla roślin
                    nasiennych jest organem homologicznym do kłosa zarodnionośnego roślin
                    ewolucyjnie starszych. < /span>'
                    ,'activated' => '0'
                    ,'published' => NULL
                    ,'created' => '2022-09-25 15:18:34'
                    ,'modified' => '2022-09-25 15:18:34'
                ),
                array('id' => '2'
                    ,'author' => 'Wikipedia (PL)'
                    ,'title' => 'Kwiat -- Morfologia'
                    ,'slug' => 'kwiat-morfologia-092532'
                    ,'body' => '<p>Kwiaty rozwijają się z pączków kwiatowych, zwykle jako pędy boczne w pachwinie <a href="https://pl.wikipedia.org/wiki/Przysadka_(botanika)" title="Przysadka (botanika)">przysadek</a>
                    20200925190000_CreateArticles       title = "Kaulifloria" > kauliflorii < /a>. <
                            /p><p>Pojedynczy kwiat zbudowany jest z liści płodnych i płonnych, nie związanych bezpośrednio z rozmnażaniem. Części płodne to <a href="https:/ / pl.wikipedia.org / wiki / Pr % C4 % 99 cik_(botanika)
                            " title="
                            Pręcik(botanika)
                            ">pręciki</a> z woreczkami pyłkowymi (mikrosporofile – organy męskie) oraz <a href="
                            https: //pl.wikipedia.org/wiki/Owocolistek" title="Owocolistek">owocolistki</a> z zalążkami (makrosporofile – organy żeńskie). <a href="https://pl.wikipedia.org/wiki/Pr%C4%99cik_(botanika)" title="Pręcik (botanika)">Pręciki</a> produkujące <a href="https://pl.wikipedia.org/wiki/Py%C5%82ek" title="Pyłek">pyłek</a> tworzą <a href="https://pl.wikipedia.org/wiki/Pr%C4%99cikowie" title="Pręcikowie">pręcikowie</a>. Owocolistki tworzą <a href="https://pl.wikipedia.org/wiki/S%C5%82upek" title="Słupek">słupek</a> (słupkowie).
                            <
                            /p><p>Z liści płonnych (sterylnych) kwiatu zbudowany jest <a href="https:/ / pl.wikipedia.org / wiki / Okwiat " title="
                            Okwiat ">okwiat</a> (okrywa kwiatowa), która u <a href="
                            https: //pl.wikipedia.org/wiki/Nagonasienne" title="Nagonasienne">roślin nagonasiennych</a> jest bardzo niepozorna, a niejednokrotnie nie występuje wcale, u <a href="https://pl.wikipedia.org/wiki/Okrytonasienne" title="Okrytonasienne">roślin okrytozalążkowych</a>
                            zaś jest różnorodna i czasami bardzo okazała.Okwiat może być pojedynczy(listki okwiatu zebrane w jednym lub dwóch okółkach są niezróżnicowane) lub złożony i wtedy w jego skład wchodzi < a href = "https://pl.wikipedia.org/wiki/Korona_kwiatu"
                            title = "Korona kwiatu" > korona < /a> (<i>corolla</i > ) oraz < a href = "https://pl.wikipedia.org/wiki/Kielich_(botanika)"
                        title = "Kielich (botanika)" > kielich < /a> (<i>kalyx</i > ), u niektórych roślin pod kielichem występuje < a href = "https://pl.wikipedia.org/wiki/Kieliszek_(botanika)"
                    title = "Kieliszek (botanika)" > kieliszek < /a> (<i>epikalyx</i > ).Wszystkie elementy składowe kwiatu wyrastają z < a href = "https://pl.wikipedia.org/wiki/Dno_kwiatowe"
                title = "Dno kwiatowe" > dna kwiatowego < /a> – rozszerzonej części będącej zakończeniem szypułki. W kwiatach owadopylnych występują dodatkowo gruczoły zwane <a href="https:/ / pl.wikipedia.org / wiki / Miodnik " title="
                Miodnik ">miodnikami</a>. <
                /p><p>W przypadku roślin nagonasiennych nieosłonięte zalążki leżą na 
                pojedynczych owocolistkach.Zaś u roślin okrytonasiennych jeden lub kilka zrośniętych owocolistków tworzy słupek, w jego dolnej części tworzącej zalążnię zamknięte są zalążki. <
                /p>'
                    ,'activated' => '1'
                    ,'published' => '2022-09-25 15:20:00'
                    ,'created' => '2022-09-25 15:20:32'
                    ,'modified' => '2022-09-25 15:20:50'
                ),
                array('id' => '3'
                    ,'author' => 'Wikipedia (PL)'
                    ,'title' => 'Kwiat - Klasyfikacja'
                    ,'slug' => 'kwiat-klasywfikacja-092506'
                    ,'body' => 'Podział ze względu na dostępność miodników:<br><ol><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kwiaty z łatwo i powszechnie dostępnymi miodnikami,</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kwiaty z częściowo ukrytymi miodnikami,</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kwiaty z całkowicie ukrytymi miodnikami,</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kwiaty bez miodników (tzw. kwiaty pyłkowe).</li></ol>Podział ze względu na kształt okwiatu:<br><ol><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kwiaty talerzykowate</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kwiaty lejkowate</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kwiaty dzwonkowate,</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kwiaty trąbkowate,</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kwiaty wargowate</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kwiaty motylkowate,</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kwiaty główkowate i koszyczkowate,</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kwiaty pułapkowe i paściowe.</li></ol>'
                    ,'activated' => '0'
                    ,'published' => NULL
                    ,'created' => '2022-09-25 15:23:06'
                    ,'modified' => '2022-09-25 15:23:00'
                ),
                array('id' => '4'
                    ,'author' => 'Wikipedia (PL)'
                    ,'title' => 'Kwiaty - Zastosowanie'
                    ,'slug' => 'kwiaty-zastosowanie-092516'
                    ,'body' => '<ul><li>&nbsp;&nbsp;&nbsp; Kwiaty wykorzystywane są przede wszystkim w celach ozdobnych, stanowiąc źródło wrażeń estetycznych. Szczególnie cenione są jako rośliny ozdobne gatunki o kwiatach z okwiatem okazałym pod względem wielkości i barwy, wonne, o oryginalnym kształcie okwiatu. Czasem o walorach estetycznych stanowi nie tyle kwiat co cały kwiatostan lub listki przykwiatowe (przysadka, podkwiatek). Popularnymi kwiatowymi krzewami ozdobnymi są: lilak, forsycja, głóg, róża, a roślinami zielnymi o ozdobnych kwiatach są m.in.: tulipany, mieczyki, goździki, fiołki, chryzantemy. Uprawą i produkcją kwiatów zajmuje się dział ogrodnictwa zwany kwiaciarstwem. Sztukę układania kwiatów nazywamy bukieciarstwem (florystyką), a specyficzną jej odmianę, stosowaną w krajach Dalekiego Wschodu – ikebaną. Kwiaty są częstym motywem zdobniczym i przedmiotem natchnienia artystów.</li></ul><ul><li>&nbsp;&nbsp;&nbsp; Ze względu kwiaty, które dostarczają pszczołom surowca do produkcji miodu – nektaru i pyłku uprawia się szereg gatunków roślin miododajnych.</li></ul><ul><li>&nbsp;&nbsp;&nbsp; Niektóre rośliny olejkodajne uprawiane są także ze względu na pozyskiwane olejki eteryczne właśnie z kwiatów, które są następnie surowcem w przemyśle perfumeryjnym (np. z płatków róż wytwarza się olejek różany, z koszyczków rumianku – olejek rumiankowy).</li></ul><ul><li>&nbsp;&nbsp;&nbsp; Kwiaty i kwiatostany mają mniejsze znaczenie kulinarne od innych części roślin, jednak w przypadku niektórych gatunków stanowią ważne warzywa i przyprawy. Pożywnym warzywem są np. młode kwiatostany kalafiora, brokuła i karczocha. Poza tym spożywać można m.in. kwiaty i kwiatostany dyni, bzu czarnego, piwonii drzewiastej, róż, stokrotki. Kwiatostany chmielu stanowią kluczową przyprawę w produkcji piwa. Znamiona z kwiatów szafranu należą do najdroższych przypraw i stosowane są także jako barwnik. Płatki nagietków dodawane są do paszy dla drobiu w celu nadania bardziej intensywnego zabarwienia żółtkom.<br></li></ul><ul><li>&nbsp;&nbsp;&nbsp; Kwiaty i kwiatostany znajdują także zastosowanie lecznicze. Np. koszyczki rumianku i kwiaty lip stosowane są do sporządzania naparów stosowanych przy przeziębieniach, stanach zapalnych i przeciwskurczowo.</li></ul>'
                    ,'activated' => '0'
                    ,'published' => NULL
                    ,'created' => '2022-09-25 15:25:16'
                    ,'modified' => '2022-09-25 15:25:16'
                    ,'title' => 'Tytuł #001'
                    ,'slug' => 'tytul-001-092515'
                    ,'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    ,'activated' => '1'
                    ,'published' => NULL
                    ,'created' => '2022-09-25 15:27:15'
                    ,'modified' => '2022-09-25 15:27:15'
                ),
                array('id' => '7'
                    , 'author' => 'H. Rackham'
                    , 'title' => 'Tytuł #002'
                    , 'slug' => 'tytul-001-092516'
                    , 'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    ,'activated' => '1'
                    ,'published' => NULL
                    ,'created' => '2022-09-25 15:27:15'
                    ,'modified' => '2022-09-25 15:27:15'
                ),
                array('id' => '8'
                    , 'author' => 'H. Rackham'
                    , 'title' => 'Tytuł #003'
                    , 'slug' => 'tytul-001-092513'
                    , 'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    ,'activated' => '1'
                    ,'published' => NULL
                    ,'created' => '2022-09-25 13:23:00'
                    ,'modified' => '2022-09-25 13:23:00'
                ),
                array('id' => '9'
                    , 'author' => 'H. Rackham'
                    , 'title' => 'Tytuł #004', 'slug' => 'tytul-001-092514'
                    , 'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    ,'activated' => '1'
                    ,'published' => NULL
                    ,'created' => '2022-09-25 14:24:00'
                    ,'modified' => '2022-09-25 14:24:00'
                ),
                array('id' => '12'
                    , 'author' => 'H. Rackham'
                    , 'title' => 'Tytuł #003'
                    , 'slug' => 'tytul-001-092523'
                    , 'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    ,'activated' => '1'
                    ,'published' => NULL
                    ,'created' => '2022-09-25 13:23:00'
                    ,'modified' => '2022-09-25 13:23:00'
                ),
                array('id' => '15'
                    , 'author' => 'H. Rackham'
                    , 'title' => 'Tytuł #003'
                    , 'slug' => 'tytul-001-090523'
                    , 'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    ,'activated' => '1'
                    ,'published' => NULL
                    ,'created' => '2022-09-25 13:23:00'
                    ,'modified' => '2022-09-25 13:23:00'
                ),
                array('id' => '16'
                    , 'author' => 'H. Rackham'
                    , 'title' => 'Tytuł #004'
                    , 'slug' => 'tytul-001-092524'
                    , 'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    ,'activated' => '1'
                    ,'published' => NULL
                    ,'created' => '2022-09-25 14:24:00'
                    ,'modified' => '2022-09-25 14:24:00'
                ),
                array('id' => '17'
                    , 'author' => 'H. Rackham'
                    , 'title' => 'Tytuł #005'
                    , 'slug' => 'tytul-001-092511'
                    , 'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    ,'activated' => '1'
                    ,'published' => NULL
                    ,'created' => '2022-09-25 15:25:00'
                    ,'modified' => '2022-09-25 15:25:00'
                )
            );
            
            $table->insert($rows)->save();
        }
    }
}
?>
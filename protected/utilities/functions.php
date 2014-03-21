<?php
functions::left_menu();

/**
* 
*/
class functions
{
    function left_menu(){

        functions::event('left_menu',  NULL, function($var) {
        ?>
        <script type="text/javascript">
            $( document ).ready(function() {
                var kerbela = $(window).kerbelainit();
                kerbela.setRequestedHttpService('reader');
                var ticket=kerbela.getTicket();
                var auth=kerbela.getAuthTicket();
                var HTTP_service_ticket=ticket.HTTP_service_ticket;
                $('#library').click(function(){
                    var form='<form method="post" action="<?php echo $var->createUrl("site/library"); ?>" style="display:none"><input type="hidden" name="auth" value="'+auth+'"><input type="hidden" name="http_service_ticket" value="'+HTTP_service_ticket+'"><input type="hidden" name="type" value="web"></form>';
                    $('body').append(form);
                    $(form).submit();
                });
                $('#list').click(function(){
                    var form='<form method="post" action="<?php echo $var->createUrl("content/list"); ?>" style="display:none"><input type="hidden" name="auth" value="'+auth+'"><input type="hidden" name="http_service_ticket" value="'+HTTP_service_ticket+'"><input type="hidden" name="type" value="web"></form>';
                    $('body').append(form);
                    $(form).submit();
                });
                $('#profile').click(function(){
                    var form='<form method="post" action="<?php echo $var->createUrl("site/myprofile"); ?>" style="display:none"><input type="hidden" name="auth" value="'+auth+'"><input type="hidden" name="http_service_ticket" value="'+HTTP_service_ticket+'"><input type="hidden" name="type" value="web"></form>';
                    $('body').append(form);
                    $(form).submit();
                });
                
            });
        </script>
        <div id="sidebar" class="sidebar sidebar-fixed">
                <div class="sidebar-menu nav-collapse">
                    <!--=== Navigation ===-->
                    <ul>
                        <li class="current">
                            <a id="library" href="#">
                                <i class="fa fa-book fa-fw"></i>
                                <span class="menu-text">Kütüphanem</span>
                            </a>
                        </li> 
                        <li>
                            <a id="list" href="#">
                                <i class="fa fa-briefcase fa-fw"></i> 
                                <span class="menu-text">Mağaza</span>
                            </a>
                        </li>
                        <li>
                            <a id="profile"href="#">
                                <i class="fa fa-user fa-fw"></i> 
                                <span class="menu-text">Profilim</span>
                            </a>
                        </li>
                    </ul>
                    <!-- /Navigation -->

                </div>
            </div><!-- /Sidebar -->
            <?php
    });

    }
     /**
     * Attach (or remove) multiple callbacks to an event and trigger those callbacks when that event is called.
     *
     * @param string $event name
     * @param mixed $value the optional value to pass to each callback
     * @param mixed $callback the method or function to call - FALSE to remove all callbacks for event
     */
    function event($event, $value = NULL, $callback = NULL)
    {
        static $events;

        // Adding or removing a callback?
        if($callback !== NULL)
        {
            if($callback)
            {
                $events[$event][] = $callback;
            }
            else
            {
                unset($events[$event]);
            }
        }
        elseif(isset($events[$event])) // Fire a callback
        {
            foreach($events[$event] as $function)
            {
                $value = call_user_func($function, $value);
            }
            return $value;
        }
    }


    public function add3dots($string,$repl,$limit)
    {
      if(strlen($string)>$limit)
      {
        returnsubstr($string,0,$limit).$repl;
      }
      else
      {
        return$string;
      }
    }

    public function currencyArray(){
        return array(
        '971' => array('Afghan Afghani', 'AFA'),
        '533' => array('Aruban Florin', 'AWG'),
        '036' => array('Australian Dollars', 'AUD'),
        '032' => array('Argentine Pes', 'ARS'),
        '944' => array('Azerbaijanian Manat', 'AZN'),
        '044' => array('Bahamian Dollar', 'BSD'),
        '050' => array('Bangladeshi Taka', 'BDT'),
        '052' => array('Barbados Dollar', 'BBD'),
        '974' => array('Belarussian Rouble', 'BYR'),
        '068' => array('Bolivian Boliviano', 'BOB'),
        '986' => array('Brazilian Real', 'BRL'),
        '826' => array('British Pounds Sterling', 'GBP'),
        '975' => array('Bulgarian Lev', 'BGN'),
        '116' => array('Cambodia Riel', 'KHR'),
        '124' => array('Canadian Dollars', 'CAD'),
        '136' => array('Cayman Islands Dollar', 'KYD'),
        '152' => array('Chilean Peso', 'CLP'),
        '156' => array('Chinese Renminbi Yuan', 'CNY'),
        '170' => array('Colombian Peso', 'COP'),
        '188' => array('Costa Rican Colon', 'CRC'),
        '191' => array('Croatia Kuna', 'HRK'),
        '196' => array('Cypriot Pounds', 'CPY'),
        '203' => array('Czech Koruna', 'CZK'),
        '208' => array('Danish Krone', 'DKK'),
        '214' => array('Dominican Republic Peso', 'DOP'),
        '951' => array('East Caribbean Dollar', 'XCD'),
        '818' => array('Egyptian Pound', 'EGP'),
        '232' => array('Eritrean Nakfa', 'ERN'),
        '233' => array('Estonia Kroon', 'EEK'),
        '978' => array('Euro', 'EUR'),
        '981' => array('Georgian Lari', 'GEL'),
        '288' => array('Ghana Cedi', 'GHC'),
        '292' => array('Gibraltar Pound', 'GIP'),
        '320' => array('Guatemala Quetzal', 'GTQ'),
        '340' => array('Honduras Lempira', 'HNL'),
        '344' => array('Hong Kong Dollars', 'HKD'),
        '348' => array('Hungary Forint', 'HUF'),
        '352' => array('Icelandic Krona', 'ISK'),
        '356' => array('Indian Rupee', 'INR'),
        '360' => array('Indonesia Rupiah', 'IDR'),
        '376' => array('Israel Shekel', 'ILS'),
        '388' => array('Jamaican Dollar', 'JMD'),
        '392' => array('Japanese yen', 'JPY'),
        '368' => array('Kazakhstan Tenge', 'KZT'),
        '404' => array('Kenyan Shilling', 'KES'),
        '414' => array('Kuwaiti Dinar', 'KWD'),
        '428' => array('Latvia Lat', 'LVL'),
        '422' => array('Lebanese Pound', 'LBP'),
        '440' => array('Lithuania Litas', 'LTL'),
        '446' => array('Macau Pataca', 'MOP'),
        '807' => array('Macedonian Denar', 'MKD'),
        '969' => array('Malagascy Ariary', 'MGA'),
        '458' => array('Malaysian Ringgit', 'MYR'),
        '470' => array('Maltese Lira', 'MTL'),
        '977' => array('Marka', 'BAM'),
        '480' => array('Mauritius Rupee', 'MUR'),
        '484' => array('Mexican Pesos', 'MXN'),
        '508' => array('Mozambique Metical', 'MZM'),
        '524' => array('Nepalese Rupee', 'NPR'),
        '532' => array('Netherlands Antilles Guilder', 'ANG'),
        '901' => array('New Taiwanese Dollars', 'TWD'),
        '554' => array('New Zealand Dollars', 'NZD'),
        '558' => array('Nicaragua Cordoba', 'NIO'),
        '566' => array('Nigeria Naira', 'NGN'),
        '408' => array('North Korean Won', 'KPW'),
        '578' => array('Norwegian Krone', 'NOK'),
        '512' => array('Omani Riyal', 'OMR'),
        '586' => array('Pakistani Rupee', 'PKR'),
        '600' => array('Paraguay Guarani', 'PYG'),
        '604' => array('Peru New Sol', 'PEN'),
        '608' => array('Philippine Pesos', 'PHP'),
        '634' => array('Qatari Riyal', 'QAR'),
        '946' => array('Romanian New Leu', 'RON'),
        '643' => array('Russian Federation Ruble', 'RUB'),
        '682' => array('Saudi Riyal', 'SAR'),
        '891' => array('Serbian Dinar', 'CSD'),
        '690' => array('Seychelles Rupee', 'SCR'),
        '702' => array('Singapore Dollars', 'SGD'),
        '703' => array('Slovak Koruna', 'SKK'),
        '705' => array('Slovenia Tolar', 'SIT'),
        '710' => array('South African Rand', 'ZAR'),
        '410' => array('South Korean Won', 'KRW'),
        '144' => array('Sri Lankan Rupee', 'LKR'),
        '968' => array('Surinam Dollar', 'SRD'),
        '752' => array('Swedish Krona', 'SEK'),
        '756' => array('Swiss Francs', 'CHF'),
        '834' => array('Tanzanian Shilling', 'TZS'),
        '764' => array('Thai Baht', 'THB'),
        '780' => array('Trinidad and Tobago Dollar', 'TTD'),
        '949' => array('Turkish New Lira', 'TRY'),
        '784' => array('UAE Dirham', 'AED'),
        '840' => array('US Dollars', 'USD'),
        '800' => array('Ugandian Shilling', 'UGX'),
        '980' => array('Ukraine Hryvna', 'UAH'),
        '858' => array('Uruguayan Peso', 'UYU'),
        '860' => array('Uzbekistani Som', 'UZS'),
        '862' => array('Venezuela Bolivar', 'VEB'),
        '704' => array('Vietnam Dong', 'VND'),
        '894' => array('Zambian Kwacha', 'AMK'),
        '716' => array('Zimbabwe Dollar', 'ZWD')
    );
    }

    public function getCurrency($code ,$key=0) {  
        $array_var = functions::currencyArray();
        return $array_var[$code][$key];

    }


    function delTree($dir) { 
        if (!file_exists($dir) and !is_dir($dir)) return false;
        $files = array_diff(scandir($dir), array('.','..')); 
        foreach ($files as $file) { 
            (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file"); 
        } 
        return rmdir($dir); 
    } 

    function returnMIMEType($filename)
    {
        preg_match("|\.([a-z0-9]{2,5})$|i", $filename, $fileSuffix);

        switch(strtolower($fileSuffix[1]))
        {
            case "js" :
                return "application/x-javascript";

            case "json" :
                return "application/json";

            case "jpg" :
            case "jpeg" :
            case "jpe" :
                return "image/jpg";

            case "png" :
            case "gif" :
            case "bmp" :
            case "tiff" :
                return "image/".strtolower($fileSuffix[1]);

            case "css" :
                return "text/css";

            case "xml" :
                return "application/xml";

            case "doc" :
            case "docx" :
                return "application/msword";

            case "xls" :
            case "xlt" :
            case "xlm" :
            case "xld" :
            case "xla" :
            case "xlc" :
            case "xlw" :
            case "xll" :
                return "application/vnd.ms-excel";

            case "ppt" :
            case "pps" :
                return "application/vnd.ms-powerpoint";

            case "rtf" :
                return "application/rtf";

            case "pdf" :
                return "application/pdf";

            case "xhtml" :
            case "html" :
            case "htm" :
            case "php" :
                return "text/html";

            case "txt" :
                return "text/plain";

            case "mpeg" :
            case "mpg" :
            case "mpe" :
                return "video/mpeg";

            case "mp4" :
                return "video/mp4";

            case "mp3" :
                return "audio/mpeg3";

            case "wav" :
                return "audio/wav";

            case "aiff" :
            case "aif" :
                return "audio/aiff";

            case "avi" :
                return "video/msvideo";

            case "wmv" :
                return "video/x-ms-wmv";

            case "mov" :
                return "video/quicktime";

            case "zip" :
                return "application/zip";

            case "tar" :
                return "application/x-tar";

            case "swf" :
                return "application/x-shockwave-flash";

            default :
            return "application/" . trim($fileSuffix[0], ".");
        }
    }

}
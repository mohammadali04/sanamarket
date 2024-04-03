<?php
/**
 * Created by PhpStorm.
 * User: Hadi
 * Date: 12/6/2019
 * Time: 7:56 PM
 */

namespace Aghandeh\IranShippingPrice;

Class Shipping
{
    //in Toman
    protected $sefareshi_extra_cost_percent;
    protected $sefareshi_extra_cost;
    protected $sefareshi_insurance;
    protected $sefareshi_tax;
    protected $pishtaz_extra_cost_percent;
    protected $pishtaz_extra_cost;
    protected $pishtaz_insurance;
    protected $pishtaz_tax;

    protected $sefareshi_rate_price;
    protected $pishtaz_rate_price;

    protected $weight;
    protected $destination;
    protected $postcode;
    protected $source;

    public $package_price = 0;

    public function __construct($destination = null , $postalCode = null, $source = "GIL" )
    {
        $this->sefareshi_extra_cost_percent = config('shipping.sefareshi.extra_cost_percent' , 0);
        $this->sefareshi_extra_cost = config('shipping.sefareshi.extra_cost' , 0);
        $this->sefareshi_insurance = config('shipping.sefareshi.insurance' , 650);
        $this->sefareshi_tax = config('shipping.sefareshi.tax' , 9);
        $this->pishtaz_extra_cost_percent = config('shipping.pishtaz.extra_cost_percent' , 0);
        $this->pishtaz_extra_cost = config('shipping.pishtaz.extra_cost' , 0);
        $this->pishtaz_insurance = config('shipping.pishtaz.insurance' , 650);
        $this->pishtaz_tax = config('shipping.pishtaz.tax' , 9);

        // Iran Post Prices

        $this->sefareshi_rate_price['500']['in'] 		= config('shipping.sefareshi.500.in' , 3800);
        $this->sefareshi_rate_price['500']['beside'] 	= config('shipping.sefareshi.500.beside' , 4900);
        $this->sefareshi_rate_price['500']['out'] 		= config('shipping.sefareshi.500.out' , 5300);

        $this->sefareshi_rate_price['1000']['in'] 		= config('shipping.sefareshi.1000.in' , 5000);
        $this->sefareshi_rate_price['1000']['beside'] 	= config('shipping.sefareshi.1000.beside' , 6800);
        $this->sefareshi_rate_price['1000']['out'] 		= config('shipping.sefareshi.1000.out' , 7300);

        $this->sefareshi_rate_price['2000']['in'] 		= config('shipping.sefareshi.2000.in' , 6900);
        $this->sefareshi_rate_price['2000']['beside'] 	= config('shipping.sefareshi.2000.beside' , 8800);
        $this->sefareshi_rate_price['2000']['out'] 		= config('shipping.sefareshi.2000.out' , 9500);

        $this->sefareshi_rate_price['9999']['in'] 		= config('shipping.sefareshi.9999.in' , 2500);
        $this->sefareshi_rate_price['9999']['beside'] 	= config('shipping.sefareshi.9999.beside' , 3000);
        $this->sefareshi_rate_price['9999']['out'] 		= config('shipping.sefareshi.9999.out' , 3500);

        // Iran Post Prices
        $this->pishtaz_rate_price['500']['in'] 		= config('shipping.pishtaz.500.in' , 5750);
        $this->pishtaz_rate_price['500']['beside'] 	= config('shipping.pishtaz.500.beside' , 7800);
        $this->pishtaz_rate_price['500']['out'] 		= config('shipping.pishtaz.500.out' , 8400);

        $this->pishtaz_rate_price['1000']['in'] 		= config('shipping.pishtaz.1000.in' , 7400);
        $this->pishtaz_rate_price['1000']['beside'] 	= config('shipping.pishtaz.1000.beside' , 10000);
        $this->pishtaz_rate_price['1000']['out'] 		= config('shipping.pishtaz.1000.out' , 11200);

        $this->pishtaz_rate_price['2000']['in'] 		= config('shipping.pishtaz.2000.in' , 9800);
        $this->pishtaz_rate_price['2000']['beside'] 	= config('shipping.pishtaz.2000.beside' , 12700);
        $this->pishtaz_rate_price['2000']['out'] 		= config('shipping.pishtaz.2000.out' , 14000);

        $this->pishtaz_rate_price['9999']['in'] 		= config('shipping.pishtaz.9999.in' , 2500);
        $this->pishtaz_rate_price['9999']['beside'] 	= config('shipping.pishtaz.9999.beside' , 3000);
        $this->pishtaz_rate_price['9999']['out'] 		= config('shipping.pishtaz.9999.out' , 3500);


        $this->source = $this->get_the_abbreviation($source);
        $this->destination = $this->get_the_abbreviation($destination);
        $this->postcode = $postalCode;
    }

    protected function check_states_beside( $source, $destination){
        $isbeside["EAZ"]["WAZ"] = true;
        $isbeside["EAZ"]["ADL"] = true;
        $isbeside["EAZ"]["ZJN"] = true;

        $isbeside["WAZ"]["EAZ"] = true;
        $isbeside["WAZ"]["KRD"] = true;
        $isbeside["WAZ"]["ZJN"] = true;

        $isbeside["ADL"]["EAZ"] = true;
        $isbeside["ADL"]["GIL"] = true;
        $isbeside["ADL"]["ZJN"] = true;

        $isbeside["ESF"]["CHB"] = true;
        $isbeside["ESF"]["LRS"] = true;
        $isbeside["ESF"]["KBD"] = true;
        $isbeside["ESF"]["MKZ"] = true;
        $isbeside["ESF"]["QHM"] = true;
        $isbeside["ESF"]["SMN"] = true;
        $isbeside["ESF"]["SKH"] = true;
        $isbeside["ESF"]["YZD"] = true;
        $isbeside["ESF"]["FRS"] = true;

        $isbeside["ABZ"]["THR"] = true;
        $isbeside["ABZ"]["MKZ"] = true;
        $isbeside["ABZ"]["GZN"] = true;
        $isbeside["ABZ"]["MZN"] = true;

        $isbeside["ILM"]["KRH"] = true;
        $isbeside["ILM"]["LRS"] = true;
        $isbeside["ILM"]["KHZ"] = true;

        $isbeside["BHR"]["KBD"] = true;
        $isbeside["BHR"]["KHZ"] = true;
        $isbeside["BHR"]["FRS"] = true;
        $isbeside["BHR"]["HRZ"] = true;

        $isbeside["THR"]["ABZ"] = true;
        $isbeside["THR"]["MKZ"] = true;
        $isbeside["THR"]["QHM"] = true;
        $isbeside["THR"]["MZN"] = true;
        $isbeside["THR"]["SMN"] = true;

        $isbeside["CHB"]["KBD"] = true;
        $isbeside["CHB"]["KHZ"] = true;
        $isbeside["CHB"]["LRS"] = true;
        $isbeside["CHB"]["ESF"] = true;

        $isbeside["SKH"]["SBN"] = true;
        $isbeside["SKH"]["KRN"] = true;
        $isbeside["SKH"]["YZD"] = true;
        $isbeside["SKH"]["ESF"] = true;
        $isbeside["SKH"]["SMN"] = true;
        $isbeside["SKH"]["RKH"] = true;

        $isbeside["RKH"]["SKH"] = true;
        $isbeside["RKH"]["NKH"] = true;
        $isbeside["RKH"]["SMN"] = true;

        $isbeside["NKH"]["RKH"] = true;
        $isbeside["NKH"]["GLS"] = true;
        $isbeside["NKH"]["SMN"] = true;

        $isbeside["KHZ"]["ILM"] = true;
        $isbeside["KHZ"]["BHR"] = true;
        $isbeside["KHZ"]["LRS"] = true;
        $isbeside["KHZ"]["KBD"] = true;
        $isbeside["KHZ"]["CHB"] = true;

        $isbeside["ZJN"]["GIL"] = true;
        $isbeside["ZJN"]["ADL"] = true;
        $isbeside["ZJN"]["EAZ"] = true;
        $isbeside["ZJN"]["WAZ"] = true;
        $isbeside["ZJN"]["KRD"] = true;
        $isbeside["ZJN"]["HDN"] = true;
        $isbeside["ZJN"]["GZN"] = true;

        $isbeside["SMN"]["MZN"] = true;
        $isbeside["SMN"]["THR"] = true;
        $isbeside["SMN"]["QHM"] = true;
        $isbeside["SMN"]["ESF"] = true;
        $isbeside["SMN"]["NKH"] = true;
        $isbeside["SMN"]["RKH"] = true;
        $isbeside["SMN"]["SKH"] = true;

        $isbeside["SBN"]["SKH"] = true;
        $isbeside["SBN"]["KRN"] = true;
        $isbeside["SBN"]["HRZ"] = true;

        $isbeside["FRS"]["ESF"] = true;
        $isbeside["FRS"]["YZD"] = true;
        $isbeside["FRS"]["BHR"] = true;
        $isbeside["FRS"]["HRZ"] = true;
        $isbeside["FRS"]["KBD"] = true;
        $isbeside["FRS"]["KRN"] = true;

        $isbeside["GZN"]["ZJN"] = true;
        $isbeside["GZN"]["HDN"] = true;
        $isbeside["GZN"]["MKZ"] = true;
        $isbeside["GZN"]["ABZ"] = true;
        $isbeside["GZN"]["MZN"] = true;
        $isbeside["GZN"]["GIL"] = true;

        $isbeside["QHM"]["THR"] = true;
        $isbeside["QHM"]["MKZ"] = true;
        $isbeside["QHM"]["SMN"] = true;
        $isbeside["QHM"]["ESF"] = true;

        $isbeside["KRD"]["WAZ"] = true;
        $isbeside["KRD"]["KRH"] = true;
        $isbeside["KRD"]["HDN"] = true;
        $isbeside["KRD"]["ZJN"] = true;

        $isbeside["KRN"]["YZD"] = true;
        $isbeside["KRN"]["FRS"] = true;
        $isbeside["KRN"]["HRZ"] = true;
        $isbeside["KRN"]["SBN"] = true;
        $isbeside["KRN"]["SKH"] = true;

        $isbeside["KRH"]["KRD"] = true;
        $isbeside["KRH"]["HDN"] = true;
        $isbeside["KRH"]["LRS"] = true;
        $isbeside["KRH"]["ILM"] = true;

        $isbeside["KBD"]["CHB"] = true;
        $isbeside["KBD"]["KHZ"] = true;
        $isbeside["KBD"]["BHR"] = true;
        $isbeside["KBD"]["FRS"] = true;
        $isbeside["KBD"]["ESF"] = true;

        $isbeside["GLS"]["MZN"] = true;
        $isbeside["GLS"]["NKH"] = true;
        $isbeside["GLS"]["SMN"] = true;

        $isbeside["GIL"]["MZN"] = true;
        $isbeside["GIL"]["ADL"] = true;
        $isbeside["GIL"]["ZJN"] = true;
        $isbeside["GIL"]["GZN"] = true;

        $isbeside["LRS"]["ILM"] = true;
        $isbeside["LRS"]["KRH"] = true;
        $isbeside["LRS"]["HDN"] = true;
        $isbeside["LRS"]["MKZ"] = true;
        $isbeside["LRS"]["ESF"] = true;
        $isbeside["LRS"]["CHB"] = true;
        $isbeside["LRS"]["KHZ"] = true;

        $isbeside["MZN"]["GLS"] = true;
        $isbeside["MZN"]["SMN"] = true;
        $isbeside["MZN"]["THR"] = true;
        $isbeside["MZN"]["ABZ"] = true;
        $isbeside["MZN"]["ESF"] = true;
        $isbeside["MZN"]["GZN"] = true;
        $isbeside["MZN"]["GIL"] = true;

        $isbeside["MKZ"]["ESF"] = true;
        $isbeside["MKZ"]["QHM"] = true;
        $isbeside["MKZ"]["THR"] = true;
        $isbeside["MKZ"]["ABZ"] = true;
        $isbeside["MKZ"]["LRS"] = true;
        $isbeside["MKZ"]["GZN"] = true;
        $isbeside["MKZ"]["HDN"] = true;

        $isbeside["HRZ"]["BHR"] = true;
        $isbeside["HRZ"]["FRS"] = true;
        $isbeside["HRZ"]["KRN"] = true;
        $isbeside["HRZ"]["SBN"] = true;

        $isbeside["HDN"]["KRH"] = true;
        $isbeside["HDN"]["LRS"] = true;
        $isbeside["HDN"]["KRD"] = true;
        $isbeside["HDN"]["MKZ"] = true;
        $isbeside["HDN"]["GZN"] = true;
        $isbeside["HDN"]["ZJN"] = true;

        $isbeside["YZD"]["ESF"] = true;
        $isbeside["YZD"]["FRS"] = true;
        $isbeside["YZD"]["KRN"] = true;
        $isbeside["YZD"]["SKH"] = true;

        if (isset($isbeside[$source][$destination]) && $isbeside[$source][$destination] === true)
            return 'beside';
        elseif ( $source == $destination )
            return 'in';
        else return 'out';
    }

    protected function get_the_abbreviation($name)
    {
        //default
        if (!$name) return "GIL";

        //اگر تعداد سه تا بود یعنی خودش مخففه
        if (strlen($name) === 3) return $name;

        //اگر عددی باشد حتما نام آی دی هست
        if (is_numeric($name)) {
            $province = Province::find($name);
            if($province) return $province->abbr;
        }

        $abrr["آذربایجان شرقی"] = "EAZ";
        $abrr["آذربایجان غربی"] = "WAZ";
        $abrr["اردبیل"] = "ADL";
        $abrr["اصفهان"] = "ESF";
        $abrr["البرز"] = "ABZ";
        $abrr["ایلام"] = "ILM";
        $abrr["بوشهر"] = "BHR";
        $abrr["تهران"] = "THR";
        $abrr["چهارمحال وبختیاری"] = "CHB";
        $abrr["چهارمحال و بختیاری"] = "CHB";
        $abrr["خراسان جنوبی"] = "SKH";
        $abrr["خراسان رضوی"] = "RKH";
        $abrr["خراسان شمالی"] = "NKH";
        $abrr["خوزستان"] = "KHZ";
        $abrr["زنجان"] = "ZJN";
        $abrr["سمنان"] = "SMN";
        $abrr["سیستان وبلوچستان"] = "SBN";
        $abrr["سیستان و بلوچستان"] = "SBN";
        $abrr["فارس"] = "FRS";
        $abrr["قزوین"] = "GZN";
        $abrr["قم"] = "QHM";
        $abrr["کردستان"] = "KRD";
        $abrr["کرمان"] = "KRN";
        $abrr["کرمانشاه"] = "KRH";
        $abrr["کهگیلویه وبویراحمد"] = "KBD";
        $abrr["کهگیلویه و بویراحمد"] = "KBD";
        $abrr["گلستان"] = "GLS";
        $abrr["گیلان"] = "GIL";
        $abrr["لرستان"] = "LRS";
        $abrr["مازندران"] = "MZN";
        $abrr["مرکزی"] = "MKZ";
        $abrr["هرمزگان"] = "HRZ";
        $abrr["همدان"] = "HDN";
        $abrr["یزد"] = "YZD";

        return $abrr[$name];

    }

    protected function sefareshi() {


        $result = 0;

        // Iran Post Prices
        $rate_price = $this->sefareshi_rate_price;

        // insurance (bime)
        $insurance = $this->sefareshi_insurance;

        // post tax percent (#%)
        $post_tax = $this->sefareshi_tax; // 9%

            // detect the weight plan
            if ( $this->weight <= 500 )
                $weight_indicator = '500';
            elseif ( $this->weight > 500 && $this->weight <= 1000 )
                $weight_indicator = '1000';
            elseif ( $this->weight > 1000 && $this->weight <= 2000 )
                $weight_indicator = '2000';
            elseif ( $this->weight > 2000 )
                $weight_indicator = '9999';

            // if states are beside or are same or not beside each other
            $checked_state = $this->check_states_beside( $this->source , $this->destination);

            // calculate
            if ( $weight_indicator != '9999' ) { // is less than 2000 grams
                $shipping_total = $rate_price[$weight_indicator][$checked_state];
            } elseif ( $weight_indicator == '9999' ) { // is more than 2000 grams
                $shipping_total = $rate_price['2000'][$checked_state] + ( $rate_price['9999'][$checked_state] * ceil ( ( $this->weight - 2000) / 1000 ) );
                $shipping_total = (int)$shipping_total;
            }


            // invalid post code price
            // 25%
            $invalid_postcode = ceil ( ( $shipping_total * 25 ) / 100 );

            // check invalid post code
            switch ( $this->postcode ){
                case '1234567890':
                case '1111111111':
                case '2222222222':
                case '3333333333':
                case '4444444444':
                case '5555555555':
                case '6666666666':
                case '7777777777':
                case '8888888888':
                case '9999999999':
                case '0000000000':
                case '0987654321':
                case '1234567891':
                case '0123456789':
                case '7894561230':
                case ( strlen ( $this->postcode ) < 10 ):
                case ( strlen ( $this->postcode ) > 10 ):
                    $shipping_total += $invalid_postcode;
                    break;
            }

            $result = $shipping_total;

        // post tax
        $result += ceil( ( $result * $post_tax ) / 100 );

        // insurance (bime)
        $result += $insurance;

        //extra costs
        $result	+=  ceil ( ( $result * $this->sefareshi_extra_cost_percent) / 100 );
        $result += $this->sefareshi_extra_cost;

        // round to up for amounts fewer than 10 toman
        $result = ( ceil ( $result / 10 ) ) * 10;

        return (int) $result;
    }

    protected function pishtaz() {

        $result = 0;

        // Iran Post Prices
        $rate_price = $this->pishtaz_rate_price;

        // insurance (bime)
        $insurance = $this->pishtaz_insurance;

        // post tax percent (#%)
        $post_tax = $this->pishtaz_tax;

            $shipping_total = 0;

            // detect the weight plan
            if ( $this->weight <= 500 )
                $weight_indicator = '500';
            elseif ( $this->weight > 500 && $this->weight <= 1000 )
                $weight_indicator = '1000';
            elseif ( $this->weight > 1000 && $this->weight <= 2000 )
                $weight_indicator = '2000';
            elseif ( $this->weight > 2000 )
                $weight_indicator = '9999';

            // if states are beside or are same or not beside each other
            $checked_state = $this->check_states_beside( $this->source , $this->destination);

            // calculate
            if ( $weight_indicator != '9999' ) { // is less than 2000 grams
                $shipping_total = $rate_price[$weight_indicator][$checked_state];
            } elseif ( $weight_indicator == '9999' ) { // is more than 2000 grams
                $shipping_total = $rate_price['2000'][$checked_state] + ( $rate_price['9999'][$checked_state] * ceil ( ( $this->weight - 2000) / 1000 ) );
                $shipping_total = (int)$shipping_total;
            }

            // invalid post code price
            // 25%
            $invalid_postcode = ceil ( ( $shipping_total * 25 ) / 100 );

            // check invalid post code
            switch ( $this->postcode ){
                case '1234567890':
                case '1111111111':
                case '2222222222':
                case '3333333333':
                case '4444444444':
                case '5555555555':
                case '6666666666':
                case '7777777777':
                case '8888888888':
                case '9999999999':
                case '0000000000':
                case '0987654321':
                case '1234567891':
                case '0123456789':
                case '7894561230':
                case ( strlen ( $this->postcode ) < 10 ):
                case ( strlen ( $this->postcode ) > 10 ):
                    $shipping_total += $invalid_postcode;
                    break;
            }

            $result += $shipping_total;


        // post tax
        $result += ceil( ( $result * $post_tax ) / 100 );

        // insurance (bime)
        $result += $insurance;

        //extra costs
        $result	+=  ceil ( ( $result * $this->pishtaz_extra_cost_percent) / 100 );
        $result += $this->pishtaz_extra_cost;

        // round to up for amounts fewer than 10 toman
        $result = ( ceil ( $result / 10 ) ) * 10;

        return $result;

    }

    public function getSefareshiPrice()
    {
        return $this->sefareshi() + $this->package_price;
    }

    public function getPishtazPrice()
    {
        return $this->pishtaz() + $this->package_price;
    }

    public function setCart($destination , $postalCode = null, $source = null )
    {
        $this->source = $this->get_the_abbreviation($source);
        $this->destination = $this->get_the_abbreviation($destination);
        $this->postcode = $postalCode;
    }

    public function addWeight($weight)
    {
        $this->weight += $weight;
    }

}

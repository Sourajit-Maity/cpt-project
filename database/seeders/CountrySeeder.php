<?php

namespace Database\Seeders;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                "country_name" => "Afghanistan",
                "country_code" => "+93",
                "short_code" => "AF"
            ],
            [
                "country_name" => "Aland Islands",
                "country_code" => "+358",
                "short_code" => "AX"
            ],
            [
                "country_name" => "Albania",
                "country_code" => "+355",
                "short_code" => "AL"
            ],
            [
                "country_name" => "Algeria",
                "country_code" => "+213",
                "short_code" => "DZ"
            ],
            [
                "country_name" => "AmericanSamoa",
                "country_code" => "+1684",
                "short_code" => "AS"
            ],
            [
                "country_name" => "Andorra",
                "country_code" => "+376",
                "short_code" => "AD"
            ],
            [
                "country_name" => "Angola",
                "country_code" => "+244",
                "short_code" => "AO"
            ],
            [
                "country_name" => "Anguilla",
                "country_code" => "+1264",
                "short_code" => "AI"
            ],
            [
                "country_name" => "Antarctica",
                "country_code" => "+672",
                "short_code" => "AQ"
            ],
            [
                "country_name" => "Antigua and Barbuda",
                "country_code" => "+1268",
                "short_code" => "AG"
            ],
            [
                "country_name" => "Argentina",
                "country_code" => "+54",
                "short_code" => "AR"
            ],
            [
                "country_name" => "Armenia",
                "country_code" => "+374",
                "short_code" => "AM"
            ],
            [
                "country_name" => "Aruba",
                "country_code" => "+297",
                "short_code" => "AW"
            ],
            [
                "country_name" => "Australia",
                "country_code" => "+61",
                "short_code" => "AU"
            ],
            [
                "country_name" => "Austria",
                "country_code" => "+43",
                "short_code" => "AT"
            ],
            [
                "country_name" => "Azerbaijan",
                "country_code" => "+994",
                "short_code" => "AZ"
            ],
            [
                "country_name" => "Bahamas",
                "country_code" => "+1242",
                "short_code" => "BS"
            ],
            [
                "country_name" => "Bahrain",
                "country_code" => "+973",
                "short_code" => "BH"
            ],
            [
                "country_name" => "Bangladesh",
                "country_code" => "+880",
                "short_code" => "BD"
            ],
            [
                "country_name" => "Barbados",
                "country_code" => "+1246",
                "short_code" => "BB"
            ],
            [
                "country_name" => "Belarus",
                "country_code" => "+375",
                "short_code" => "BY"
            ],
            [
                "country_name" => "Belgium",
                "country_code" => "+32",
                "short_code" => "BE"
            ],
            [
                "country_name" => "Belize",
                "country_code" => "+501",
                "short_code" => "BZ"
            ],
            [
                "country_name" => "Benin",
                "country_code" => "+229",
                "short_code" => "BJ"
            ],
            [
                "country_name" => "Bermuda",
                "country_code" => "+1441",
                "short_code" => "BM"
            ],
            [
                "country_name" => "Bhutan",
                "country_code" => "+975",
                "short_code" => "BT"
            ],
            [
                "country_name" => "Bolivia, Plurinational State of",
                "country_code" => "+591",
                "short_code" => "BO"
            ],
            [
                "country_name" => "Bosnia and Herzegovina",
                "country_code" => "+387",
                "short_code" => "BA"
            ],
            [
                "country_name" => "Botswana",
                "country_code" => "+267",
                "short_code" => "BW"
            ],
            [
                "country_name" => "Brazil",
                "country_code" => "+55",
                "short_code" => "BR"
            ],
            [
                "country_name" => "British Indian Ocean Territory",
                "country_code" => "+246",
                "short_code" => "IO"
            ],
            [
                "country_name" => "Brunei Darussalam",
                "country_code" => "+673",
                "short_code" => "BN"
            ],
            [
                "country_name" => "Bulgaria",
                "country_code" => "+359",
                "short_code" => "BG"
            ],
            [
                "country_name" => "Burkina Faso",
                "country_code" => "+226",
                "short_code" => "BF"
            ],
            [
                "country_name" => "Burundi",
                "country_code" => "+257",
                "short_code" => "BI"
            ],
            [
                "country_name" => "Cambodia",
                "country_code" => "+855",
                "short_code" => "KH"
            ],
            [
                "country_name" => "Cameroon",
                "country_code" => "+237",
                "short_code" => "CM"
            ],
            [
                "country_name" => "Canada",
                "country_code" => "+1",
                "short_code" => "CA"
            ],
            [
                "country_name" => "Cape Verde",
                "country_code" => "+238",
                "short_code" => "CV"
            ],
            [
                "country_name" => "Cayman Islands",
                "country_code" => "+ 345",
                "short_code" => "KY"
            ],
            [
                "country_name" => "Central African Republic",
                "country_code" => "+236",
                "short_code" => "CF"
            ],
            [
                "country_name" => "Chad",
                "country_code" => "+235",
                "short_code" => "TD"
            ],
            [
                "country_name" => "Chile",
                "country_code" => "+56",
                "short_code" => "CL"
            ],
            [
                "country_name" => "China",
                "country_code" => "+86",
                "short_code" => "CN"
            ],
            [
                "country_name" => "Christmas Island",
                "country_code" => "+61",
                "short_code" => "CX"
            ],
            [
                "country_name" => "Cocos (Keeling) Islands",
                "country_code" => "+61",
                "short_code" => "CC"
            ],
            [
                "country_name" => "Colombia",
                "country_code" => "+57",
                "short_code" => "CO"
            ],
            [
                "country_name" => "Comoros",
                "country_code" => "+269",
                "short_code" => "KM"
            ],
            [
                "country_name" => "Congo",
                "country_code" => "+242",
                "short_code" => "CG"
            ],
            [
                "country_name" => "Congo, The Democratic Republic of the Congo",
                "country_code" => "+243",
                "short_code" => "CD"
            ],
            [
                "country_name" => "Cook Islands",
                "country_code" => "+682",
                "short_code" => "CK"
            ],
            [
                "country_name" => "Costa Rica",
                "country_code" => "+506",
                "short_code" => "CR"
            ],
            [
                "country_name" => "Cote d'Ivoire",
                "country_code" => "+225",
                "short_code" => "CI"
            ],
            [
                "country_name" => "Croatia",
                "country_code" => "+385",
                "short_code" => "HR"
            ],
            [
                "country_name" => "Cuba",
                "country_code" => "+53",
                "short_code" => "CU"
            ],
            [
                "country_name" => "Cyprus",
                "country_code" => "+357",
                "short_code" => "CY"
            ],
            [
                "country_name" => "Czech Republic",
                "country_code" => "+420",
                "short_code" => "CZ"
            ],
            [
                "country_name" => "Denmark",
                "country_code" => "+45",
                "short_code" => "DK"
            ],
            [
                "country_name" => "Djibouti",
                "country_code" => "+253",
                "short_code" => "DJ"
            ],
            [
                "country_name" => "Dominica",
                "country_code" => "+1767",
                "short_code" => "DM"
            ],
            [
                "country_name" => "Dominican Republic",
                "country_code" => "+1849",
                "short_code" => "DO"
            ],
            [
                "country_name" => "Ecuador",
                "country_code" => "+593",
                "short_code" => "EC"
            ],
            [
                "country_name" => "Egypt",
                "country_code" => "+20",
                "short_code" => "EG"
            ],
            [
                "country_name" => "El Salvador",
                "country_code" => "+503",
                "short_code" => "SV"
            ],
            [
                "country_name" => "Equatorial Guinea",
                "country_code" => "+240",
                "short_code" => "GQ"
            ],
            [
                "country_name" => "Eritrea",
                "country_code" => "+291",
                "short_code" => "ER"
            ],
            [
                "country_name" => "Estonia",
                "country_code" => "+372",
                "short_code" => "EE"
            ],
            [
                "country_name" => "Ethiopia",
                "country_code" => "+251",
                "short_code" => "ET"
            ],
            [
                "country_name" => "Falkland Islands (Malvinas)",
                "country_code" => "+500",
                "short_code" => "FK"
            ],
            [
                "country_name" => "Faroe Islands",
                "country_code" => "+298",
                "short_code" => "FO"
            ],
            [
                "country_name" => "Fiji",
                "country_code" => "+679",
                "short_code" => "FJ"
            ],
            [
                "country_name" => "Finland",
                "country_code" => "+358",
                "short_code" => "FI"
            ],
            [
                "country_name" => "France",
                "country_code" => "+33",
                "short_code" => "FR"
            ],
            [
                "country_name" => "French Guiana",
                "country_code" => "+594",
                "short_code" => "GF"
            ],
            [
                "country_name" => "French Polynesia",
                "country_code" => "+689",
                "short_code" => "PF"
            ],
            [
                "country_name" => "Gabon",
                "country_code" => "+241",
                "short_code" => "GA"
            ],
            [
                "country_name" => "Gambia",
                "country_code" => "+220",
                "short_code" => "GM"
            ],
            [
                "country_name" => "Georgia",
                "country_code" => "+995",
                "short_code" => "GE"
            ],
            [
                "country_name" => "Germany",
                "country_code" => "+49",
                "short_code" => "DE"
            ],
            [
                "country_name" => "Ghana",
                "country_code" => "+233",
                "short_code" => "GH"
            ],
            [
                "country_name" => "Gibraltar",
                "country_code" => "+350",
                "short_code" => "GI"
            ],
            [
                "country_name" => "Greece",
                "country_code" => "+30",
                "short_code" => "GR"
            ],
            [
                "country_name" => "Greenland",
                "country_code" => "+299",
                "short_code" => "GL"
            ],
            [
                "country_name" => "Grenada",
                "country_code" => "+1473",
                "short_code" => "GD"
            ],
            [
                "country_name" => "Guadeloupe",
                "country_code" => "+590",
                "short_code" => "GP"
            ],
            [
                "country_name" => "Guam",
                "country_code" => "+1671",
                "short_code" => "GU"
            ],
            [
                "country_name" => "Guatemala",
                "country_code" => "+502",
                "short_code" => "GT"
            ],
            [
                "country_name" => "Guernsey",
                "country_code" => "+44",
                "short_code" => "GG"
            ],
            [
                "country_name" => "Guinea",
                "country_code" => "+224",
                "short_code" => "GN"
            ],
            [
                "country_name" => "Guinea-Bissau",
                "country_code" => "+245",
                "short_code" => "GW"
            ],
            [
                "country_name" => "Guyana",
                "country_code" => "+595",
                "short_code" => "GY"
            ],
            [
                "country_name" => "Haiti",
                "country_code" => "+509",
                "short_code" => "HT"
            ],
            [
                "country_name" => "Holy See (Vatican City State)",
                "country_code" => "+379",
                "short_code" => "VA"
            ],
            [
                "country_name" => "Honduras",
                "country_code" => "+504",
                "short_code" => "HN"
            ],
            [
                "country_name" => "Hong Kong",
                "country_code" => "+852",
                "short_code" => "HK"
            ],
            [
                "country_name" => "Hungary",
                "country_code" => "+36",
                "short_code" => "HU"
            ],
            [
                "country_name" => "Iceland",
                "country_code" => "+354",
                "short_code" => "IS"
            ],
            [
                "country_name" => "India",
                "country_code" => "+91",
                "short_code" => "IN"
            ],
            [
                "country_name" => "Indonesia",
                "country_code" => "+62",
                "short_code" => "ID"
            ],
            [
                "country_name" => "Iran, Islamic Republic",
                "country_code" => "+98",
                "short_code" => "IR"
            ],
            [
                "country_name" => "Iraq",
                "country_code" => "+964",
                "short_code" => "IQ"
            ],
            [
                "country_name" => "Ireland",
                "country_code" => "+353",
                "short_code" => "IE"
            ],
            [
                "country_name" => "Isle of Man",
                "country_code" => "+44",
                "short_code" => "IM"
            ],
            [
                "country_name" => "Israel",
                "country_code" => "+972",
                "short_code" => "IL"
            ],
            [
                "country_name" => "Italy",
                "country_code" => "+39",
                "short_code" => "IT"
            ],
            [
                "country_name" => "Jamaica",
                "country_code" => "+1876",
                "short_code" => "JM"
            ],
            [
                "country_name" => "Japan",
                "country_code" => "+81",
                "short_code" => "JP"
            ],
            [
                "country_name" => "Jersey",
                "country_code" => "+44",
                "short_code" => "JE"
            ],
            [
                "country_name" => "Jordan",
                "country_code" => "+962",
                "short_code" => "JO"
            ],
            [
                "country_name" => "Kazakhstan",
                "country_code" => "+7",
                "short_code" => "KZ"
            ],
            [
                "country_name" => "Kenya",
                "country_code" => "+254",
                "short_code" => "KE"
            ],
            [
                "country_name" => "Kiribati",
                "country_code" => "+686",
                "short_code" => "KI"
            ],
            [
                "country_name" => "Korea, Democratic People's Republic of Korea",
                "country_code" => "+850",
                "short_code" => "KP"
            ],
            [
                "country_name" => "Korea, Republic of South Korea",
                "country_code" => "+82",
                "short_code" => "KR"
            ],
            [
                "country_name" => "Kuwait",
                "country_code" => "+965",
                "short_code" => "KW"
            ],
            [
                "country_name" => "Kyrgyzstan",
                "country_code" => "+996",
                "short_code" => "KG"
            ],
            [
                "country_name" => "Laos",
                "country_code" => "+856",
                "short_code" => "LA"
            ],
            [
                "country_name" => "Latvia",
                "country_code" => "+371",
                "short_code" => "LV"
            ],
            [
                "country_name" => "Lebanon",
                "country_code" => "+961",
                "short_code" => "LB"
            ],
            [
                "country_name" => "Lesotho",
                "country_code" => "+266",
                "short_code" => "LS"
            ],
            [
                "country_name" => "Liberia",
                "country_code" => "+231",
                "short_code" => "LR"
            ],
            [
                "country_name" => "Libyan Arab Jamahiriya",
                "country_code" => "+218",
                "short_code" => "LY"
            ],
            [
                "country_name" => "Liechtenstein",
                "country_code" => "+423",
                "short_code" => "LI"
            ],
            [
                "country_name" => "Lithuania",
                "country_code" => "+370",
                "short_code" => "LT"
            ],
            [
                "country_name" => "Luxembourg",
                "country_code" => "+352",
                "short_code" => "LU"
            ],
            [
                "country_name" => "Macao",
                "country_code" => "+853",
                "short_code" => "MO"
            ],
            [
                "country_name" => "Macedonia",
                "country_code" => "+389",
                "short_code" => "MK"
            ],
            [
                "country_name" => "Madagascar",
                "country_code" => "+261",
                "short_code" => "MG"
            ],
            [
                "country_name" => "Malawi",
                "country_code" => "+265",
                "short_code" => "MW"
            ],
            [
                "country_name" => "Malaysia",
                "country_code" => "+60",
                "short_code" => "MY"
            ],
            [
                "country_name" => "Maldives",
                "country_code" => "+960",
                "short_code" => "MV"
            ],
            [
                "country_name" => "Mali",
                "country_code" => "+223",
                "short_code" => "ML"
            ],
            [
                "country_name" => "Malta",
                "country_code" => "+356",
                "short_code" => "MT"
            ],
            [
                "country_name" => "Marshall Islands",
                "country_code" => "+692",
                "short_code" => "MH"
            ],
            [
                "country_name" => "Martinique",
                "country_code" => "+596",
                "short_code" => "MQ"
            ],
            [
                "country_name" => "Mauritania",
                "country_code" => "+222",
                "short_code" => "MR"
            ],
            [
                "country_name" => "Mauritius",
                "country_code" => "+230",
                "short_code" => "MU"
            ],
            [
                "country_name" => "Mayotte",
                "country_code" => "+262",
                "short_code" => "YT"
            ],
            [
                "country_name" => "Mexico",
                "country_code" => "+52",
                "short_code" => "MX"
            ],
            [
                "country_name" => "Micronesia, Federated States of Micronesia",
                "country_code" => "+691",
                "short_code" => "FM"
            ],
            [
                "country_name" => "Moldova",
                "country_code" => "+373",
                "short_code" => "MD"
            ],
            [
                "country_name" => "Monaco",
                "country_code" => "+377",
                "short_code" => "MC"
            ],
            [
                "country_name" => "Mongolia",
                "country_code" => "+976",
                "short_code" => "MN"
            ],
            [
                "country_name" => "Montenegro",
                "country_code" => "+382",
                "short_code" => "ME"
            ],
            [
                "country_name" => "Montserrat",
                "country_code" => "+1664",
                "short_code" => "MS"
            ],
            [
                "country_name" => "Morocco",
                "country_code" => "+212",
                "short_code" => "MA"
            ],
            [
                "country_name" => "Mozambique",
                "country_code" => "+258",
                "short_code" => "MZ"
            ],
            [
                "country_name" => "Myanmar",
                "country_code" => "+95",
                "short_code" => "MM"
            ],
            [
                "country_name" => "Namibia",
                "country_code" => "+264",
                "short_code" => "NA"
            ],
            [
                "country_name" => "Nauru",
                "country_code" => "+674",
                "short_code" => "NR"
            ],
            [
                "country_name" => "Nepal",
                "country_code" => "+977",
                "short_code" => "NP"
            ],
            [
                "country_name" => "Netherlands",
                "country_code" => "+31",
                "short_code" => "NL"
            ],
            [
                "country_name" => "Netherlands Antilles",
                "country_code" => "+599",
                "short_code" => "AN"
            ],
            [
                "country_name" => "New Caledonia",
                "country_code" => "+687",
                "short_code" => "NC"
            ],
            [
                "country_name" => "New Zealand",
                "country_code" => "+64",
                "short_code" => "NZ"
            ],
            [
                "country_name" => "Nicaragua",
                "country_code" => "+505",
                "short_code" => "NI"
            ],
            [
                "country_name" => "Niger",
                "country_code" => "+227",
                "short_code" => "NE"
            ],
            [
                "country_name" => "Nigeria",
                "country_code" => "+234",
                "short_code" => "NG"
            ],
            [
                "country_name" => "Niue",
                "country_code" => "+683",
                "short_code" => "NU"
            ],
            [
                "country_name" => "Norfolk Island",
                "country_code" => "+672",
                "short_code" => "NF"
            ],
            [
                "country_name" => "Northern Mariana Islands",
                "country_code" => "+1670",
                "short_code" => "MP"
            ],
            [
                "country_name" => "Norway",
                "country_code" => "+47",
                "short_code" => "NO"
            ],
            [
                "country_name" => "Oman",
                "country_code" => "+968",
                "short_code" => "OM"
            ],
            [
                "country_name" => "Pakistan",
                "country_code" => "+92",
                "short_code" => "PK"
            ],
            [
                "country_name" => "Palau",
                "country_code" => "+680",
                "short_code" => "PW"
            ],
            [
                "country_name" => "Palestinian Territory",
                "country_code" => "+970",
                "short_code" => "PS"
            ],
            [
                "country_name" => "Panama",
                "country_code" => "+507",
                "short_code" => "PA"
            ],
            [
                "country_name" => "Papua New Guinea",
                "country_code" => "+675",
                "short_code" => "PG"
            ],
            [
                "country_name" => "Paraguay",
                "country_code" => "+595",
                "short_code" => "PY"
            ],
            [
                "country_name" => "Peru",
                "country_code" => "+51",
                "short_code" => "PE"
            ],
            [
                "country_name" => "Philippines",
                "country_code" => "+63",
                "short_code" => "PH"
            ],
            [
                "country_name" => "Pitcairn",
                "country_code" => "+872",
                "short_code" => "PN"
            ],
            [
                "country_name" => "Poland",
                "country_code" => "+48",
                "short_code" => "PL"
            ],
            [
                "country_name" => "Portugal",
                "country_code" => "+351",
                "short_code" => "PT"
            ],
            [
                "country_name" => "Puerto Rico",
                "country_code" => "+1939",
                "short_code" => "PR"
            ],
            [
                "country_name" => "Qatar",
                "country_code" => "+974",
                "short_code" => "QA"
            ],
            [
                "country_name" => "Romania",
                "country_code" => "+40",
                "short_code" => "RO"
            ],
            [
                "country_name" => "Russia",
                "country_code" => "+7",
                "short_code" => "RU"
            ],
            [
                "country_name" => "Rwanda",
                "country_code" => "+250",
                "short_code" => "RW"
            ],
            [
                "country_name" => "Reunion",
                "country_code" => "+262",
                "short_code" => "RE"
            ],
            [
                "country_name" => "Saint Barthelemy",
                "country_code" => "+590",
                "short_code" => "BL"
            ],
            [
                "country_name" => "Saint Helena, Ascension and Tristan Da Cunha",
                "country_code" => "+290",
                "short_code" => "SH"
            ],
            [
                "country_name" => "Saint Kitts and Nevis",
                "country_code" => "+1869",
                "short_code" => "KN"
            ],
            [
                "country_name" => "Saint Lucia",
                "country_code" => "+1758",
                "short_code" => "LC"
            ],
            [
                "country_name" => "Saint Martin",
                "country_code" => "+590",
                "short_code" => "MF"
            ],
            [
                "country_name" => "Saint Pierre and Miquelon",
                "country_code" => "+508",
                "short_code" => "PM"
            ],
            [
                "country_name" => "Saint Vincent and the Grenadines",
                "country_code" => "+1784",
                "short_code" => "VC"
            ],
            [
                "country_name" => "Samoa",
                "country_code" => "+685",
                "short_code" => "WS"
            ],
            [
                "country_name" => "San Marino",
                "country_code" => "+378",
                "short_code" => "SM"
            ],
            [
                "country_name" => "Sao Tome and Principe",
                "country_code" => "+239",
                "short_code" => "ST"
            ],
            [
                "country_name" => "Saudi Arabia",
                "country_code" => "+966",
                "short_code" => "SA"
            ],
            [
                "country_name" => "Senegal",
                "country_code" => "+221",
                "short_code" => "SN"
            ],
            [
                "country_name" => "Serbia",
                "country_code" => "+381",
                "short_code" => "RS"
            ],
            [
                "country_name" => "Seychelles",
                "country_code" => "+248",
                "short_code" => "SC"
            ],
            [
                "country_name" => "Sierra Leone",
                "country_code" => "+232",
                "short_code" => "SL"
            ],
            [
                "country_name" => "Singapore",
                "country_code" => "+65",
                "short_code" => "SG"
            ],
            [
                "country_name" => "Slovakia",
                "country_code" => "+421",
                "short_code" => "SK"
            ],
            [
                "country_name" => "Slovenia",
                "country_code" => "+386",
                "short_code" => "SI"
            ],
            [
                "country_name" => "Solomon Islands",
                "country_code" => "+677",
                "short_code" => "SB"
            ],
            [
                "country_name" => "Somalia",
                "country_code" => "+252",
                "short_code" => "SO"
            ],
            [
                "country_name" => "South Africa",
                "country_code" => "+27",
                "short_code" => "ZA"
            ],
            [
                "country_name" => "South Sudan",
                "country_code" => "+211",
                "short_code" => "SS"
            ],
            [
                "country_name" => "South Georgia and the South Sandwich Islands",
                "country_code" => "+500",
                "short_code" => "GS"
            ],
            [
                "country_name" => "Spain",
                "country_code" => "+34",
                "short_code" => "ES"
            ],
            [
                "country_name" => "Sri Lanka",
                "country_code" => "+94",
                "short_code" => "LK"
            ],
            [
                "country_name" => "Sudan",
                "country_code" => "+249",
                "short_code" => "SD"
            ],
            [
                "country_name" => "Suriname",
                "country_code" => "+597",
                "short_code" => "SR"
            ],
            [
                "country_name" => "Svalbard and Jan Mayen",
                "country_code" => "+47",
                "short_code" => "SJ"
            ],
            [
                "country_name" => "Swaziland",
                "country_code" => "+268",
                "short_code" => "SZ"
            ],
            [
                "country_name" => "Sweden",
                "country_code" => "+46",
                "short_code" => "SE"
            ],
            [
                "country_name" => "Switzerland",
                "country_code" => "+41",
                "short_code" => "CH"
            ],
            [
                "country_name" => "Syrian Arab Republic",
                "country_code" => "+963",
                "short_code" => "SY"
            ],
            [
                "country_name" => "Taiwan",
                "country_code" => "+886",
                "short_code" => "TW"
            ],
            [
                "country_name" => "Tajikistan",
                "country_code" => "+992",
                "short_code" => "TJ"
            ],
            [
                "country_name" => "Tanzania, United Republic of Tanzania",
                "country_code" => "+255",
                "short_code" => "TZ"
            ],
            [
                "country_name" => "Thailand",
                "country_code" => "+66",
                "short_code" => "TH"
            ],
            [
                "country_name" => "Timor-Leste",
                "country_code" => "+670",
                "short_code" => "TL"
            ],
            [
                "country_name" => "Togo",
                "country_code" => "+228",
                "short_code" => "TG"
            ],
            [
                "country_name" => "Tokelau",
                "country_code" => "+690",
                "short_code" => "TK"
            ],
            [
                "country_name" => "Tonga",
                "country_code" => "+676",
                "short_code" => "TO"
            ],
            [
                "country_name" => "Trinidad and Tobago",
                "country_code" => "+1868",
                "short_code" => "TT"
            ],
            [
                "country_name" => "Tunisia",
                "country_code" => "+216",
                "short_code" => "TN"
            ],
            [
                "country_name" => "Turkey",
                "country_code" => "+90",
                "short_code" => "TR"
            ],
            [
                "country_name" => "Turkmenistan",
                "country_code" => "+993",
                "short_code" => "TM"
            ],
            [
                "country_name" => "Turks and Caicos Islands",
                "country_code" => "+1649",
                "short_code" => "TC"
            ],
            [
                "country_name" => "Tuvalu",
                "country_code" => "+688",
                "short_code" => "TV"
            ],
            [
                "country_name" => "Uganda",
                "country_code" => "+256",
                "short_code" => "UG"
            ],
            [
                "country_name" => "Ukraine",
                "country_code" => "+380",
                "short_code" => "UA"
            ],
            [
                "country_name" => "United Arab Emirates",
                "country_code" => "+971",
                "short_code" => "AE"
            ],
            [
                "country_name" => "United Kingdom",
                "country_code" => "+44",
                "short_code" => "GB"
            ],
            [
                "country_name" => "United States",
                "country_code" => "+1",
                "short_code" => "US"
            ],
            [
                "country_name" => "Uruguay",
                "country_code" => "+598",
                "short_code" => "UY"
            ],
            [
                "country_name" => "Uzbekistan",
                "country_code" => "+998",
                "short_code" => "UZ"
            ],
            [
                "country_name" => "Vanuatu",
                "country_code" => "+678",
                "short_code" => "VU"
            ],
            [
                "country_name" => "Venezuela, Bolivarian Republic of Venezuela",
                "country_code" => "+58",
                "short_code" => "VE"
            ],
            [
                "country_name" => "Vietnam",
                "country_code" => "+84",
                "short_code" => "VN"
            ],
            [
                "country_name" => "Virgin Islands, British",
                "country_code" => "+1284",
                "short_code" => "VG"
            ],
            [
                "country_name" => "Virgin Islands, U.S.",
                "country_code" => "+1340",
                "short_code" => "VI"
            ],
            [
                "country_name" => "Wallis and Futuna",
                "country_code" => "+681",
                "short_code" => "WF"
            ],
            [
                "country_name" => "Yemen",
                "country_code" => "+967",
                "short_code" => "YE"
            ],
            [
                "country_name" => "Zambia",
                "country_code" => "+260",
                "short_code" => "ZM"
            ],
            [
                "country_name" => "Zimbabwe",
                "country_code" => "+263",
                "short_code" => "ZW"
            ]
        ];
        
        Country::insert($countries);
    }
}

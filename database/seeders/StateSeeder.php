<?php

namespace Database\Seeders;
use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            [
                'id' => 1,
                'short_code' => 'AL',
                'state_name' => 'Alabama',
                'country_id' => 1,
            ],
            [
                'id' => 2,
                'short_code' => 'AK',
                'state_name' => 'Alaska',
                'country_id' => 1,
            ],
            [
                'id' => 3,
                'short_code' => 'AZ',
                'state_name' => 'Arizona',
                'country_id' => 1,
            ],
            [
                'id' => 4,
                'short_code' => 'AR',
                'state_name' => 'Arkansas',
                'country_id' => 1,
            ],
            [
                'id' => 5,
                'short_code' => 'CA',
                'state_name' => 'California',
                'country_id' => 1,
            ],
            [
                'id' => 6,
                'short_code' => 'CO',
                'state_name' => 'Colorado',
                'country_id' => 1,
            ],
            [
                'id' => 7,
                'short_code' => 'CT',
                'state_name' => 'Connecticut',
                'country_id' => 1,
            ],
            [
                'id' => 8,
                'short_code' => 'DE',
                'state_name' => 'Delaware',
                'country_id' => 1,
            ],
            [
                'id' => 9,
                'short_code' => 'DC',
                'state_name' => 'District of Columbia',
                'country_id' => 1,
            ],
            [
                'id' => 10,
                'short_code' => 'FL',
                'state_name' => 'Florida',
                'country_id' => 1,
            ],
            [
                'id' => 11,
                'short_code' => 'GA',
                'state_name' => 'Georgia',
                'country_id' => 1,
            ],
            [
                'id' => 12,
                'short_code' => 'HI',
                'state_name' => 'Hawaii',
                'country_id' => 1,
            ],
            [
                'id' => 13,
                'short_code' => 'ID',
                'state_name' => 'Idaho',
                'country_id' => 1,
            ],
            [
                'id' => 14,
                'short_code' => 'IL',
                'state_name' => 'Illinois',
                'country_id' => 1,
            ],
            [
                'id' => 15,
                'short_code' => 'IN',
                'state_name' => 'Indiana',
                'country_id' => 1,
            ],
            [
                'id' => 16,
                'short_code' => 'IA',
                'state_name' => 'Iowa',
                'country_id' => 1,
            ],
            [
                'id' => 17,
                'short_code' => 'KS',
                'state_name' => 'Kansas',
                'country_id' => 1,
            ],
            [
                'id' => 18,
                'short_code' => 'KY',
                'state_name' => 'Kentucky',
                'country_id' => 1,
            ],
            [
                'id' => 19,
                'short_code' => 'LA',
                'state_name' => 'Louisiana',
                'country_id' => 1,
            ],
            [
                'id' => 20,
                'short_code' => 'ME',
                'state_name' => 'Maine',
                'country_id' => 1,
            ],
            [
                'id' => 21,
                'short_code' => 'MD',
                'state_name' => 'Maryland',
                'country_id' => 1,
            ],
            [
                'id' => 22,
                'short_code' => 'MA',
                'state_name' => 'Massachusetts',
                'country_id' => 1,
            ],
            [
                'id' => 23,
                'short_code' => 'MI',
                'state_name' => 'Michigan',
                'country_id' => 1,
            ],
            [
                'id' => 24,
                'short_code' => 'MN',
                'state_name' => 'Minnesota',
                'country_id' => 1,
            ],
            [
                'id' => 25,
                'short_code' => 'MS',
                'state_name' => 'Mississippi',
                'country_id' => 1,
            ],
            [
                'id' => 26,
                'short_code' => 'MO',
                'state_name' => 'Missouri',
                'country_id' => 1,
            ],
            [
                'id' => 27,
                'short_code' => 'MT',
                'state_name' => 'Montana',
                'country_id' => 1,
            ],
            [
                'id' => 28,
                'short_code' => 'NE',
                'state_name' => 'Nebraska',
                'country_id' => 1,
            ],
            [
                'id' => 29,
                'short_code' => 'NV',
                'state_name' => 'Nevada',
                'country_id' => 1,
            ],
            [
                'id' => 30,
                'short_code' => 'NH',
                'state_name' => 'New Hampshire',
                'country_id' => 1,
            ],
            [
                'id' => 31,
                'short_code' => 'NJ',
                'state_name' => 'New Jersey',
                'country_id' => 1,
            ],
            [
                'id' => 32,
                'short_code' => 'NM',
                'state_name' => 'New Mexico',
                'country_id' => 1,
            ],
            [
                'id' => 33,
                'short_code' => 'NY',
                'state_name' => 'New York',
                'country_id' => 1,
            ],
            [
                'id' => 34,
                'short_code' => 'NC',
                'state_name' => 'North Carolina',
                'country_id' => 1,
            ],
            [
                'id' => 35,
                'short_code' => 'ND',
                'state_name' => 'North Dakota',
                'country_id' => 1,
            ],
            [
                'id' => 36,
                'short_code' => 'OH',
                'state_name' => 'Ohio',
                'country_id' => 1,
            ],
            [
                'id' => 37,
                'short_code' => 'OK',
                'state_name' => 'Oklahoma',
                'country_id' => 1,
            ],
            [
                'id' => 38,
                'short_code' => 'OR',
                'state_name' => 'Oregon',
                'country_id' => 1,
            ],
            [
                'id' => 39,
                'short_code' => 'PA',
                'state_name' => 'Pennsylvania',
                'country_id' => 1,
            ],
            [
                'id' => 40,
                'short_code' => 'PR',
                'state_name' => 'Puerto Rico',
                'country_id' => 1,
            ],
            [
                'id' => 41,
                'short_code' => 'RI',
                'state_name' => 'Rhode Island',
                'country_id' => 1,
            ],
            [
                'id' => 42,
                'short_code' => 'SC',
                'state_name' => 'South Carolina',
                'country_id' => 1,
            ],
            [
                'id' => 43,
                'short_code' => 'SD',
                'state_name' => 'South Dakota',
                'country_id' => 1,
            ],
            [
                'id' => 44,
                'short_code' => 'TN',
                'state_name' => 'Tennessee',
                'country_id' => 1,
            ],
            [
                'id' => 45,
                'short_code' => 'TX',
                'state_name' => 'Texas',
                'country_id' => 1,
            ],
            [
                'id' => 46,
                'short_code' => 'UT',
                'state_name' => 'Utah',
                'country_id' => 1,
            ],
            [
                'id' => 47,
                'short_code' => 'VT',
                'state_name' => 'Vermont',
                'country_id' => 1,
            ],
            [
                'id' => 48,
                'short_code' => 'VA',
                'state_name' => 'Virginia',
                'country_id' => 1,
            ],
            [
                'id' => 49,
                'short_code' => 'WA',
                'state_name' => 'Washington',
                'country_id' => 1,
            ],
            [
                'id' => 50,
                'short_code' => 'WV',
                'state_name' => 'West Virginia',
                'country_id' => 1,
            ],
            [
                'id' => 51,
                'short_code' => 'WI',
                'state_name' => 'Wisconsin',
                'country_id' => 1,
            ],
            [
                'id' => 52,
                'short_code' => 'WY',
                'state_name' => 'Wyoming',
                'country_id' => 1,
            ]
        ];

        State::insert($states);
    }
}

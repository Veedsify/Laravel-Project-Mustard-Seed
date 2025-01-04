<?php

namespace  App\Constants;

use App\Models\State as ModelsState;

class States
{

     public static function SeedState()
     {

          $states = [
               ['Abia State', 'NG-AB'],
               ['Adamawa State', 'NG-AD'],
               ['Akwa Ibom State', 'NG-AK'],
               ['Anambra State', 'NG-AN'],
               ['Bauchi State', 'NG-BA'],
               ['Bayelsa State', 'NG-BY'],
               ['Benue State', 'NG-BE'],
               ['Borno State', 'NG-BO'],
               ['Cross River State', 'NG-CR'],
               ['Delta State', 'NG-DE'],
               ['Ebonyi State', 'NG-EB'],
               ['Edo State', 'NG-ED'],
               ['Ekiti State', 'NG-EK'],
               ['Enugu State', 'NG-EN'],
               ['FCT', 'NG-FC'],
               ['Gombe State', 'NG-GO'],
               ['Imo State', 'NG-IM'],
               ['Jigawa State', 'NG-JI'],
               ['Kaduna State', 'NG-KD'],
               ['Kano State', 'NG-KN'],
               ['Katsina State', 'NG-KT'],
               ['Kebbi State', 'NG-KB'],
               ['Kogi State', 'NG-KO'],
               ['Kwara State', 'NG-KW'],
               ['Lagos State', 'NG-LA'],
               ['Nasarawa State', 'NG-NA'],
               ['Niger State', 'NG-NI'],
               ['Ogun State', 'NG-OG'],
               ['Ondo State', 'NG-ON'],
               ['Osun State', 'NG-OS'],
               ['Oyo State', 'NG-OY'],
               ['Plateau State', 'NG-PL'],
               ['Rivers State', 'NG-RI'],
               ['Sokoto State', 'NG-SO'],
               ['Taraba State', 'NG-TA'],
               ['Yobe State', 'NG-YO'],
               ['Zamfara State', 'NG-ZA']
          ];

          foreach ($states as $state) {
               ModelsState::create([
                    'name' => $state[0],
                    'code' => $state[1]
               ]);
          }

          return;
     }
}

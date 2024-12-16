<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TemplatePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $getTemplateDetails = DB::table('templetes')->get();

        foreach ($getTemplateDetails as $templateItem)
        {
            DB::table('template_layout_positions')->insert([
                [
                    'layout_id' => 'new_4',
                    'template_id' => $templateItem->id,
                    'field_name' => 'text-1724620622477-0',
                    'positions' => json_encode([
                        'top' => '156.16350448123364',
                        'left' => '43',
                        'text' => 'Dear Harry Potter',
                        'angle' => '0',
                        'scaleX' => '0.5082090406523312',
                        'scaleY' => '0.5082090406523312',
                        'stroke' => null,
                    ]),
                    'configuration' => null,
                    'created_at' => '2024-12-16 15:15:47',
                    'updated_at' => '2024-12-16 15:15:47',
                ],
                [
                    'layout_id' => 'new_4',
                    'template_id' => $templateItem->id,
                    'field_name' => 'text-1724620622477-1',
                    'positions' => json_encode([
                        'top' => '185.65504257606284',
                        'left' => '42.874983509857884',
                        'text' => "We are pleased to inform you that you have been accepted to \nLiyamana, a platform as extraordinary as Hogwarts itself. Just \nlike the famed school of witchcraft and wizardry, Liyamana \nis your gateway to discovering your unique powers, unleashing \ncreativity, and embarking on an enchanting journey to success.",
                        'angle' => '0',
                        'scaleX' => '0.44863727603997283',
                        'scaleY' => '0.44863727603997283',
                        'stroke' => null,
                    ]),
                    'configuration' => null,
                    'created_at' => '2024-12-16 15:15:47',
                    'updated_at' => '2024-12-16 15:15:47',
                ],
                [
                    'layout_id' => 'new_4',
                    'template_id' => $templateItem->id,
                    'field_name' => 'text-1724620622477-2',
                    'positions' => json_encode([
                        'top' => '294.24565978931196',
                        'left' => '40.53559021068804',
                        'text' => "Within our platform, you’ll find a wealth of tools and resources \nthat will help you unlock new dimensions in your craft whether \nit’s spellbinding creativity, solving complex mysteries, or achieving \nmastery in your chosen field.",
                        'angle' => '0',
                        'scaleX' => '0.419895134976734',
                        'scaleY' => '0.419895134976734',
                        'stroke' => null,
                    ]),
                    'configuration' => null,
                    'created_at' => '2024-12-16 15:15:47',
                    'updated_at' => '2024-12-16 15:15:47',
                ],
                [
                    'layout_id' => 'new_4',
                    'template_id' => $templateItem->id,
                    'field_name' => 'text-1724620622477-3',
                    'positions' => json_encode([
                        'top' => '377.11099165056896',
                        'left' => '39.781026959435394',
                        'text' => "Your journey begins now! Simply click the link below to confirm \nyour place and take the first step towards building a world of \nmagic with us.“Every great wizard started as nothing more \nthan we are now—students. If they can do it, why not us?”",
                        'angle' => '0',
                        'scaleX' => '0.4328806678758348',
                        'scaleY' => '0.4328806678758348',
                        'stroke' => null,
                    ]),
                    'configuration' => null,
                    'created_at' => '2024-12-16 15:15:47',
                    'updated_at' => '2024-12-16 15:15:47',
                ],
                [
                    'layout_id' => 'new_4',
                    'template_id' => $templateItem->id,
                    'field_name' => 'text-1724620622477-4',
                    'positions' => json_encode([
                        'top' => '461.15834135141995',
                        'left' => '201.00000000000009',
                        'text' => 'With warm wishes and magical regards,',
                        'angle' => '0',
                        'scaleX' => '0.3650905056899721',
                        'scaleY' => '0.3650905056899721',
                        'stroke' => null,
                    ]),
                    'configuration' => null,
                    'created_at' => '2024-12-16 15:15:47',
                    'updated_at' => '2024-12-16 15:15:47',
                ],
                [
                    'layout_id' => 'new_4',
                    'template_id' => $templateItem->id,
                    'field_name' => 'text-1724620622477-5',
                    'positions' => json_encode([
                        'top' => '474.00423255323994',
                        'left' => '228',
                        'text' => 'The Liyamana Team',
                        'angle' => '0',
                        'scaleX' => '0.5127727062108887',
                        'scaleY' => '0.5127727062108887',
                        'stroke' => null,
                    ]),
                    'configuration' => null,
                    'created_at' => '2024-12-16 15:15:47',
                    'updated_at' => '2024-12-16 15:15:47',
                ],
                [
                    'layout_id' => 'new_4',
                    'template_id' => $templateItem->id,
                    'field_name' => 'text-1724620622477-6',
                    'positions' => json_encode([
                        'top' => '491.19265717520943',
                        'left' => '265.53893949966147',
                        'text' => 'Liyamana Pvt Ltd',
                        'angle' => '0',
                        'scaleX' => '0.38698554549263703',
                        'scaleY' => '0.38698554549263703',
                        'stroke' => null,
                    ]),
                    'configuration' => null,
                    'created_at' => '2024-12-16 15:15:47',
                    'updated_at' => '2024-12-16 15:15:47',
                ],
            ]);
        }



    }
}

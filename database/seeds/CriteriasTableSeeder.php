<?php

use App\Models\Criteria;
use App\Models\CriteriaEN;
use Illuminate\Database\Seeder;

class CriteriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            ['name' => 'Υποτροφία Ταλέντου-Δεξιοτήτων', 'icon' => '/panel/assets/images/steps/talents.png'],
            ['name' => 'Υποτροφία Αριστείας', 'icon' => '/panel/assets/images/steps/medal.png'],
            ['name' => 'Υποτροφία με Κοινωνικά Κριτήρια', 'icon' => '/panel/assets/images/steps/social.png'],
            ['name' => 'Υποτροφία για Φίλους-Αδέλφια', 'icon' => '/panel/assets/images/steps/friends.png'],
            ['name' => 'Υποτροφία Ανοιχτού Τύπου', 'icon' => '/panel/assets/images/steps/open.png'],
        ];

        $namesENG = [
            'Scholarship for talents',
            'Scholarship for excellent students',
            'Scholarship for Social Criterias',
            'Scholarship for Friends-Brothers and Sisters',
            'Open Scholarships',
        ];

        foreach ($names as $name) {
            $criteria = new Criteria;
            $criteria->name = $name['name'];
            $criteria->icon = $name['icon'];
            $criteria->save();
        }

        foreach ($namesENG as $n) {
            $criteria = new CriteriaEn;
            $criteria->name = $n;
            $criteria->save();
        }
    }
}

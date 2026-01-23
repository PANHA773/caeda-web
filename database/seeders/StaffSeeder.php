<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staffMembers = [
            ['name' => "Maut Rorhany", 'image' => "/assets/Mr.Ny.PNG", 'position' => "Head of Office of Research and Development of Cambodia-ASEAN Educational Development Association", 'order' => 1],
            ['name' => "Hin Chamnab", 'image' => "/assets/Chamnab Hin.jpg", 'position' => "Deputy Head of Office of Administration and Education of Cambodia-ASEAN Educational Development Association", 'order' => 2],
            ['name' => "Yuttra Sokhnin", 'image' => "/assets/Soknin Yuttra.jpg", 'position' => "Deputy Head of Office of Account and Finance of Cambodia-ASEAN Educational Development Association", 'order' => 3],
            ['name' => "Laisean Pich", 'image' => "/assets/Laisean Pich.jpg", 'position' => "Deputy Head of Office of Production of Cambodia-ASEAN Educational Development Association", 'order' => 4],
            ['name' => "Oudomchanreaksmey Pich", 'image' => "/assets/Oudomchanreaksmey Pich.jpg", 'position' => "Member of Office of Administration and Education of Cambodia-ASEAN Educational Development Association", 'order' => 5],
            ['name' => "Somaly Rin", 'image' => "/assets/Somaly Rin.png", 'position' => "Member of Office of Administration and Education of Cambodia-ASEAN Educational Development Association", 'order' => 6],
            ['name' => "Bona Than", 'image' => "/assets/Bona Than.jpg", 'position' => "Member of Office of Communication and Publicity of Cambodia-ASEAN Educational Development Association", 'order' => 7],
            ['name' => "Sovannpich Kunthy", 'image' => "/assets/Sovannpich Kunthy.jpg", 'position' => "Member of Office of Administration and Education of Cambodia-ASEAN Educational Development Association", 'order' => 8],
            ['name' => "Mut Sophanha", 'image' => "/assets/MUT SOPHANHA.jpg", 'position' => "Member of Office of Administration and Education of Cambodia-ASEAN Educational Development Association", 'order' => 9],
            ['name' => "Naisim Lim", 'image' => "/assets/Naisim Lim.jpg", 'position' => "Member of Office of Business and Economics of Cambodia-ASEAN Educational Development Association", 'order' => 10],
            ['name' => "Sithean Yean", 'image' => "/assets/Sithean Yean.jpg", 'position' => "Member of Office of Communication and Publicity of Cambodia-ASEAN Educational Development Association", 'order' => 11],
            ['name' => "Long Beang", 'image' => "/assets/Long Beang.jpg", 'position' => "Member of Office of Production of Cambodia-ASEAN Educational Development Association", 'order' => 12],
            ['name' => "Kheav Sokhea", 'image' => "/assets/Sokhea Kheav.jpg", 'position' => "Member of Office of Production of Cambodia-ASEAN Educational Development Association", 'order' => 13],
            ['name' => "Daro Mak", 'image' => "/assets/Daro Mak.jpg", 'position' => "Member of Office of Communication and Publicity of Cambodia-ASEAN Educational Development Association", 'order' => 14],
            ['name' => "Huot Sokdalin", 'image' => "/assets/Sokdalin Huot.jpg", 'position' => "Assistant to Executive Director of Cambodia-ASEAN Educational Development Association", 'order' => 15],
            ['name' => "Sean Borath", 'image' => "/assets/SEAN BORAT.jpg", 'position' => "Member of Office of Communication and Publicity of Cambodia-ASEAN Educational Development Association", 'order' => 16],
            ['name' => "Tan Toch Sreynith", 'image' => "/assets/Tan Touchsreynith.JPG", 'position' => "Member of Office of Communication and Publicity of Cambodia-ASEAN Educational Development Association", 'order' => 17],
            ['name' => "Heng Dara", 'image' => "/assets/Heng Dara.JPG", 'position' => "Member of Office of Administration and Education of Cambodia-ASEAN Educational Development Association", 'order' => 18],
            ['name' => "Ven. Tha Chanthou", 'image' => "/assets/Thaa Chanthou.jpg", 'position' => "Member of Office of Production of Cambodia-ASEAN Educational Development Association", 'order' => 19],
            ['name' => "Thea Banha", 'image' => "/assets/Banha Thea.jpg", 'position' => "Web Developer", 'order' => 20],
        ];

        foreach ($staffMembers as $staff) {
            Staff::create($staff);
        }
    }
}
